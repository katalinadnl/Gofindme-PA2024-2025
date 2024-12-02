<?php
namespace App\Core;
use App\Core\View;
use App\Core\DB;
use App\Models\Post;
use App\Models\Theme;

class PageBuilder
{
    public function build($slug)
    {
        $db = new Post();
        $theme = new Theme();
        $slugTrim = str_replace('/', '', $slug);
        $arraySlug = ["slug"=> $slugTrim];
        $post = $db->getOneBy($arraySlug);
        //$template = $post["theme_id"];
        //$theme = $theme->getOneBy(["id" => $template]);
        //$page = $theme["titre"];
        $body = $post["body"];
        $title = $post["title"];
        $htmlFile = "Themes/{$slugTrim}";

        $requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routeFound = false;
        if ($slug === $requestUrl) {
            $routeFound = true;
        }
        if ($routeFound) {
            $View = new View($htmlFile, "front");
            $View->assign("body", $body);
            $View->assign("title", $title);
        }
    }

}
