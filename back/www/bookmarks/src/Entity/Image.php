<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Image extends ReferencedLink
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
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     * @return Image
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
     * @return Image
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }
}