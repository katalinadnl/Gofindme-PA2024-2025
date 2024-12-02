<?php

namespace App\Models;
use App\Core\DB;


class Post extends DB
{
    protected ?int $id;
    protected string $slug;
    protected string $title;
    protected string $body;
    protected ?int $published;
    protected ?int $isdeleted;

    protected ?string $createdat;
    protected ?string $type;

    protected ?int $theme_id;

    protected ?string $theme;

    protected string $user_username;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme): void
    {
        $this->theme = $theme;
    }


    /**
     * @return mixed
     */
    public function getThemeId()
    {
        if (isset($this->theme_id)) {
            return $this->theme_id;
        }
    }

    /**
     * @param mixed $theme_id
     */
    public function setThemeId($theme_id): void
    {
        $this->theme_id = $theme_id;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        if (isset($this->id)) {
         return $this->id;
        }
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        if (isset($this->slug)) {
            return $this->slug;
        }
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        if (isset($this->title)) {
            return $this->title;
        }
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        if (isset($this->body)) {
            return $this->body;
        }
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        if (isset($this->published)) {
            return $this->published;
        }
    }

    /**
     * @param mixed $published
     */
    public function setPublished($published): void
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        if (isset($this->isdeleted)) {
            return $this->isdeleted;
        }
    }

    public function getCreatedat()
    {
        if (isset($this->createdat)) {
            return $this->createdat;
        }
    }

    public function validate(): array
    {
        $missingFields = array();

        if (empty($this->getSlug()) ) {
            $missingFields['slug'] = 'Le nom de la page est obligatoire';
        }

        if (empty($this->getTitle())) {
            $missingFields['title'] = 'Le titre de la page est obligatoire';
        }

        if (empty($this->getBody())) {
            $missingFields['body'] = 'Le contenu de la page est obligatoire';
        }

        return $missingFields;
    }

    public function __toString()
    {
        return "ID: " . $this->getId() . "\n" .
            "Slug: " . $this->slug . "\n" .
            "Title: " . $this->title . "\n" .
            "Body: " . $this->body . "\n" .
            "Type:" . $this->getType() . "\n" .
            "Published: " . $this->getPublished(). "\n" .
            "IsDeleted: " . $this->getIsDeleted() . "\n" .
            "Created At: " . $this->getCreatedat() . "\n" .
            "User Name:" . $this->getUserUsername() . "\n" ;
    }

    public function setIsdeleted(?int $isdeleted): void
    {
        $this->isdeleted = $isdeleted;
    }
    public function getNbElements() {
        return $this->countElements();
    }

    public function getElementsByType($column, $value) {
        return $this->countElements($column, $value);
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setUserUsername($user): void
    {
        $this->user_username = $user;
    }

    public function getUserUsername()
    {
        if (isset($this->user_username)) {
            return $this->user_username;
        }
    }

    public function setDefaultBody()
    {
        $this->body = '
        <div id="div-body" class="div-body no-transition">

        <!-- Page content -->
        <div class="section1">
            <div class="container">
                <div class="">
                    <h1>Title</h1>
                    <p><b>Headline</b></p>
                </div>
            </div>
        </div>
        <div class="section2">
            <div class="page-content">
                <!-- service -->
                <div class="page-content-service" id="service">
                    <h2>SERVICE</h2>
                    <p class="page-content-service-desc"><i>Service description</i></p>
                    <p></p>
                    <div class="page-content-service-img">
                    </div>
                </div>

                <!-- product -->
                <div class="page-content-product" id="reservation">
                    <h2>Titre2</h2>
                    <p class="page-content-product-desc"><i>product description</i></p><br>

                    <ul class="page-content-product-list">
                        <li>Produit<span class="page-content-product-item sold-out">placeholder1</span></li>
                        <li>Produit<span class="page-content-product-item sold-out">placeholder2</span></li>
                        <li>Produit<span class="page-content-product-item sold-out">placeholder3</span></li>
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
                                    <button type="submit" class="button-submit">ENVOYER</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="page-content-footer">
            <p class="page-content-footer-info">Powered by <a href="https://gofindme.fr" target="_blank">GoFindMe © 2024. All rights reserved</a></p>
        </div>
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
    </div>';
    }

}
