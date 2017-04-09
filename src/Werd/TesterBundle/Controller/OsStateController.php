<?php

namespace Werd\TesterBundle\Controller;

use Werd\TesterBundle\Entity\OsState;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Osstate controller.
 *
 * @Route("osstate")
 */
class OsStateController extends Controller
{
    /**
     * Lists all osState entities.
     *
     * @Route("/", name="osstate_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $osStates = $em->getRepository('TesterBundle:OsState')->findAll();

        return $this->render('osstate/index.html.twig', array(
            'osStates' => $osStates,
        ));
    }

    /**
     * Creates a new osState entity.
     *
     * @Route("/new", name="osstate_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $osState = new Osstate();
        $form = $this->createForm('Werd\TesterBundle\Form\OsStateType', $osState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($osState);
            $em->flush($osState);

            return $this->redirectToRoute('osstate_show', array('id' => $osState->getId()));
        }

        return $this->render('osstate/new.html.twig', array(
            'osState' => $osState,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a osState entity.
     *
     * @Route("/{id}", name="osstate_show")
     * @Method("GET")
     */
    public function showAction(OsState $osState)
    {
        $deleteForm = $this->createDeleteForm($osState);

        return $this->render('osstate/show.html.twig', array(
            'osState' => $osState,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing osState entity.
     *
     * @Route("/{id}/edit", name="osstate_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OsState $osState)
    {
        $deleteForm = $this->createDeleteForm($osState);
        $editForm = $this->createForm('Werd\TesterBundle\Form\OsStateType', $osState);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('osstate_edit', array('id' => $osState->getId()));
        }

        return $this->render('osstate/edit.html.twig', array(
            'osState' => $osState,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a osState entity.
     *
     * @Route("/{id}", name="osstate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OsState $osState)
    {
        $form = $this->createDeleteForm($osState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($osState);
            $em->flush($osState);
        }

        return $this->redirectToRoute('osstate_index');
    }

    /**
     * Creates a form to delete a osState entity.
     *
     * @param OsState $osState The osState entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OsState $osState)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('osstate_delete', array('id' => $osState->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
