<?php
namespace App\Models;
use App\Core\DB;

class Comment extends DB
{

    protected $name;
    protected $filepath;
    protected $description;

    protected $published;
    protected $isDeleted;
    protected $updatedAt;
    protected $id;

    public function __construct() {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * @param mixed $filepath
     */
    public function setFilepath($filepath): void
    {
        $this->filepath = $filepath;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
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
        return $this->isDeleted;
    }

    /**
     * @param mixed $isDeleted
     */
    public function setIsDeleted($isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function __toString() {
        return "ID: " . $this->id . "\n" .
            "Name: " . $this->name . "\n" .
            "Filepath: " . $this->filepath . "\n" .
            "Description: " . $this->description . "\n" .
            "Published: " . $this->published . "\n" .
            "IsDeleted: " . $this->isDeleted . "\n" .
            "Updated At: " . $this->updatedAt . "\n";
    }
    public function getNbElements() {
        return $this->countElements();
    }

    public function getElementsByType($column, $value) {
        return $this->countElements($column, $value);
    }

}
