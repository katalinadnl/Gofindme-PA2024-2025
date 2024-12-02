<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\DB;
use App\Core\Verificator;
use App\Forms\EditUser;
use App\Forms\EditPwd;
use App\Models\User as UserModel;

class User
{

    public function allUsers(): void
    {

        $errors = [];
        $success = [];
        $user = new UserModel();
        // Vérifiez si l'action de suppression a été demandée
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $userId = $_GET['id'];

            if ($user->delete(['id' => $userId])) {
                $success[] = "L'utilisateur a été supprimé avec succès.";
            } else {
                $errors[] = "La suppression a échoué.";
            }
        }

        // Chargez les utilisateurs et préparez les messages à afficher
        $allUsers = $user->getUsers();

        $myView = new View("User/allusers", "back");
        $myView->assign("users", $allUsers);
        $myView->assign("errors", $errors);
        $myView->assign("success", $success);
    }

    public function editUser(): void {

        $userId = $_GET['id'] ?? null;
        $user = new UserModel();
        $errors = [];
        $success = [];

        if ($userId) {
            // Charger les données existantes de l'utilisateur
            $userData = $user->getOneBy(['id' => $userId]);
            if (!$userData) {
                $errors[] = "Utilisateur non trouvé.";
            } else {
                $form = new EditUser($userData);
            }
        } else {
            $errors[] = "Aucun ID d'utilisateur spécifié.";
        }

        $config = $form->getConfig();

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $verificator = new Verificator();
            if ($verificator->checkForm($config, $_REQUEST, $errors)) {
                // Mettre à jour les propriétés de l'objet utilisateur
                $user->setDataFromArray($userData);
                $user->setFirstname($_REQUEST['Prénom']);
                $user->setLastname($_REQUEST['Nom']);
                $user->setUsername($_REQUEST['Nom_d\'utilisateur']);
                $user->setEmail($_REQUEST['E-mail']);
                $user->setImgPath($_REQUEST['Image_de_profil']);
                $user->setRoles($_REQUEST['Role']);
                // Enregistrer les modifications
                $user->save(); // Cette méthode doit gérer la logique de mise à jour
                $success[] = "Les informations de l'utilisateur ont été mises à jour avec succès.";
            }
        }

        $myView = new View("User/edituser", "back");
        $myView->assign("userInfo", $userData);
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);
    }

    public function editPassword(): void {

        $userId = $_GET['id'] ?? null;
        $user = new UserModel();
        $errors = [];
        $success = [];

        if ($userId) {
            // Charger les données existantes de l'utilisateur
            $userData = $user->getOneBy(['id' => $userId]);
            if (!$userData) {
                $errors[] = "Utilisateur non trouvé.";
            } else {
                $form = new EditPwd($userData);
            }
        } else {
            $errors[] = "Aucun ID d'utilisateur spécifié.";
        }

        $config = $form->getConfig();

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $verificator = new Verificator();
            if ($verificator->checkForm($config, $_REQUEST, $errors)) {
                // Mettre à jour les propriétés de l'objet utilisateur
                $user->setDataFromArray($userData);
                $user->setPwd($_REQUEST['Mot_de_passe']);
                // Enregistrer les modifications
                $user->save(); // Cette méthode doit gérer la logique de mise à jour
                $success[] = "Le mot de passe de l'utilisateur a été mises à jour avec succès.";
            }
        }

        $myView = new View("User/editpwd", "back");
        $myView->assign("userInfo", $userData);
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);
    }

    public function viewUser(): void
    {
        $userId = $_GET['id'] ?? null;
        $errors = [];
        $success = [];


        if ($userId === null) {
            $errors[] = "Aucun ID utilisateur spécifié.";
        }

        $userModel = new UserModel();
        $userData = $userModel->getOneBy(['id' => $userId]);

        if (!$userData) {

            $errors[] = "Utilisateur non trouvé.";
        }

        $myView = new View("User/viewUser", "back");
        $myView->assign("userData", $userData);
        $myView->assign("errors", $errors);
        $myView->assign("success", $success);
    }

}
