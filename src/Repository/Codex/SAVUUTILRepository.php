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

   /**
     * recherche par DCI des medicaments dans CODEX
     *
    * @param [string] $value
    * @return SAVUUTIL[] Returns an array of SAVUUTIL objects
    */
    public function findLikenomSubstance($value): array
    {
        return $this->createQueryBuilder('s')
             // ->andWhere('s.nomSubstance = :val')
             // ->setParameter('val', $value)
             ->andWhere('s.nomSubstance LIKE :val')
             ->setParameter('val', '%' . $value . '%')
             ->orderBy('s.id', 'ASC')
         //    ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

   /**
    * recherche par denomination des medicaments dans CODEX
    *
    * @param [string] $value
    * @return SAVUUTIL[] Returns an array of SAVUUTIL objects
    */
    public function findLikenomVU($value): array
    {
        return $this->createQueryBuilder('s')
                    ->andWhere('s.nomVU LIKE :val')
                    ->setParameter('val', '%' . $value . '%')
                    ->orderBy('s.id', 'ASC')
                    ->getQuery()
                    ->getResult()
                ;
    }
    /**
     * recherche par denomination et/ou DCI des medicaments dans CODEX
     *
     * @param [string] $deno
     * @param [string] $DCI
     * @return SAVUUTIL[] Returns an array of SAVUUTIL objects
     */
    public function findLike_nomVU_nomSubstance($deno, $DCI): array
    {
        $result = $this->createQueryBuilder('s');
        if ($deno != '' and $DCI != '' ) {
            $result = $result 
                        ->andWhere('s.nomVU LIKE :deno AND s.nomSubstance LIKE :DCI')
                        ->setParameter('deno', '%' . $deno . '%')
                        ->setParameter('DCI', '%' . $DCI . '%');
        } elseif ($deno == '' and $DCI != '' ) {
            $result = $result 
                        ->andWhere('s.nomSubstance LIKE :DCI')
                        ->setParameter('DCI', '%' . $DCI . '%');
        } elseif ($deno != '' and $DCI == '' ) {
            $result = $result 
                        ->andWhere('s.nomVU LIKE :deno')
                        ->setParameter('deno', '%' . $deno . '%');
        } else {
            $result = $result ->setMaxResults(100);
        }
            $result = $result
                        ->orderBy('s.id', 'ASC')
                        ->getQuery()
                        ->getResult()
                        ;
            return $result;
    }
}
