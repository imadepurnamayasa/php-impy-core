<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Entity;

use DateTime;

abstract class Entity
{
    protected int|string $id;
    protected DateTime $createdAt;
    protected DateTime $modifiedAt;
    protected DateTime $deletedAt;

    public function setId(int|string $id)
    {
        $this->id = $id;
    }

    public function getId(): int|string
    {
        return $this->id;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setModifiedAt(DateTime $modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

    public function getModifiedAt(): DateTime
    {
        return $this->modifiedAt;
    }

    public function setDeleteddAt(DateTime $deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    public function getDeletedAt(): DateTime
    {
        return $this->deletedAt;
    }
    
}