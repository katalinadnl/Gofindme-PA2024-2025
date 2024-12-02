<?php

namespace App\Forms;

class EditUser
{
    private $userData;

    public function __construct($userData = [])
    {
        $this->userData = $userData;
    }
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"edit-user?id=".$this->userData['id'] ?? '',
                "submit"=>"Sauvegarder les modifications",
                "enctype"=>"multipart/form-data",
                "class"=>"form"
            ],
            "inputs"=>[
                "id"=>[
                    "type"=>"hidden",
                    "name" => "id",
                    "value" => $this->userData['id'] ?? '',
                ],
                "Nom d'utilisateur"=>[
                    "type"=>"text",
                    "name" => "username",
                    "class" => "input-form",
                    "placeholder" => "Nom d'utilisateur",
                    "error"=>"Le nom d'utilisateur doit faire plus de 2 caractères",
                    "value" => $this->userData['username'] ?? '',
                ],
                "E-mail"=>[
                    "type"=>"email",
                    "name" => "email",
                    "class" => "input-form",
                    "placeholder" => "Adresse email",
                    "error"=>"Veuillez entrer une adresse email valide",
                    "value" => $this->userData['email'] ?? '',
                ],
                "Image de profil"=>[
                    "type"=>"file",
                    "name" => "profile_picture",
                    "class" => "input-form",
                    "required"=>false, // Dépend de si tu veux forcer l'utilisateur à avoir une image de profil
                    "accept"=>"image/*", // Accepte uniquement les images
                    "value" => $this->userData['img_path'] ?? '',
                ],
                "Nom"=>[
                    "type"=>"text",
                    "name" => "nom",
                    "class" => "input-form",
                    "placeholder" => "Nom",
                    "error"=>"Le nom doit faire plus de 2 caractères",
                    "value" => $this->userData['lastname'] ?? '',
                ],
                "Prénom"=>[
                    "type"=>"text",
                    "name" => "prenom",
                    "class" => "input-form",
                    "placeholder" => "Prénom",
                    "error"=>"Le prénom doit faire plus de 2 caractères",
                    "value" => $this->userData['firstname'] ?? '',
                ],
                "Role"=>[
                    "type"=>"radio",
                    "name" => "Role",
                    "class" => "input-form",
                    "options"=> [
                        "admin" => "Administrateur",
                        "editor" => "Éditeur",
                        "user" => "Utilisateur"
                    ],
                    "error"=>"Veuillez sélectionner un rôle pour l'utilisateur",
                    "value" => $this->userData['role'] ?? '',
                ],
            ]
        ];
    }
}
