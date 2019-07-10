<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;



class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$faker = \Faker\Factory::create('fr_FR');
    	
// 3 Catégories Fakées    	
    	for ($i = 0; $i < 3; $i++) {
    		$category = new Category();
    		$category -> setTitle($faker->sentence())
    				  -> setDescription($faker->paragraph());    		
    				  
    		$manager  -> persist($category);
    
    		
// creation de 3 - 4 Articles
        for ($j=1; $j<= mt_rand(4, 6); $j++) {
        	
            $article = new Article ();
            
            $content = '<p>'.join($faker->paragraphs(5),'</p><p>').'</p>';
           
            $article ->setTitle($faker->sentence())
            		 ->setContent($content)
            		 ->setImage($faker->imageUrl())
            		 ->setCreatedAt($faker->dateTimeBetween('-6 months'))
            		 ->setCategory($category);
        
// $manager->persist($product);
         $manager->persist($article);
         
		 // Creons des commentaires pour les articles 
         for ($k=1; $k<=mt_rand(4, 10); $k++){
         	
         	$comment = New Comment();
         	
         	$content = '<p>'.join($faker->paragraphs(2),'</p><p>').'</p>';
         	
    //     	$now = new \DateTime();
    //     	$interval = $now->diff($article->getCreatedAt());
         	$days = (new \DateTime())->diff ($article->getCreatedAt())->days;
//         	$minimum = '-'.$days.'days';
         	
         	$comment->setAuthor($faker->name)
         			->setContent($content)
	       			->setCreatedAt($faker->dateTimeBetween('-'. $days. 'days'))
         			->setArticle($article);
         	
         			$manager-> persist($comment);
         }
        }
    }
    
    $manager -> flush();
  }
}
