<?php
if (empty($this->data['media']->getId())) {
    echo "<h2>Nouveau média</h2>";
} else {
    echo "<h2>Modification du média</h2>";
}

if (!empty($this->data['mandatoryFields'])) {
    $missingFields = implode("<br>", $this->data['mandatoryFields']);
    echo "<div style='color: red'>$missingFields</div>";
}
$info = $this->data['info'];
echo "<h3>$info</h3>";
?>
<script>
    function loadPreview(e) {
        document.getElementById("imgPreview").src = document.getElementById('url').value;
    }
</script>
<section class="new-media-main">
    <div class="section1-new-media-container">
        <div class="section1-new-media-container-wrapper">
            <form class="button-submit-deleted" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <div hidden>
                    <input type="number" name="id" value="<?php echo $this->data['media']->getId() ?? '' ?>"/>
                </div>
                <div hidden>
                    <input type="number" name="isDeleted" value="1"/>
                </div>
                <div <?php echo empty($this->data['media']->getId()) ? 'hidden' : '' ?> class="button-deleted">
                    <button type="submit" class="button button-danger button-lg" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?');">Supprimer</button>
                </div>
            </form>
            <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <div class="media-wrapper">
                    <div class="form-group">
                        <label for="mediaTitle"></label>
                        <input type="text" name="mediaTitle" id="mediaTitle" class="mediaTitle" placeholder="Titre du média ..." value="<?php echo $this->data['media']->getTitle() ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="mediaContent"></label>
                        <input type="text" name="mediaContent" id="mediaContent" class="mediaDesc" placeholder="Description du média ..." value="<?php echo $this->data['media']->getDescription() ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="url"></label>
                        <input type="text" name="url" id="url" class="mediaURL" placeholder="URL ..." value="<?php echo $this->data['media']->getFilepath() ?? '' ?>" onchange="loadPreview()">
                    </div>

                    <div>
                        <img id="imgPreview" style="height: 40rem; width: 40rem" src="" alt=""/>
                    </div>
                    <script>
                        document.getElementById("imgPreview").src = document.getElementById('url').value;
                    </script>
                    <div hidden>
                        <input type="number" name="isDeleted" value="<?php echo $isDeleted  ?? '0' ?>"/>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="button button-primary button-lg">Sauvegarder</button>
                    </div>
                </div>
                <div class="media-info">
                    <div class="block-card block-card-custom-page info">
                        <div>
                            <div class="block-card-custom-page-info-property">Date<span class="block-card-custom-page-info-value"><?php echo (new DateTime($this->data['media']->getCreatedat()))->format('Y-m-d') ?? '' ?></span>
                        </div>
                    </div>
                    <div class="button-new-page">
                        <div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
