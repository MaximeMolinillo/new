<?php

namespace App\Repository;

use App\Entity\Encyclopedie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Encyclopedie>
 *
 * @method Encyclopedie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Encyclopedie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Encyclopedie[]    findAll()
 * @method Encyclopedie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EncyclopedieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Encyclopedie::class);
    }

//    /**
//     * @return Encyclopedie[] Returns an array of Encyclopedie objects
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

//    public function findOneBySomeField($value): ?Encyclopedie
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
