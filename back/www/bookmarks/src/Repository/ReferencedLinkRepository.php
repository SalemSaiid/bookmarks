<?php

namespace App\Repository;

use App\Entity\ReferencedLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReferencedLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReferencedLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReferencedLink[]    findAll()
 * @method ReferencedLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferencedLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReferencedLink::class);
    }


    public function create($referencedLink)
    {
        $em = $this->getEntityManager();
        $em->persist($referencedLink);
        $em->flush();

        return $referencedLink;
    }

    public function findVideosLinks(){
        $qb = $this->createQueryBuilder('r')
            ->where('r.type = :type')
            ->setParameter('type', ReferencedLink::TYPE_VIDEO);

        $query = $qb->getQuery();

        return $query->execute();
    }

}
