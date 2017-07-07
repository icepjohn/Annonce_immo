<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/07/2017
 * Time: 14:36
 */
class loadAnnonceurFixtures extends AbstractFixture   implements OrderedFixtureInterface
{



    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //premier annonceur
        $annonceur = new \AppBundle\Entity\User();
        $annonceur->setNom("Picquette");
        $annonceur->setPrenom("jonathan");
        $annonceur->setPassword("123");
        $manager->persist($annonceur);

        $manager->flush();

        //deuxieme annonceur
        $annonceur = new \AppBundle\Entity\User();
        $annonceur->setNom("dubois");
        $annonceur->setPrenom("estelle");
        $annonceur->setPassword("123");
        $manager->persist($annonceur);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }


}