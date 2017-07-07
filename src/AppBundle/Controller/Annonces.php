<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/07/2017
 * Time: 13:35
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class Annonces extends controller
{
    /**
     * @Route("/annonce")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Annonce:annonces.html.twig', array(
            // ...
        ));
    }
}