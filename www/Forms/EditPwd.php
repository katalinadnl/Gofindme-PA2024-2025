<?php

namespace App\Forms;

class EditPwd
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
                "action"=>"edit-password?id=".$this->userData['id'] ?? '',
                "submit"=>"Changer le mot de passe",
                "class"=>"form"
            ],
            "inputs"=>[
                "id"=>[
                    "type"=>"hidden",
                    "name" => "id",
                    "value" => $this->userData['id'] ?? '',
                ],
                "Mot de passe"=>["type"=>"password","name" => "pwd", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "Confirmation de mot de passe"=>["type"=>"password", "class"=>"input-form", "confirm"=>"pwd" ,"placeholder"=>"confirmation", "required"=>true, "error"=>"Votre mot de passe de confirmation ne correspond pas"],
            ]
        ];
    }


}
