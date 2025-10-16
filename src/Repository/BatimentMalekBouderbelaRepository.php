<?php

namespace App\Repository;

use App\Entity\BatimentMalekBouderbela;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BatimentMalekBouderbela>
 *
 * @method BatimentMalekBouderbela|null find($id, $lockMode = null, $lockVersion = null)
 * @method BatimentMalekBouderbela|null findOneBy(array $criteria, array $orderBy = null)
 * @method BatimentMalekBouderbela[]    findAll()
 * @method BatimentMalekBouderbela[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BatimentMalekBouderbelaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BatimentMalekBouderbela::class);
    }

//    /**
//     * @return BatimentMalekBouderbela[] Returns an array of BatimentMalekBouderbela objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BatimentMalekBouderbela
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
