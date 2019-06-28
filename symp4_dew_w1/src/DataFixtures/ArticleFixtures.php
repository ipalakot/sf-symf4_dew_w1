<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        for ($i=0; $i<=10; $i++) {
            $article = new article ();
            $article ->setTitle("Titre de larticle n° $i")
                     ->setContent("Contenu de larticle N° $i")
                     ->setImage("http://placehold.it/350x150")
                     ->setCreatedAt(new \DateTime());
        // $manager->persist($product);
         $manager->persist($article);
        }

        $manager->flush();

    }
}
