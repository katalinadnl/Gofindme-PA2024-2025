<?php

namespace App\Controllers;

use App\Core\View;

use App\Models\SiteSetting as SiteSettingModel;

class SiteSetting{
    public function index() {
        // Instanciez le modèle Settings

        $settingsModel = new SiteSettingModel();

        // Récupérez tous les paramètres du site
        $settings = $settingsModel->getAllSettings();

        // Créez la vue et passez les paramètres à celle-ci
        $newView = new View("Setting/index", "back");
        $newView->assign('settings', $settings);
    }


}
