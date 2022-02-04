<?php

namespace App\Repository;

use App\Entity\TvShow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TvShow|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvShow|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvShow[]    findAll()
 * @method TvShow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvShowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TvShow::class);
    }

    /**
     * Retourne toutes les séries dont le titre
     * contient la valeur de $searchTerm
     * 
     * @return TvShow[] Returns an array of TvShow objects
     */
    public function findAllBySearchTerm($searchTerm)
    {
        return
            $this->createQueryBuilder('tvshow')

            //WHERE title LIKE searchTerm
            ->andWhere('tvshow.title LIKE :searchTerm')
            ->setParameter(':searchTerm', "%$searchTerm%")

            ->getQuery()
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?TvShow
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
