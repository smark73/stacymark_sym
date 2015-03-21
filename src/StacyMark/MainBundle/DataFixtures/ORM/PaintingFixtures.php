<?php

namespace StacyMark\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use StacyMark\MainBundle\Entity\Painting;

class PaintingFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $painting1 = new Painting();
        $painting1->setTitle('Something In The Air - Shadow Of Cumulus');
        $painting1->setImage('something-in-the-air-shadow-of-cumulus.jpg');
        $painting1->setThumb('t-something-in-the-air-shadow-of-cumulus.jpg');
        $painting1->setMedium('Mixed Media on Panel');
        $painting1->setDim('30 x 30');
        $painting1->setDateFin('2008');
        $painting1->setAvailable('Sold');
        $painting1->setSlug('something-in-the-air-shadow-of-cumulus');
        $manager->persist($painting1);
                
        $painting2 = new Painting();
        $painting2->setTitle('Standing Watch Over Things Unseen');
        $painting2->setImage('standing-watch-over-things-unseen.jpg');
        $painting2->setThumb('t-standing-watch-over-things-unseen.jpg');
        $painting2->setMedium('Mixed Media on Panel');
        $painting2->setDim('18 x 18');
        $painting2->setDateFin('2008');
        $painting2->setAvailable('Sold');
        $painting2->setSlug('standing-watch-over-things-unseen');
        $manager->persist($painting2);
        
        $manager->flush();        
    }
}

?>
