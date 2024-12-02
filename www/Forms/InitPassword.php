<?php

namespace App\Forms;

class InitPassword
{
    public function getConfig($token = ''): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"reset-password",
                "submit"=>"Changer le mot de passe",
                "class"=>"form"
            ],
            "inputs"=>[
                "token"=>["type"=>"hidden", "name" => "token", "class" => "input-form", "placeholder" => "token", "value" => $token, "required"=>true],
                "Mot de passe"=>["type"=>"password","name" => "pwd", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "Confirmation de mot de passe"=>["type"=>"password", "class"=>"input-form", "confirm"=>"pwd" ,"placeholder"=>"confirmation", "required"=>true, "error"=>"Votre mot de passe de confirmation ne correspond pas"],
            ]
        ];
    }


}
