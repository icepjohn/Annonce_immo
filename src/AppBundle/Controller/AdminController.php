<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/07/2017
 * Time: 13:18
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{

    /**
     * @Route("/admin")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Admin:index.html.twig', array(
            // ...
        ));
    }


}