<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\Verificator;
use App\Forms\AddUser;
use App\Forms\InitPassword;
use App\Models\User;
use App\Forms\Connexion;
use App\Forms\Login;
use App\Forms\RequestResetPassword;
use App\Core\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('Europe/Paris');

class Security
{

    public function homePage(): void
    {
        $myView = new View("Security/home", "neutral");
    }
    public function login(): void
    {
        session_start();
        $formLogin = new Login();
        $configLogin = $formLogin->getConfig();
        $errorsLogin = [];
        $successLogin = [];

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] === $configLogin["config"]["method"]) {
            $verificator = new Verificator();
            if ($verificator->checkForm($configLogin, $_REQUEST, $errorsLogin)) {
                // Récupérer les données du formulaire
                $email = $_REQUEST['Email'];
                $password = $_REQUEST['Mot_de_passe'];

                // Créer une instance du modèle User et vérifier les identifiants
                $userModel = new User();
                $user = $userModel->checkUserCredentials($email, $password);
                if ($user) {
                    // Authentification réussie
                    $userSerialized = serialize($user);
                    $_SESSION['user'] = $userSerialized; // Stocker les informations de l'utilisateur dans la session
                    header("Location: /bo/dashboard");
                    exit();
                } else {
                    // Échec de l'authentification
                    $errorsLogin[] = 'Email ou mot de passe incorrect';
                }
            }
        }

        // Préparer la vue avec les données du formulaire et les erreurs
        $myView = new View("Security/login", "neutral");
        $myView->assign("configForm", $configLogin);
        $myView->assign("errorsForm", $errorsLogin);
        $myView->assign("successForm", $successLogin);
    }

    public function register(): void
    {
        $form = new AddUser();
        $config = $form->getConfig();

        $errors = [];
        $success = [];
        // Est ce que le formulaire a été soumis
        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["method"] )
        {
            // Ensuite est-ce que les données sont OK
            $verificator = new Verificator();
            if($verificator->checkForm($config, $_REQUEST, $errors)) {

                $user = new User();
                if ($user->emailExists($_REQUEST['E-mail'])) {
                    $errors[] = "L'email est déjà utilisé par un autre compte.";
                } else {
                    $user->setFirstname($_REQUEST['Prénom']);
                    $user->setLastname($_REQUEST['Nom']);
                    $user->setUsername($_REQUEST['Nom_d\'utilisateur']);
                    $user->setEmail($_REQUEST['E-mail']);
                    $user->setPwd($_REQUEST['Mot_de_passe']);
                    $activationToken = bin2hex(random_bytes(16)); // Générer un token d'activation
                    $user->setActivationToken($activationToken);
                    $user->save(); //ajouter toutes les données dans la base de données
                    $success[] = "Votre compte a bien été créé";
                    // Envoyer l'email de réinitialisation
                    $emailResult = $this->sendActivationEmail($user->getEmail(), $activationToken);

                    if (isset($emailResult['success'])) {
                        $success[] = $emailResult['success'];
                    } elseif (isset($emailResult['error'])) {
                        $errors[] = $emailResult['error'];
                    }
                }
            }
        }

        $myView = new View("Security/register", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);

    }
    public function logout(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
            // Start the session
            session_start();

            // Unset all session variables
            $_SESSION = array();

            // Destroy the session
            session_destroy();

            // Redirect the user to the login page or any other appropriate page
            header("Location: /login");
            exit();
        }
    }

    public function requestResetPassword(): void {
        $form = new RequestResetPassword();
        $config = $form->getConfig();
        $errors = [];
        $success = [];

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $email = $_REQUEST['E-mail'];
            $userModel = new User();
            $userarray = $userModel->getOneBy(['email' => $email]);


            if ($userarray) {
                $resetToken = bin2hex(random_bytes(50));
                $expires = new \DateTime('+1 hour');


                $expiresTimestamp = $expires->getTimestamp();

                $expiresDateTime = date('Y-m-d H:i:s', $expiresTimestamp);
                $userModel->setDataFromArray($userarray);
                $userModel->setResetToken($resetToken);

                $userModel->setResetExpires($expiresDateTime);
                $userModel->save();

                // Envoyer l'email de réinitialisation
                $emailResult = $this->sendResetEmail($email, $resetToken);

                if (isset($emailResult['success'])) {
                    $success[] = $emailResult['success'];
                } elseif (isset($emailResult['error'])) {
                    $errors[] = $emailResult['error'];
                }
            } else {

                $errors[] = 'Cet email n\'est pas associé à un compte existant.';
            }
        }

        $myView = new View("Security/requestResetPassword", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);
    }


    private function sendResetEmail($email, $resetToken) {
        $mail = new PHPMailer(true); // Passer `true` active les exceptions

        try {
            // Configurations du serveur
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true; // Activer l'authentification SMTP
            $mail->Username = 'gofindme.contact@gmail.com'; // SMTP username
            $mail->Password = 'hcnplwiqpmmqbwdp'; // SMTP password
            $mail->setFrom('gofindme.contact@gmail.com', 'Support GoFindMe');
            $mail->addAddress($email);
            $mail->Subject = 'Recuperation de mot de passe GoFindMe';


            $resetLink = "http://gofindme.fr/reset-password?token=" . $resetToken;
            $mail->Body = 'Cliquez sur ce lien pour réinitialiser votre mot de passe: ' . $resetLink;

            $mail->send();
            return ['success' => 'Le lien de recuperation de mot de passe a été envoyé par mail.'];
        } catch (Exception $e) {
            return ['error' => "Le lien n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}"];
        }
    }

    private function sendActivationEmail($email, $activationToken) {
        $mail = new PHPMailer(true); // Passer `true` active les exceptions

        try {
            // Configurations du serveur
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true; // Activer l'authentification SMTP
            $mail->Username = 'gofindme.contact@gmail.com'; // SMTP username
            $mail->Password = 'hcnplwiqpmmqbwdp'; // SMTP password
            $mail->setFrom('gofindme.contact@gmail.com', 'Support GoFindMe');
            $mail->addAddress($email);
            $mail->Subject = 'Activation de votre compte GoFindMe';


            $activationLink = "http://gofindme.fr/activate-account?token=" . $activationToken;
            $mail->Body = 'Veuillez cliquer sur ce lien pour activer votre compte: ' . $activationLink;

            $mail->send();
            return ['success' => 'Le lien de recuperation de mot de passe a été envoyé par mail.'];
        } catch (Exception $e) {
            return ['error' => "Le lien n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}"];
        }
    }

    public function resetPassword(): void
    {
        $formInitPass = new InitPassword();
        $token = $_GET['token'] ?? '';
        $config = $formInitPass->getConfig($token);

        $errors = [];
        $success = [];

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $token = $_REQUEST['token'] ?? '';

            if (empty($token)) {
                $errors[] = "Le token de réinitialisation est manquant.";
            } else {
                $verificator = new Verificator();
                if ($verificator->checkForm($config, $_REQUEST, $errors)) {
                    $userModel = new User();
                    $user = $userModel->getOneBy(['reset_token' => $token]);
                    if (!$user || strtotime($user['reset_expires']) < time()) {
                        $errors[] = "Le token de réinitialisation est invalide ou a expiré.";
                    } else {
                        $pwd = $_POST['pwd'] ?? '';
                        $userModel->setDataFromArray($user);
                        $userModel->setPwd($pwd);
                        $userModel->setResetToken(null);
                        $userModel->setResetExpires(null);
                        $userModel->save();
                        $success[] = "Votre mot de passe a été réinitialisé avec succès.";

                    }
                }
            }
        }

        $myView = new View("Security/resetPassword", "neutral");

        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);
    }

    public function activateAccount()
    {
        $token = $_GET['token'] ?? '';
        $errors = [];
        $success = [];
        if (empty($token)) {
            $errors[] = "Le token d'activation est manquant.";
            return;
        }

        $user = new User();
        $userModel = $user->getOneBy(['activation_token' => $token]);
        $user->setDataFromArray($userModel);
        if ($user) {
            $user->setIsActive(1);
            $user->setActivationToken(null);
            $user->save();
            $success[] = "Votre compte a été activé avec succès.";
        } else {
            $errors[] = "Le token d'activation est invalide.";
        }
        $view = new View("Security/activationAccount", "neutral"); // Remplacez "activation" par le nom de votre fichier de vue
        $view->assign("errors", $errors);
        $view->assign("success", $success);
    }




}
