<?php

namespace App\Forms;

class RequestResetPassword
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"recover-password",
                "submit"=>"Recevoir le lien",
                "class"=>"form"

            ],
            "inputs"=>[
                "E-mail"=>["type"=>"email", "class"=>"input-form", "placeholder"=>"Votre e-mail", "required"=>true, "error"=>"Votre email est incorrect"],
            ]
        ];
    }
}
