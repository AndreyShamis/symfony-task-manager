<?php

namespace WerdGameBundle\Controller;

use WerdGameBundle\Entity\Mine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Mine controller.
 *
 * @Route("mine")
 */
class MineController extends Controller
{
    /**
     * Lists all mine entities.
     *
     * @Route("/", name="mine_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mines = $em->getRepository('WerdGameBundle:Mine')->findAll();

        return $this->render('mine/index.html.twig', array(
            'mines' => $mines,
        ));
    }

    /**
     * Creates a new mine entity.
     *
     * @Route("/new", name="mine_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mine = new Mine();
        $form = $this->createForm('WerdGameBundle\Form\MineType', $mine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mine);
            $em->flush();

            return $this->redirectToRoute('mine_show', array('id' => $mine->getId()));
        }

        return $this->render('mine/new.html.twig', array(
            'mine' => $mine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mine entity.
     *
     * @Route("/{id}", name="mine_show")
     * @Method("GET")
     */
    public function showAction(Mine $mine)
    {
        $deleteForm = $this->createDeleteForm($mine);

        return $this->render('mine/show.html.twig', array(
            'mine' => $mine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mine entity.
     *
     * @Route("/{id}/edit", name="mine_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Mine $mine)
    {
        $deleteForm = $this->createDeleteForm($mine);
        $editForm = $this->createForm('WerdGameBundle\Form\MineType', $mine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mine_edit', array('id' => $mine->getId()));
        }

        return $this->render('mine/edit.html.twig', array(
            'mine' => $mine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mine entity.
     *
     * @Route("/{id}", name="mine_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Mine $mine)
    {
        $form = $this->createDeleteForm($mine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mine);
            $em->flush();
        }

        return $this->redirectToRoute('mine_index');
    }

    /**
     * Creates a form to delete a mine entity.
     *
     * @param Mine $mine The mine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mine $mine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mine_delete', array('id' => $mine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
