<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Annonce;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/07/2017
 * Time: 15:01
 */
class LoadAnnonceFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //premiere annonce
        $annonce = new Annonce();
        $annonce -> setPrix(75000);
        $annonce -> setCodePostal(59117);
        $manager->persist($annonce);
        $this->setReference('annonce 1', $annonce);

        $manager->flush();

        //premiere annonce
        $annonce = new Annonce();
        $annonce -> setPrix(150000);
        $annonce -> setCodePostal(59000);
        $manager->persist($annonce);
        $this->setReference('annonce 2', $annonce);

        $manager->flush();

        //premiere annonce
        $annonce = new Annonce();
        $annonce -> setPrix(10000);
        $annonce -> setCodePostal(59800);
        $manager->persist($annonce);
        $this->setReference('annonce 3', $annonce);

        $manager->flush();

        //premiere annonce
        $annonce = new Annonce();
        $annonce -> setPrix(50000);
        $annonce -> setCodePostal(59230);
        $manager->persist($annonce);
        $this->setReference('annonce 4', $annonce);

        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
       return 2;
    }
}