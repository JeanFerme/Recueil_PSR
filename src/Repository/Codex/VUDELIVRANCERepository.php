<?php

namespace App\Repository\Codex;

use App\Entity\Codex\VUDELIVRANCE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VUDELIVRANCE>
 *
 * @method VUDELIVRANCE|null find($id, $lockMode = null, $lockVersion = null)
 * @method VUDELIVRANCE|null findOneBy(array $criteria, array $orderBy = null)
 * @method VUDELIVRANCE[]    findAll()
 * @method VUDELIVRANCE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VUDELIVRANCERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VUDELIVRANCE::class);
    }

    public function add(VUDELIVRANCE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VUDELIVRANCE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VUDELIVRANCE[] Returns an array of VUDELIVRANCE objects
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

//    public function findOneBySomeField($value): ?VUDELIVRANCE
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
