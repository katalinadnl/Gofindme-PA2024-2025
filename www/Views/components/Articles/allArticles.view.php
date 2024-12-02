<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h2>Mes articles</h2>
<section class="section1-status-tab">
    <table class="status-tab">
        <thead>
            <tr class="tab">
                <th class="tab-item active"><a href="#" onclick="globalSections()">Tous</a></th>
                <th class="tab-item"><a href="#" onclick="PublishSections()">Publiés</a></th>
                <th class="tab-item"><a href="#" onclick="draftSections()">Brouillon</a></th>
            </tr>
        </thead>
    </table>
</section>
<section class="all-blogs" id="all-blogs">
    <?php
        foreach ($articles as $articleData): ?>
        <div class="one-blog">
            <div class="edit-icon">
                <a href="/bo/articles/edit-article?article=<?php echo $articleData['id']; ?>" title="Modifier" class="link-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="/bo/articles?action=draft&id=<?php echo $articleData['id']; ?>" class="link-primary" title="Brouillon" onclick="return confirm('Ajouter l\'article dans les brouillons ?');">
                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                </a>
                <a href="/bo/articles?action=delete&id=<?php echo $articleData['id']; ?>" class="link-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article ? (la suppression est definitive)');">
                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                </a>
            </div>
            <div class="blog-title"><h4><?php echo $articleData['title']; ?></h4></div>
            <div class="article-text"><?php echo $articleData['body']; ?></div>

            <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['updatedat'])); ?></div>
        </div>
    <?php endforeach; ?>
</section>
<section class="all-blogs" id="draft-blogs" hidden>
    <?php
    foreach ($draftArticles as $articleData): ?>
        <div class="one-blog">
            <div class="edit-icon">
                <a href="/bo/articles?action=publish&id=<?php echo $articleData['id']; ?>" title="Publier" class="link-primary" onclick="return confirm('Publier l\'article ?');">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                </a>
            </div>
            <div class="blog-title"><h4><?php echo $articleData['title']; ?></h4></div>
            <div class="article-text"><?php echo $articleData['body']; ?></div>
            <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['updatedat'])); ?></div>
        </div>
    <?php endforeach; ?>
</section>
<section class="all-blogs" id="publish-blogs" hidden>
    <?php
    foreach ($publishArticles as $articleData): ?>
        <div class="one-blog">
            <div class="edit-icon">
                <a href="/bo/articles/edit-article?article=<?php echo $articleData['id']; ?>" title="Modifier" class="link-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="/bo/articles?action=draft&id=<?php echo $articleData['id']; ?>" class="link-primary" title="Brouillon" onclick="return confirm('Ajouter l\'article dans les brouillons ?');">
                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                </a>
                <a href="/bo/articles?action=delete&id=<?php echo $articleData['id']; ?>" class="link-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer l\'article ? (la suppression est definitive)');">
                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                </a>
            </div>
            <div class="blog-title"><h4><?php echo $articleData['title']; ?></h4></div>
            <div class="article-text"><?php echo $articleData['body']; ?></div>
            <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($articleData['updatedat'])); ?></div>
        </div>
    <?php endforeach; ?>
</section>

<section class="section5-page-add">
    <a href="/bo/articles/add-article"><button class="button button-primary">Ajouter un nouvel article</button></a>
</section>

<script>

  function globalSections() {

    var allBlogSection = document.getElementById("all-blogs");
    var draftBlogSection = document.getElementById("draft-blogs");
    var publishBlogSection = document.getElementById("publish-blogs");

    draftBlogSection.setAttribute("hidden", "true");
    publishBlogSection.setAttribute("hidden", "true");
    allBlogSection.removeAttribute("hidden");
  }

  function draftSections() {

    var allBlogSection = document.getElementById("all-blogs");
    var draftBlogSection = document.getElementById("draft-blogs");
    var publishBlogSection = document.getElementById("publish-blogs");

    allBlogSection.setAttribute("hidden", "true");
    draftBlogSection.removeAttribute("hidden");
    publishBlogSection.setAttribute("hidden", "true");
  }

  function PublishSections() {

    var allBlogSection = document.getElementById("all-blogs");
    var draftBlogSection = document.getElementById("draft-blogs");
    var publishBlogSection = document.getElementById("publish-blogs");

    allBlogSection.setAttribute("hidden", "true");
    draftBlogSection.setAttribute("hidden", "true");
    publishBlogSection.removeAttribute("hidden");
    }
</script>
