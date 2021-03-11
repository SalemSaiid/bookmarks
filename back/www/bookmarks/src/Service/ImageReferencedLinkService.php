<?php

namespace App\Service;

use App\Repository\ImageReferencedLinkRepository;
use Doctrine\DBAL\Driver\Connection;
use Embed\Embed;

class ImageReferencedLinkService
{
    private $imageReferencedLinkRepository;

    public function __construct(ImageReferencedLinkRepository $imageReferencedLinkRepository)
    {
        $this->imageReferencedLinkRepository = $imageReferencedLinkRepository;
    }

    /**
     * Finds all referenced link
     */
    public function findAll() {
        $data = $this->imageReferencedLinkRepository->findAll();

        return $data;
    }

    /**
     * save referenced link image type
     */
    public function create($imageLink) {
       return  $this->imageReferencedLinkRepository->create($imageLink);
    }
}