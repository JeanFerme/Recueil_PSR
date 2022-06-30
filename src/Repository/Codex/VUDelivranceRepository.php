<?php

namespace App\Repository\Codex;

use App\Entity\Codex\VUDelivrance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VUDelivrance>
 *
 * @method VUDelivrance|null find($id, $lockMode = null, $lockVersion = null)
 * @method VUDelivrance|null findOneBy(array $criteria, array $orderBy = null)
 * @method VUDelivrance[]    findAll()
 * @method VUDelivrance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VUDelivranceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VUDelivrance::class);
    }

    public function add(VUDelivrance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VUDelivrance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VUDelivrance[] Returns an array of VUDelivrance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VUDelivrance
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
