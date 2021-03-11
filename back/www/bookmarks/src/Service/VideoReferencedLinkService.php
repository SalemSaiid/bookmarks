<?php

namespace App\Service;

use App\Entity\ReferencedLink;
use App\Repository\ReferencedLinkRepository;
use App\Repository\VideoReferencedLinkRepository;
use Doctrine\DBAL\Driver\Connection;
use Embed\Embed;

class VideoReferencedLinkService
{
    private $videoReferencedLinkRepository;

    public function __construct(VideoReferencedLinkRepository $videoReferencedLinkRepository)
    {
        $this->videoReferencedLinkRepository = $videoReferencedLinkRepository;
    }

    /**
     * Finds all referenced link
     */
    public function findAll() {
        $data = $this->videoReferencedLinkRepository->findAll();

        return $data;
    }

    /**
     * Finds all referenced link
     */
    public function findVideosLinks() {
        return $this->videoReferencedLinkRepository->findVideosLinks();
    }

    /**
     * save referenced link
     */
    public function create($referencedLink) {
       return  $this->videoReferencedLinkRepository->create($referencedLink);
    }
}