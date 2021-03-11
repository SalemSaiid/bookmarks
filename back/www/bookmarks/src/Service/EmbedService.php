<?php

namespace App\Service;

use App\Entity\ReferencedLink;
use Doctrine\DBAL\Driver\Connection;

use Embed\Embed;

class EmbedService
{
    /**
     * init Embed
     */
    public function initEmbed(ReferencedLink $referencedLink) {
        $url = $referencedLink->getUrl();

        if (!empty($url)){
            $info = Embed::create($url);
            $referencedLink->setTitle($info->title);
            $referencedLink->setAuthor($info->authorName);
            $referencedLink->setCreatedAt(new \DateTime($info->publishedTime));
        }
        return $referencedLink;
    }
}