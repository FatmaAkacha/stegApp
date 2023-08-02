<?php

namespace App\Repository;

use App\Entity\FicheInterventionTech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FicheInterventionTech>
 *
 * @method FicheInterventionTech|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheInterventionTech|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheInterventionTech[]    findAll()
 * @method FicheInterventionTech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheInterventionTechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheInterventionTech::class);
    }

//    /**
//     * @return FicheInterventionTech[] Returns an array of FicheInterventionTech objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FicheInterventionTech
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
