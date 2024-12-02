<?php
namespace App\Models;
use App\Core\DB;

class Media extends DB
{
    protected ?int $id;
    protected string $title;
    protected string $filepath;
    protected string $description;
    protected ?string $createAt;
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
    public function getFilepath()
    {
        if (isset($this->filepath)) {
            return $this->filepath;
        }
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
        if (isset($this->description)) {
            return $this->description;
        }
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
    public function getCreatedat()
    {
        if (isset($this->createdat)) {
            return $this->createdat;
        }
    }


    public function getTitle()
    {
        if (isset($this->title)) {
            return $this->title;
        }
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $createAt
     */
    public function setCreateAt($createAt): void
    {
        $this->createAt = $createAt;
    }
    public function validate(): array
    {
        $missingFields = array();

        if (empty($this->getTitle())) {
            $missingFields['title'] = 'Le titre du média est obligatoire';
        }
        if (empty($this->getFilepath())) {
            $missingFields['filePath'] = 'L\'url du média est obligatoire';
        }

        return $missingFields;
    }

    public function __toString() {
        return "ID: " . $this->getId() . "\n" .
            "Name: " . $this->getTitle() . "\n" .
            "Filepath: " . $this->getFilepath() . "\n" .
            "Description: " . $this->getDescription() . "\n" .
            "Created At: " . $this->getCreatedat() . "\n" ;
    }

    public function getNbElements() {
        return $this->countElements();
    }

    public function getElementsByType($column, $value) {
        return $this->countElements($column, $value);
    }

}
