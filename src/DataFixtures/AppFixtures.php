<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\QuestionTargetFactory;
use App\Factory\QuestionFactory;
use App\Factory\AnswerFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        QuestionTargetFactory::new()->createMany(3);
     
        QuestionFactory::new()->createMany(6, function(){return ['client' => QuestionTargetFactory::random(),'answer' => AnswerFactory::new()];});


        

        // $manager->persist($product);

        $manager->flush();
    }
}
