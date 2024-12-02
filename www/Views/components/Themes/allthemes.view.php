<h2>Thèmes</h2>
<div class="themes">
    <?php foreach ($themes as $theme): ?>
        <div class="themes-card">

            <?php if ($theme['actif']): ?>
				<img src="/Views/styles/dist/images/boulangerie.png" alt="media image">
                <div class="themes-card-active">
                    <strong>Thème actif: <?php echo $theme['titre']; ?></strong>
                </div>
            <?php else: ?>
				<img src="/Views/styles/dist/images/music.png" alt="media image">
                <div class="themes-card-inactive">
                    <strong>Thème inactif: <?php echo $theme['titre']; ?></strong>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
