<h2>Mes blogs</h2>
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
        foreach ($allblogs as $blogData): ?>
        <div class="one-blog">
            <div>
                <div class="edit-icon"><a href="/bo/blogs/edit-blog?blog=<?php echo $blogData['id']; ?>" title="Modifier" class="link-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="/bo/blogs?action=draft&id=<?php echo $blogData['id']; ?>" class="link-primary" title="Brouillon" onclick="return confirm('Ajouter le blog dans les brouillons ?');">
                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                </a>
                <a href="/bo/blogs?action=delete&id=<?php echo $blogData['id']; ?>" title="Supprimer" class="link-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le blog ?');">
                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                </a>
            </div>
                <div class="blog-title"><h4><?php echo $blogData['title']; ?></h4></div>
                <div class="blog-text">
                    <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="250" height="150" class="blog-image">
                    <div class="text-content text-width"><p><?php echo $blogData['body']; ?></p></div>
                </div>
                <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($blogData['updatedat'])); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<section class="all-blogs" id="publish-blogs" hidden>
    <?php
        foreach ($publishblogs as $blogData): ?>
        <div class="one-blog">
            <div>
                <div class="edit-icon"><a href="/bo/blogs/edit-blog?blog=<?php echo $blogData['id']; ?>" title="Modifier" class="link-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="/bo/blogs?action=draft&id=<?php echo $blogData['id']; ?>" class="link-primary" title="Brouillon" onclick="return confirm('Ajouter le post dans les brouillons ?');">
                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                </a>
                <a href="/bo/blogs?action=delete&id=<?php echo $blogData['id']; ?>" title="Supprimer" class="link-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le post ?');">
                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                </a>
            </div>
                <div class="blog-title"><h4><?php echo $blogData['title']; ?></h4></div>
                <div class="blog-text">
                    <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="250" height="150" class="blog-image">
                    <div class="text-content text-width"><p><?php echo $blogData['body']; ?></p></div>
                </div>
                <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($blogData['updatedat'])); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<section class="all-blogs" id="draft-blogs" hidden>
    <?php
        foreach ($draftblogs as $blogData): ?>
        <div class="one-blog">
            <div>
                <div class="edit-icon">
                    <a href="/bo/blogs?action=publish&id=<?php echo $blogData['id']; ?>" title="Publier" class="link-primary" onclick="return confirm('Publier le blog ?');">
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                    </a>
                
                </div>
                <div class="blog-title"><h4><?php echo $blogData['title']; ?></h4></div>
                <div class="blog-text">
                    <img src="https://sf1.lechasseurfrancais.com/wp-content/uploads/2023/11/shutterstock_2321514999-scaled.jpg" alt="image" width="250" height="150" class="blog-image">
                    <div class="text-content text-width"><p><?php echo $blogData['body']; ?></p></div>
                </div>
                <div class="blog-date">Pulié le : <?php echo date('Y-m-d', strtotime($blogData['updatedat'])); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<section class="section5-page-add">
    <a href="/bo/blogs/add-blog"><button class="button button-primary">Ajouter un nouveau blog</button></a>
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
