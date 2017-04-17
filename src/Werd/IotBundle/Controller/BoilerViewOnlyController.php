<?php

namespace Werd\IotBundle\Controller;

use Werd\IotBundle\Entity\BoilerViewOnly;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Boilerviewonly controller.
 *
 * @Route("boilerviewonly")
 */
class BoilerViewOnlyController extends Controller
{
    /**
     * Lists all boilerViewOnly entities.
     *
     * @Route("/", name="boilerviewonly_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boilerViewOnlies = $em->getRepository('IotBundle:BoilerViewOnly')->findAll();

        return $this->render('boilerviewonly/index.html.twig', array(
            'boilerViewOnlies' => $boilerViewOnlies,
        ));
    }

    /**
     * Creates a new boilerViewOnly entity.
     *
     * @Route("/new", name="boilerviewonly_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $boilerViewOnly = new Boilerviewonly();
        $form = $this->createForm('Werd\IotBundle\Form\BoilerViewOnlyType', $boilerViewOnly);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($boilerViewOnly);
            $em->flush($boilerViewOnly);

            return $this->redirectToRoute('boilerviewonly_show', array('id' => $boilerViewOnly->getId()));
        }

        return $this->render('boilerviewonly/new.html.twig', array(
            'boilerViewOnly' => $boilerViewOnly,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a boilerViewOnly entity.
     *
     * @Route("/{id}", name="boilerviewonly_show")
     * @Method("GET")
     */
    public function showAction(BoilerViewOnly $boilerViewOnly)
    {
        $deleteForm = $this->createDeleteForm($boilerViewOnly);

        return $this->render('boilerviewonly/show.html.twig', array(
            'boilerViewOnly' => $boilerViewOnly,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing boilerViewOnly entity.
     *
     * @Route("/{id}/edit", name="boilerviewonly_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BoilerViewOnly $boilerViewOnly)
    {
        $deleteForm = $this->createDeleteForm($boilerViewOnly);
        $editForm = $this->createForm('Werd\IotBundle\Form\BoilerViewOnlyType', $boilerViewOnly);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boilerviewonly_edit', array('id' => $boilerViewOnly->getId()));
        }

        return $this->render('boilerviewonly/edit.html.twig', array(
            'boilerViewOnly' => $boilerViewOnly,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a boilerViewOnly entity.
     *
     * @Route("/{id}", name="boilerviewonly_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BoilerViewOnly $boilerViewOnly)
    {
        $form = $this->createDeleteForm($boilerViewOnly);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($boilerViewOnly);
            $em->flush();
        }

        return $this->redirectToRoute('boilerviewonly_index');
    }

    /**
     * Creates a form to delete a boilerViewOnly entity.
     *
     * @param BoilerViewOnly $boilerViewOnly The boilerViewOnly entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BoilerViewOnly $boilerViewOnly)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boilerviewonly_delete', array('id' => $boilerViewOnly->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
