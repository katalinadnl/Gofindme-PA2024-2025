<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use App\Controllers\Security;

class Medias
{

    public function allMedias(): void
    {

        $media = new Media();
        $medias = $media->getAllData("object");

        $allMediaView = new View("Media/allMedias", "back");
        $allMediaView->assign("medias", $medias);
    }

    public function media(): void
    {

        $media = new Media();
        $info = "N'OUBLIEZ PAS DE SAUVEGARDER";

        if (isset($_GET['id'])) {
            $retrievedMedia = $media->getOneBy(['id' => $_GET['id']], 'object');
            if (!empty($retrievedMedia)) {
                $media = $retrievedMedia;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['isDeleted'] == 1) {
                $media->delete(['id' => intval($_POST['id'])]);
                header('Location: /bo/medias');
                exit();
            }

            if (!empty($_POST['id'])) {
                $media->setId(intval($_POST['id']));
            }
            $media->setTitle($_POST['mediaTitle']);
            $media->setDescription($_POST['mediaContent']);
            $media->setFilepath($_POST['url']);

            $missingFields = $media->validate();

            if (count($missingFields) === 0) {
                $mediaId = $media->save();
                $savedMedia = $media->getOneBy(['id' => $mediaId], 'object');
                $media = $savedMedia;
                $info = "Page sauvegardée";
            }
        }

        $newMedias = new View("Media/media", "back");
        $newMedias->assign("info", $info);
        $newMedias->assign("media", $media);
        $newMedias->assign("mandatoryFields", $missingFields ?? []);

    }

    public function save(): void
    {

        echo "save the media";
    }

    public function update(): void
    {

        echo "update the media";
    }

    public function delete(): void
    {

        echo "delete the media";
    }
}
