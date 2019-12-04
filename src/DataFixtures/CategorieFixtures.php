<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        $faker = Faker\Factory::create();
        
        // generate data by accessing properties
        //echo $faker->name;
        // 'Lucy Cechtelar';
        
        for($i=1;$i<=10; $i++){
            $name=$faker->word;
            $categorie=new Categorie();
            $categorie->setNom($name);
            $manager->persist($categorie);
            
            for($j=1;$j<=4; $j++){
                $produit=new Produit();
                $produit->setLibelle($faker->word);
                $produit->setPrix($faker->randomFloat(2, $min=10.00, $max=1000.00));
                $produit->setCategorie($categorie);
                $manager->persist($produit);
            }
        }
        $manager->flush();
    }
}
