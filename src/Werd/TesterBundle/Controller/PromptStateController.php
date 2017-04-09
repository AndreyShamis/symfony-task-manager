<?php

namespace Werd\TesterBundle\Controller;

use Werd\TesterBundle\Entity\PromptState;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Promptstate controller.
 *
 * @Route("promptstate")
 */
class PromptStateController extends Controller
{
    /**
     * Lists all promptState entities.
     *
     * @Route("/", name="promptstate_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promptStates = $em->getRepository('TesterBundle:PromptState')->findAll();

        return $this->render('promptstate/index.html.twig', array(
            'promptStates' => $promptStates,
        ));
    }

    /**
     * Creates a new promptState entity.
     *
     * @Route("/new", name="promptstate_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $promptState = new Promptstate();
        $form = $this->createForm('Werd\TesterBundle\Form\PromptStateType', $promptState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($promptState);
            $em->flush($promptState);

            return $this->redirectToRoute('promptstate_show', array('id' => $promptState->getId()));
        }

        return $this->render('promptstate/new.html.twig', array(
            'promptState' => $promptState,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a promptState entity.
     *
     * @Route("/{id}", name="promptstate_show")
     * @Method("GET")
     */
    public function showAction(PromptState $promptState)
    {
        $deleteForm = $this->createDeleteForm($promptState);

        return $this->render('promptstate/show.html.twig', array(
            'promptState' => $promptState,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing promptState entity.
     *
     * @Route("/{id}/edit", name="promptstate_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PromptState $promptState)
    {
        $deleteForm = $this->createDeleteForm($promptState);
        $editForm = $this->createForm('Werd\TesterBundle\Form\PromptStateType', $promptState);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('promptstate_edit', array('id' => $promptState->getId()));
        }

        return $this->render('promptstate/edit.html.twig', array(
            'promptState' => $promptState,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a promptState entity.
     *
     * @Route("/{id}", name="promptstate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PromptState $promptState)
    {
        $form = $this->createDeleteForm($promptState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($promptState);
            $em->flush($promptState);
        }

        return $this->redirectToRoute('promptstate_index');
    }

    /**
     * Creates a form to delete a promptState entity.
     *
     * @param PromptState $promptState The promptState entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PromptState $promptState)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('promptstate_delete', array('id' => $promptState->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
