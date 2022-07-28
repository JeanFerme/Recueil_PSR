<?php

namespace App\Repository\Main;

use App\Entity\Main\ListSurvRef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListSurvRef>
 *
 * @method ListSurvRef|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListSurvRef|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListSurvRef[]    findAll()
 * @method ListSurvRef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListSurvRefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListSurvRef::class);
    }

    public function add(ListSurvRef $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListSurvRef $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ListSurvRef[] Returns an array of ListSurvRef objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListSurvRef
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
