<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Video extends ReferencedLink
{
    /**
     * @var string
     *
     * @ORM\Column(name="width", type="float")
     */
    private $width;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="float")
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="float")
     */
    private $duration;

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     * @return Video
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     * @return Video
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return Video
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

}