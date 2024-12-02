<?php

namespace App\Controllers;

use App\Core\View;
class Error{

    public function page404(): void
    {
        $myView = new View("Error/page404", "neutral");
    }

    public function page403(): void
    {
        $myView = new View("Error/page403", "neutral");
    }


}
