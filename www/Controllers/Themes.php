<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Theme;
class Themes
{

    public function allThemes(): void
    {
        $theme = new Theme();
        $allThemes = $theme->getAllData(); // Assurez-vous que ceci retourne un tableau de thèmes avec 'active' comme clé.
        $myView = new View("Themes/allthemes", "back");
        $myView->assign('themes', $allThemes); // Passer les thèmes à la vue.
    }


    public function newTheme(): void
    {

        $newUser = new View("Themes/newtheme", "back");
    }

    public function boulangerieTheme(): void
    {
        $newUser = new View("Themes/boulangerieTheme", "front");
    }
    public function musicTheme(): void
    {
        $newUser = new View("Themes/musicTheme", "front");
    }



    public function delete(): void
    {
        echo "Supprimmer une theme";
    }





}
