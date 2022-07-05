<?php

namespace App\Repository\Codex;

use App\Entity\Codex\SAVUUTIL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SAVUUTIL>
 *
 * @method SAVUUTIL|null find($id, $lockMode = null, $lockVersion = null)
 * @method SAVUUTIL|null findOneBy(array $criteria, array $orderBy = null)
 * @method SAVUUTIL[]    findAll()
 * @method SAVUUTIL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SAVUUTILRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SAVUUTIL::class);
    }

    public function add(SAVUUTIL $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SAVUUTIL $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SAVUUTIL[] Returns an array of SAVUUTIL objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SAVUUTIL
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
