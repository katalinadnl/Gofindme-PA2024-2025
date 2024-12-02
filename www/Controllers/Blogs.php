<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\DB;
use App\Forms\UpdateBlog;
use App\Models\Article;
use App\Models\Blog;

class Blogs
{

    public function allBlogs(): void
    {
        $errors = [];
        $success = [];
        $blog = new Blog();
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $blogId = $_GET['id'];

            if ($_GET['action'] === 'delete') {
                if ($blog->deleteArticlesAndBlogs($blogId)) {
                    $success[] = "Le blog a été supprimé avec succès.";
                } else {
                    $errors[] = "La suppression a échoué.";
                }
            } elseif ($_GET['action'] === 'draft') {
                if ($blog->draftArticlesAndBlogs($blogId)) {
                    $success[] = "Le blog a été restauré avec succès";
                } else {
                    $errors[] = "Echoué";
                }
            } elseif ($_GET['action'] === 'publish') {
                if ($blog->publishArticlesAndBlogs($blogId)) {
                    $success[] = "Le blog a été publié avec succès";
                } else {
                    $errors[] = "Echoué";
                }
            }
        }

        $allblogs = $blog->getAllArticles();
        $publishblogs = $blog->getPublishedArticles();
        $draftblogs = $blog->getDraftArticle();

        $myView = new View("Blogs/allBlogs", "back");
        $myView->assign("allblogs", $allblogs);
        $myView->assign("publishblogs", $publishblogs);
        $myView->assign("draftblogs", $draftblogs);
        $myView->assign("errors", $errors);
        $myView->assign("success", $success);
    }

    public function EditBlogs(): void
    {
        $blog = new Blog();

        if (isset($_GET['blog']) && $_GET['blog']) {
            $blogId = $_GET['blog'];
            $selectedBlog = $blog->getArticlesAndBlogs("blog", $blogId);

            if ($selectedBlog) {
                $formUpdate = new UpdateBlog();
                $configUpdate = $formUpdate->getConfig($selectedBlog[0]["title"], $selectedBlog[0]["body"], $selectedBlog[0]["id"]);
                $errorsUpdate = [];
                $successUpdate = [];

                $myView = new View("Blogs/editBlogs", "back");
                $myView->assign("blog", $selectedBlog);
                $myView->assign("configForm", $configUpdate);
                $myView->assign("errorsForm", $errorsUpdate);
                $myView->assign("successForm", $successUpdate);
            } else {
                echo "Blog non trouvé.";
            }
        }

    }

    public function addBlogs(): void
    {
        $formUpdate = new UpdateBlog();
        $configUpdate = $formUpdate->getConfig("", "", "");
        $errorsUpdate = [];
        $successUpdate = [];

        $myView = new View("Blogs/addBlogs", "back");
        $myView->assign("configForm", $configUpdate);
        $myView->assign("errorsForm", $errorsUpdate);
        $myView->assign("successForm", $successUpdate);
    }

    public function updateBlog(): void
    {
        $userSerialized = $_SESSION['user'];
        $user = unserialize($userSerialized);
        $username = $user->getUsername();

        $formattedDate = date('Y-m-d H:i:s');

        $title = $_REQUEST['Titre'];
        $body = $_REQUEST['Contenu'];

        $article = new Blog();
        $article->setTitle($title);
        $article->setBody($body);

        if($_GET['id']){
            $post = new Blog();
            $selectedArticle = $post->getArticlesAndBlogs("blog", $_GET['id']);

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
            $article->setPublished(0);
            $article->setSlug("");
            $article->setType("blog");
            $article->setUserId($username);
        }

        $article->saveInpost();
        header("Location: /bo/blogs");
        exit();
    }
}
