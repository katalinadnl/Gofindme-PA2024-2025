<?php
namespace App\Models;
use App\Core\DB;

class SiteSetting extends DB{
    private $key;
    private $val;


    public function __construct() {
        parent::__construct();
    }

    // Getters and setters for the properties

    public function getKey() {
        return $this->key;
    }

    public function setKey($key) {
        $this->key = $key;
    }

    public function getVal() {
        return $this->val;
    }

    public function setVal($val) {
        $this->val = $val;
    }

    public function getAllSettings() {
        return $this->getAllData(); // Utilisez la méthode héritée pour récupérer tous les enregistrements
    }
}
