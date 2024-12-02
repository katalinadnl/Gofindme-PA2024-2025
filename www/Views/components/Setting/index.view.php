<h3>Réglages</h3>
<section class="settings-container">
    <div class="settings-list">
    <?php if (isset($settings)): ?>
        <?php foreach ($settings as $setting): ?>
            <div class="setting-item">
                <span class="setting-key"><?php echo htmlspecialchars($setting['clé']); ?></span> :
                <span class="setting-value"><?php echo htmlspecialchars($setting['valeur']); ?></span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</section>



