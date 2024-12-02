<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\DB;
use App\Forms\UpdateArticle;
use App\Models\Article;
use App\Models\Post;

class Articles
{
    public function allArticles(): void
    {

        $errors = [];
        $success = [];
        $article = new Article();
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $articleId = $_GET['id'];

            if ($_GET['action'] === 'delete') {
                if ($article->deleteArticlesAndBlogs($articleId)) {
                    $success[] = "L'article a été supprimé avec succès.";
                } else {
                    $errors[] = "La suppression a échoué.";
                }
            } elseif ($_GET['action'] === 'draft') {
                if ($article->draftArticlesAndBlogs($articleId)) {
                    $success[] = "L'article a été restauré avec succès";
                } else {
                    $errors[] = "Echoué";
                }
            } elseif ($_GET['action'] === 'publish') {
                if ($article->publishArticlesAndBlogs($articleId)) {
                    $success[] = "L'article a été publié avec succès";
                } else {
                    $errors[] = "Echoué";
                }
            }
        }

        $allArticles = $article->getAllArticles();
        $publishArticles = $article->getPublishedArticles();
        $draftArticles = $article->getDraftArticle();

        $myView = new View("Articles/allArticles", "back");
        $myView->assign("articles", $allArticles);
        $myView->assign("publishArticles", $publishArticles);
        $myView->assign("draftArticles", $draftArticles);
        $myView->assign("errors", $errors);
        $myView->assign("success", $success);
    }

    public function editArticles(): void
    {

        $article = new Article();
        if (isset($_GET['article']) && $_GET['article']) {
            $articleId = $_GET['article'];
            $selectedArticle = $article->getArticlesAndBlogs("article", $articleId);

            if ($selectedArticle) {
                $formUpdate = new UpdateArticle();
                $configUpdate = $formUpdate->getConfig($selectedArticle[0]["title"], $selectedArticle[0]["body"], $selectedArticle[0]["id"]);
                $errorsUpdate = [];
                $successUpdate = [];

                $myView = new View("Articles/editArticles", "back");
                $myView->assign("article", $selectedArticle);
                $myView->assign("configForm", $configUpdate);
                $myView->assign("errorsForm", $errorsUpdate);
                $myView->assign("successForm", $successUpdate);
            } else {
                echo "Article non trouvé.";
            }
        }
    }

    public function addArticles(): void
    {
        $formUpdate = new UpdateArticle();
        $configUpdate = $formUpdate->getConfig("", "", "");
        $errorsUpdate = [];
        $successUpdate = [];

        $myView = new View("Articles/addArticles", "back");
        $myView->assign("configForm", $configUpdate);
        $myView->assign("errorsForm", $errorsUpdate);
        $myView->assign("successForm", $successUpdate);
    }

    public function updateArticle(): void
    {
        $userSerialized = $_SESSION['user'];
        $user = unserialize($userSerialized);
        $username = $user->getUsername();

        $formattedDate = date('Y-m-d H:i:s');

        $title = $_REQUEST['Titre'];
        $body = $_REQUEST['Contenu'];

        $article = new Article();
        $article->setTitle($title);
        $article->setBody($body);

        if($_GET['id']){
            $post = new Article();
            $selectedArticle = $post->getArticlesAndBlogs("article", $_GET['id']);

            $article->setId($_GET['id']);
            $article->setUpdatedAt($formattedDate);
            $article->setCreatedAt($selectedArticle[0]["createdat"]);
            $article->setIsDeleted($selectedArticle[0]["isdeleted"]);
            $article->setPublished($selectedArticle[0]["published"]);
            $article->setSlug($selectedArticle[0]["slug"]);
            $article->setType($selectedArticle[0]["type"]);
            $article->setUserId($selectedArticle[0]["user_username"]);


        }else{
            $article->setUpdatedAt($formattedDate);
            $article->setCreatedAt($formattedDate);

            $article->setIsDeleted(0);
            $article->setPublished(1);
            $article->setSlug("");
            $article->setType("article");
            $article->setUserId($username);

        }

        $article->saveInpost();
        header("Location: /bo/articles");
        exit();
    }
}

