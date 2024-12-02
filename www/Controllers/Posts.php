<?php

namespace App\Controllers;

use App\Core\DB;
use App\Core\View;
use App\Core\PageBuilder;
use App\Models\Post;
use App\Models\Theme;
use App\Models\Media;
use App\Models\User;

class Posts
{

    public function allPosts(): void
    {

        $post = new Post();
        $posts = $post->getAllData("object");

        $allPostView = new View("Post/post", "back");
        $allPostView->assign("posts", $posts);
    }

    public function post(): void
    {

        $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowedTags.='<li><ol><ul><span><div><br><ins><del>';
        $info = "N'oubliez pas de sauvegarder";
        $errorSlug = "";

        $media = new Media();
        $errorSlug = "";
        $medias = $media->getAllData("object");
        if (count($medias) > 0) {
            $mediasList = array();
            foreach ($medias as $media) {
                $mediasList[] = ['title' => $media->getTitle(), 'value' => $media->getFilepath()];
            }
        }

        $post = new Post();
        $post->setDefaultBody();
        $theme = new Theme();
        $retrievedTheme = $theme->getOneBy(['actif' => 1], 'object');

        if (isset($_GET['id'])) {
            $retrievedPost = $post->getOneBy(['id' => $_GET['id']], 'object');
            if (!empty($retrievedPost)) {
                $post = $retrievedPost;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['isDeleted'] == 1) {
                $post->delete(['id' => intval($_POST['id'])]);
                header('Location: /bo/posts');
                exit();
            }

            if (!empty($_POST['id'])) {
            $post->setId(intval($_POST['id']));
            }
            $_POST['pageSlug'] = str_replace(' ', '', strtolower($_POST['pageSlug']));

            $post->setSlug($_POST['pageSlug']);


            $post2 = $post->getOneBy(['slug' => $_POST['pageSlug']], 'object');

            if(!$post2 || $post2->getId() == $post->getId()){
                $post->setTitle($_POST['pageTitle']);
                $post->setBody(strip_tags(stripslashes($_POST['pageContent']), $allowedTags));
                $isPublished = 0;
                if (isset($_POST['isPublished'])) {
                    $isPublished = $_POST['isPublished'] === "on" ? 1 : 0;

                }
                $post->setPublished($isPublished);
                $post->setType('page');
                $user = unserialize($_SESSION['user']);
                $userUsername = $user->getUsername();
                $post->setUserUsername($userUsername);
                $missingFields = $post->validate();

                if (count($missingFields) === 0) {
                    $postId = $post->save();
                    $savedPost = $post->getOneBy(['id' => $postId], 'object');
                    $post = $savedPost;
                    $info = "Page sauvegardée";
                }
            }else{
                $errorSlug = "Slug déjà existant, veuillez en choisir un autre";
            }
        }

        $newPosts = new View("Post/newpost", "back");
        $newPosts->assign("info", $info);
        $newPosts->assign("theme", $retrievedTheme->getTitre());
        $newPosts->assign("post", $post);
        $newPosts->assign("mandatoryFields", $missingFields ?? []);
        $newPosts->assign("errorSlug", $errorSlug);
        $newPosts->assign("mediasList", $mediasList ?? []);
    }

    public function save(): void
    {

        echo "save the post";
    }

    private function validateField(Post $newPost): bool
    {

        return false;
    }

    public function update(): void
    {

        echo "update the post";
    }

    public function delete(): void
    {

        echo "delete the post";
    }

}
