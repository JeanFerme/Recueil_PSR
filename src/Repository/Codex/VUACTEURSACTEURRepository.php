<?php

namespace App\Repository\Codex;

use App\Entity\Codex\VUACTEURSACTEUR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VUACTEURSACTEUR>
 *
 * @method VUACTEURSACTEUR|null find($id, $lockMode = null, $lockVersion = null)
 * @method VUACTEURSACTEUR|null findOneBy(array $criteria, array $orderBy = null)
 * @method VUACTEURSACTEUR[]    findAll()
 * @method VUACTEURSACTEUR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VUACTEURSACTEURRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VUACTEURSACTEUR::class);
    }

    public function add(VUACTEURSACTEUR $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VUACTEURSACTEUR $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VUACTEURSACTEUR[] Returns an array of VUACTEURSACTEUR objects
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

//    public function findOneBySomeField($value): ?VUACTEURSACTEUR
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
