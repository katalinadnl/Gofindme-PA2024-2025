<section class="connection-box">
    <div class="box-title"><h3>Connexion</h3></div>
    <div class="box-content">
        <?php $this->includeComponent("form", $configForm, $errorsForm, $successForm, "button button-primary");?>
        <p class="text">Pas encore de compte ? <a href="/register">Inscrivez-vous</a></p>
        <p class="text">Mot de passe oublié ? <a href="/recover-password">Cliquez ici</a></p>
    </div>
</section>
