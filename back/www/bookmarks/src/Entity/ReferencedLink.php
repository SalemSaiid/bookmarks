<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="referenced_link", indexes={@ORM\Index(name="type_idx", columns={"type"})})
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string", length=25)
 * @ORM\DiscriminatorMap({
 *     "video"="Video",
 *     "image"="Image",
 * })
 */
abstract class ReferencedLink
{
    const TYPE_VIDEO = 'video';
    const TYPE_IMAGE = 'image';

    const REFERENCE_LINK_TYPE = [
        self::TYPE_IMAGE,
        self::TYPE_VIDEO
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text")
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string")
     */
    private $author;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return ReferencedLink
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ReferencedLink
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return ReferencedLink
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return ReferencedLink
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
