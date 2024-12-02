<?php

namespace App\Models;
use App\Core\DB;

class Blog extends DB
{
    protected ?int $id = null;
    protected $title;
    protected $body;
    protected $type;
    protected $slug;
    protected $published = 0;
    protected $isDeleted = 0;
    protected $createdat;
    protected $updatedat;
    protected $user_username;
    protected $theme_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
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
        return $this->body;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    public function getPublished(): int
    {
        return $this->published;
    }

    public function setPublished(int $published): void
    {
        $this->published = $published;
    }

    public function getIsDeleted(): int
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(int $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return mixed
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * @param mixed $createdat
     */
    public function setCreatedat($createdat): void
    {
        $this->createdat = $createdat;
    }

    /**
     * @return mixed
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    /**
     * @param mixed $updatedat
     */
    public function setUpdatedat($updatedat): void
    {
        $this->updatedat = $updatedat;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_username;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_username): void
    {
        $this->user_username = $user_username;
    }

    /**
     * @return mixed
     */
    public function getThemeId()
    {
        return $this->theme_id;
    }

    /**
     * @param mixed $theme_id
     */
    public function setThemeId($theme_id): void
    {
        $this->theme_id = $theme_id;
    }

    public function getAllArticles() {
        return $this->getArticlesAndBlogs("blog");
    }

    public function getPublishedArticles() {
        return $this->getPublishedPost("blog");
    }

    public function getDeletedArticle() {
        return $this->getDleletedArticlesAndBlogs("blog");
    }

    public function getDraftArticle() {
        return $this->getDraftArticlesAndBlogs("blog");
    }
}