<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/07/2017
 * Time: 13:53
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class Recherche extends controller
{
    /**
     * @Route("/recherche")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Recherche:recherche.html.twig', array(
            // ...
        ));
    }
}