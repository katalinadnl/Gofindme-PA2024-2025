<?php
namespace App\Models;
use App\Core\DB;

class Theme extends DB{
    private $id;
    private $titre;
    private $actif;

    public function __construct() {
        parent::__construct();
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
    public function getTitre()
    {
        if (isset($this->titre)) {
            return $this->titre;
        }
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getActif()
    {
        if (isset($this->actif)) {
            return $this->actif;
        }
    }

    /**
     * @param mixed $actif
     */
    public function setActif($actif): void
    {
        $this->actif = $actif;
    }


    public function getNbElements() {
        return $this->countElements();
    }
}
