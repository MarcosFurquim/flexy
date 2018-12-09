<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository {
    /**

    */
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Product::class);
    }

    public function transform(Product $product)
{
    return [
        'id'    => (int) $product->getId(),
        'title' => (string) $product->getTitle(),
        'description' => (string) $product->getDescription(),
        'image' => (string) $product->getImage(),
        'stock' => (string) $product->getStock(),
        'tag' => (int) $product->getTag()
    ];
}

    public function get($productId) {
        return  $this->findOneBy(array('id' =>$productId));
    }

    public function getAll() {  
        $products = $this->findAll();
        $productsArray = [];

        foreach ($products as $product) {
            $productArray =  [
                'id'    => (int) $product->getId(),
                'title' => (string) $product->getTitle(),
                'description' => (string) $product->getDescription(),
                'image' => (string) $product->getImage(),
                'stock' => (string) $product->getStock(),
                'tag' => (int) $product->getTag()
        ];
            $productsArray[] =  $productArray;
        }

        return $productsArray;
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
