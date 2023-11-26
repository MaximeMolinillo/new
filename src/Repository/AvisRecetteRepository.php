<?php

namespace App\Repository;

use App\Entity\AvisRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvisRecette>
 *
 * @method AvisRecette|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvisRecette|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvisRecette[]    findAll()
 * @method AvisRecette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisRecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvisRecette::class);
    }

//    /**
//     * @return AvisRecette[] Returns an array of AvisRecette objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AvisRecette
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
