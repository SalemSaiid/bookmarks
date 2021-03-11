<?php

namespace App\Repository;

use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoReferencedLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }


    public function create($video)
    {
        $em = $this->getEntityManager();
        $em->persist($video);
        $em->flush();

        return $video;
    }

    public function findVideosLinks(){
        $qb = $this->createQueryBuilder('r')
            ->where('r.type = :type')
            ->setParameter('type', ReferencedLink::TYPE_VIDEO);

        $query = $qb->getQuery();

        return $query->execute();
    }

}
