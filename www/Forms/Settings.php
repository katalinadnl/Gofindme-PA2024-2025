<?php
namespace App\Forms;

use App\Core\DB;
use App\Models\SiteSetting;

class EditSettingsForm {

    public function getConfig(): array {
        $settings = new SiteSetting();
        $settings = $settings->getAllSettings();

        $inputs = [];
        foreach ($settings as $setting) {
            // Ajouter un champ de formulaire pour chaque paramètre
            $inputs[$settings['clé']] = [
                "type" => "text", // Vous pourriez vouloir adapter cela selon le type de donnée
                "name" => $setting['clé'],
                "value" => $setting['valeur'],
                "placeholder" => $setting['clé'],
                "required" => true
            ];
        }

        return [
            "config" => [
                "method" => "POST",
                "action" => "updateSettings",
                "submit" => "Sauvegarder les paramètres",
                "class" => "form",
                "id" => "form-edit-settings"
            ],
            "inputs" => $inputs
        ];
    }

}
