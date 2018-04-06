<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

trait HasTimestamps
{
    /**
    * @var Carbon
    *
    * @ORM\Column(name="created_at", type="carbondatetime")
    */
    private $createdAt;

    /**
     * @var Carbon
     *
     * @ORM\Column(name="updated_at", type="carbondatetime")
     */
    private $updatedAt;

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon $createdAt
     */
    public function setCreatedAt(Carbon $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     */
    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function onCreate(): void
    {
        $this->setCreatedAt($now = Carbon::now());
        $this->setUpdatedAt($now);
    }

    /**
     * @ORM\PreUpdate()
     */
    public function onUpdate(): void
    {
        $this->setUpdatedAt(Carbon::now());
    }
}