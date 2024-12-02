<div data-theme="music-template" class="music-template">
    <div id="div-body" class="div-body no-transition">
        <!-- Navbar -->
        <nav id="nav-header" class="nav-header">
            <div class="nav-header-wrapper">
                <ul>
                    <li><a href="#" class="">Home</a></li>
                    <li><a href="#" class="">Service</a></li>
                    <li><a href="#" class="">Réservation</a></li>
                    <li><a href="#" class="">Contact</a></li>
                </ul>
            </div>
        </nav>

        <!-- Page content -->
        <section class="section1">
            <div class="container">
                <img src="" style="">
                <div class="">
                    <h1>Ma boutique de vinyle</h1>
                    <p><b>Retrouvez la fièvre du samedi soir!</b></p>
                </div>
            </div>
        </section>
        <section class="section2">
            <div class="page-content">
                <!-- service -->
                <div class="page-content-service" id="service">
                    <h2>SERVICE</h2>
                    <p class="page-content-service-desc"><i>Découvrez nos différents services</i></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="page-content-service-img">
                        <img src="" alt="Random Name">
                        <img src="" alt="Random Name">
                        <img src="" alt="Random Name">
                    </div>
                </div>

                <!-- product -->
                <div class="page-content-product" id="reservation">
                    <h2>RÉSERVATION</h2>
                    <p class="page-content-product-desc"><i>Retrouvez nos Best Seller!</i></p><br>

                    <ul class="page-content-product-list">
                        <li>Produit<span class="page-content-product-item sold-out">Sold out</span></li>
                        <li>Produit<span class="page-content-product-item sold-out">Sold out</span></li>
                        <li>Produit<span class="page-content-product-item sold-out">Come back</span></li>
                    </ul>

                    <div class="page-content-product-express">
                        <div class="page-content-product-express-item">
                            <img src="" alt="">
                            <div class="page-content-product-express-items-info">
                                <p class="page-content-product-express-item-desc">Description</p>
                                <button class="page-content-product-express-item-button button-info" onclick="">En savoir plus</button>
                            </div>
                        </div>
                        <div class="page-content-product-express-item">
                            <img src="" alt="">
                            <div class="page-content-product-express-items-info">
                                <p class="page-content-product-express-item-desc">Description</p>
                                <button class="page-content-product-express-item-button button-info" onclick="">En savoir plus</button>
                            </div>
                        </div>
                        <div class="page-content-product-express-item">
                            <img src="" alt="">
                            <div class="page-content-product-express-items-info">
                                <p class="page-content-product-express-item-desc">Description</p>
                                <button class="page-content-product-express-item-button button-info" onclick="">En savoir plus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contact -->
                <div class="page-content-contact" id="contact">
                    <h2>CONTACT</h2>
                    <p class="page-content-contact-desc"><i>Restons en contact!</i></p>
                    <div class="page-content-contact-desc-wrapper">
                        <div class="page-content-contact-desc-info">
                            <p class="page-content-contact-adress">Paris 14e</p><br>
                            <p class="page-content-contact-phone">01 01 01 01 01</p><br>
                            <p class="page-content-contact-mail"> Email: mail@mail.com</p>
                        </div>
                        <div class="page-content-contact-form">
                            <form action="" target="_blank">
                                <div class="page-content-contact-form-wrapper">
                                    <input type="text" placeholder="Name" required name="Name" class="form-input">
                                    <input type="text" placeholder="Email" required name="Email" class="form-input">
                                    <textarea placeholder="Message" required name="Message" class="form-textarea"></textarea>
                                    <button type="submit" class="button-submit">ENVOYER</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="page-content-footer">
            <p class="page-content-footer-info">Powered by <a href="https://gofindme.fr" target="_blank">GoFindMe © 2024. All rights reserved</a></p>
        </footer>
        <script>
            window.onload = () => {
                document.querySelector("#div-body").classList.remove("no-transition");
            };

            window.onscroll = () => {
                if (window.scrollY > 0) {
                    document.querySelector("#nav-header").classList.add("sticky");
                } else {
                    document.querySelector("#nav-header").classList.remove("sticky");
                }
            };
        </script>
    </div>
</div>
