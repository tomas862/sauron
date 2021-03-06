<?php

declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDb\Document(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @MongoDb\Id
     */
    private $id;
    /**
     * @MongoDb\Field(type="string")
     */
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     *
     * @return Project
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
