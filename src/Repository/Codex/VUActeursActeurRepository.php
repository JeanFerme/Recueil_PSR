<?php

namespace App\Repository\Codex;

use App\Entity\Codex\VUActeursActeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VUActeursActeur>
 *
 * @method VUActeursActeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method VUActeursActeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method VUActeursActeur[]    findAll()
 * @method VUActeursActeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VUActeursActeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VUActeursActeur::class);
    }

    public function add(VUActeursActeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VUActeursActeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VUActeursActeur[] Returns an array of VUActeursActeur objects
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

//    public function findOneBySomeField($value): ?VUActeursActeur
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
