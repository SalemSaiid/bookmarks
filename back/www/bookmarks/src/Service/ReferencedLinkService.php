<?php

namespace App\Service;

use App\Repository\ReferencedLinkRepository;
use Doctrine\DBAL\Driver\Connection;
use Embed\Embed;

class ReferencedLinkService
{
    private $referencedLinkRepository;

    public function __construct(ReferencedLinkRepository $referencedLinkRepository)
    {
        $this->referencedLinkRepository = $referencedLinkRepository;
    }

    /**
     * Finds all referenced link
     */
    public function findAll() {
        $data = $this->referencedLinkRepository->findAll();

        return $data;
    }

    /**
     * Finds all referenced link
     */
    public function findVideosLinks() {
        return $this->referencedLinkRepository->findVideosLinks();
    }

    /**
     * save referenced link
     */
    public function create($referencedLink) {
       return  $this->referencedLinkRepository->create($referencedLink);
    }
}