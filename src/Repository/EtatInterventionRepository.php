<?php

namespace App\Repository;

use App\Entity\EtatIntervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtatIntervention>
 *
 * @method EtatIntervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatIntervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatIntervention[]    findAll()
 * @method EtatIntervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatInterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatIntervention::class);
    }

//    /**
//     * @return EtatIntervention[] Returns an array of EtatIntervention objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EtatIntervention
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
