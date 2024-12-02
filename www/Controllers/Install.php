<?php

namespace App\Controllers;

use App\Forms\InstallSite;
use App\Core\View;
use App\Core\Verificator;
use App\Models\User;
use PDO;
use PDOException;
use App\Controllers\Security;
class Install
{
    public function run()
    {

        $form = new InstallSite();
        $config = $form->getConfig();
        $errors = [];
        $success = [];

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) { // Si le formulaire est soumis

            $verificator = new Verificator(); // Créer une instance de la classe Verificator
            if ($verificator->checkForm($config, $_REQUEST, $errors)) { // Vérifier le formulaire

                $adminFirstname = $_REQUEST['Prénom'] ?? ''; //recupère la valeur de admin_firstname
                $adminLastname = $_REQUEST['Nom'] ?? ''; //recupère la valeur de admin_lastname
                $adminEmail = $_REQUEST['E-mail'] ?? ''; //recupère la valeur de admin_email
                $adminUsername = $_REQUEST['Nom_d\'utilisateur'] ?? ''; //recupère la valeur de admin_username
                $adminPassword = $_REQUEST['Mot_de_passe'] ?? ''; //recupère la valeur de admin_password
                $adminPasswordConfirm = $_REQUEST['Confirmation_de_mot_de_passe'] ?? ''; //recupère la valeur de admin_password_confirm
                $dbname = $_REQUEST['Nom_de_la_BDD'] ?? ''; //recupère la valeur de dbname
                $dbuser = $_REQUEST['Utilisateur_BDD'] ?? ''; //recupère la valeur de dbuser
                $dbpassword = $_REQUEST['Mot_de_passe_BDD'] ?? ''; //recupère la valeur de dbpassword
                $tablePrefix = $_REQUEST['Prefixe_des_tables'] ?? '';    //recupère la valeur de table_prefix

                // Créer le fichier de configuration
                $configContent = "<?php\n";
                $configContent .= "// Configuration de la base de données\n";
                $configContent .= "define('DB_HOST', 'postgres');\n";
                $configContent .= "define('DB_PORT', '5432');\n";
                $configContent .= "define('DB_NAME', '" . addslashes($dbname) . "');\n";
                $configContent .= "define('DB_USER', '" . addslashes($dbuser) . "');\n";
                $configContent .= "define('DB_PASSWORD', '" . addslashes($dbpassword) . "');\n";
                $configContent .= "define('TABLE_PREFIX', '" . addslashes($tablePrefix) . "');\n";

                $myfile = fopen("config.php", "w");

                fwrite($myfile, $configContent);

                fclose($myfile);


                // Chemin relatif pour remonter d'un niveau à partir de `www`
                $envPath = __DIR__ . '/../.env';

                // Assurez-vous de construire votre contenu de .env ici
                $envContent = "POSTGRES_USER={$dbuser}\n";
                $envContent .= "POSTGRES_PASSWORD={$dbpassword}\n";
                $envContent .= "POSTGRES_DB={$dbname}\n";

                $myenv = fopen(".env", "w");
                fwrite($myenv, $envContent);
                fclose($myenv);


            try {
                $pdo = new \PDO("pgsql:host=postgres;port=5432;dbname=$dbname;user=$dbuser;password=$dbpassword");

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $bddPath = './BDD.sql';
                // script SQL
                $sqlScript = file_get_contents($bddPath);

                $sqlScript = str_replace("{prefix}", $tablePrefix, $sqlScript);

                $sqlStatements = explode(";", $sqlScript); // Séparer chaque instruction SQL

                // Exécuter chaque instruction SQL
                foreach ($sqlStatements as $statement) {
                    $trimmedStatement = trim($statement);
                    if ($trimmedStatement) {
                        $stmt = $pdo->prepare($trimmedStatement);
                        $stmt->execute();
                    }
                }


            } catch (PDOException $e) {
                var_dump('Erreur lors de l\'exécution du script SQL ou de la connexion à la base de données : ' . $e->getMessage());
            }
            $user = new User();
                $user->setFirstname($adminFirstname);
                $user->setLastname($adminLastname);
                $user->setUsername($adminUsername);
                $user->setEmail($adminEmail);
                $user->setPwd($adminPassword);
                $user->setRoles("admin");
                $user->setIsActive(true);
                $user->save(); //ajouter toutes les données dans la base de données
                $success[] = "Votre compte a bien été créé";

            }
            header("Location: /login");
        }
        // Utiliser votre système de vue pour inclure le formulaire
        $myView = new View("install");
        $myView->assign("configForm", $config);
        // Pas d'erreurs ou succès initiaux pour l'installation
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);


    }

    public function check()
    {
        echo "Installation de l'application";
    }


}
