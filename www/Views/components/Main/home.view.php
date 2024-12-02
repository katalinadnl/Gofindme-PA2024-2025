<h2>Tableau de bord</h2>
<p class="subtitle">Bonjour, <strong><?php echo htmlspecialchars($lastname); ?> <?php echo htmlspecialchars($firstname); ?> </strong>!
    <br>Vous êtes connecté en tant que <em><?php echo htmlspecialchars($roles); ?></em>

</p>
<section class="dashboard-cards">
    <a href="/bo/posts">
		<div class="block-card-dashboard">
			<div class="block-card-dashboard-total blue">
				<img src="/Views/styles/dist/images/pages.png" alt="pages-image">
				<div class="block-card-dashboard-total-text">
					<div class="title">Pages</div>
					<div class="number"><?php echo htmlspecialchars($elementsCount['pages']); ?></div>
				</div>
		</div>
	</a>
	<a href="/bo/user">
		<div class="block-card-dashboard-total blue">
			<img src="/Views/styles/dist/images/profil.png" alt="users-image">
			<div class="block-card-dashboard-total-text">
				<div class="title">Utilisateurs</div>
				<div class="number"><?php echo htmlspecialchars($elementsCount['users']); ?></div>
			</div>
		</div>
	</a>
	</div>

    <div class="block-card-dashboard">
	<a href="/bo/medias">
		<div class="block-card-dashboard-total green">
			<img src="/Views/styles/dist/images/video.png" alt="video-image">
			<div class="block-card-dashboard-total-text">
				<div class="title">Médias</div>
				<div class="number"><?php echo htmlspecialchars($elementsCount['medias']); ?></div>
			</div>
		</div>
	</a>
    <a href="/bo/articles">
        <div class="block-card-dashboard-total green">
            <img src="/Views/styles/dist/images/comment.png" alt="comment-image">
            <div class="block-card-dashboard-total-text">
                <div class="title">Articles</div>
                <div class="number"><?php echo htmlspecialchars($elementsCount['articles']); ?></div>
            </div>
        </div>
    </a>
	</div>
    <div class="block-card-dashboard">
	<a href="/bo/themes">
		<div class="block-card-dashboard-total blue">
			<img src="/Views/styles/dist/images/avis.png" alt="avis-image">
			<div class="block-card-dashboard-total-text">
				<div class="title">Themes</div>
				<div class="number"><?php echo htmlspecialchars($elementsCount['themes']); ?></div>
			</div>
		</div>
	</a>
	</div>
</section>

