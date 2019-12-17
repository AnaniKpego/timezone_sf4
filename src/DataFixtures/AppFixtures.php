<?php

namespace App\DataFixtures;

use App\Entity\Fuseau;
use App\Entity\Fuseauhoraire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $fuseau = new Fuseauhoraire();
       $fuseau->setFuseau('Pacific/Port_Moresby')
           ->setVille('Port Moresby, Lae, Mount Hagen, Popondetta, Madang')
           ->setUtc('UTC+10');

       $manager->persist($fuseau);

        $manager->flush();
    }
}
