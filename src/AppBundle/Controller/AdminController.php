<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/07/2017
 * Time: 13:18
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use UserType;

class AdminController extends Controller
{

    /**
     * @Route("/admin")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Admin:index.html.twig', array(// ...
        ));
    }

    /**
     *
     * @Route("/formulaire/{id}", name="admin_user_edit")
     * @Route("/formulaire", name="admin_user_new")
     */

    public function formAction(Request $request, $id = null)
    {

        $user = new User();

        if ($id != null) {
            $repo = $this->getDoctrine()->getRepository('AppBundle:User');

            $user = $repo->findOneById($id);
        }

        $form = $this->createForm(
            UserType::class,
            $user,
            [
                "method" => "post"
            ]
        );
        $form->handleRequest($request);

        // Only persist if form is submitted and validation tests are all ok
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Entity persistence
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                // Add flash message
                $this->addFlash('info', 'Vous avez bien été ajouté');

                // Redirection to /new-tag route
                return $this->redirectToRoute('admin_user_home');
            } catch (UniqueConstraintViolationException $ex) {
                // Add flash message
                $this->addFlash('danger', 'Cette identifiant existe déja!!!');
            }
        }
        return $this->render('AppBundle:Recherche:recherche.html.twig', [
            "userForm" => $form->createView()
        ]);
    }
    /**
     *
     * @Route("/suppression/{id}", name="admin_actor_delete")
     */
    public function deleteAction($id)
    {

        $repo = $this->getDoctrine()->getRepository('AppBundle:User');

        $user = $repo->findOneById($id);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();

            $this->addFlash('info', 'Votre compte es bien suprimé');
        } catch (Exception $e) {
            $this->addFlash('danger', 'Votre compte as pas été suprimé');
        }
        return $this->redirectToRoute("admin_user_home");
    }
}