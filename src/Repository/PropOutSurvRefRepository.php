<?php

namespace App\Repository;

use App\Entity\PropOutSurvRef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PropOutSurvRef>
 *
 * @method PropOutSurvRef|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropOutSurvRef|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropOutSurvRef[]    findAll()
 * @method PropOutSurvRef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropOutSurvRefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropOutSurvRef::class);
    }

    public function add(PropOutSurvRef $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PropOutSurvRef $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PropOutSurvRef[] Returns an array of PropOutSurvRef objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PropOutSurvRef
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
