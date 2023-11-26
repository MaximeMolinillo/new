<?php

namespace App\Repository;

use App\Entity\AvisArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvisArticle>
 *
 * @method AvisArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvisArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvisArticle[]    findAll()
 * @method AvisArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvisArticle::class);
    }

//    /**
//     * @return AvisArticle[] Returns an array of AvisArticle objects
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

//    public function findOneBySomeField($value): ?AvisArticle
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
