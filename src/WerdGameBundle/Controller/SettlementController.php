<?php

namespace WerdGameBundle\Controller;

use WerdGameBundle\Entity\Settlement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Settlement controller.
 *
 * @Route("settlement")
 */
class SettlementController extends Controller
{
    /**
     * Lists all settlement entities.
     *
     * @Route("/", name="settlement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settlements = $em->getRepository('WerdGameBundle:Settlement')->findAll();

        return $this->render('settlement/index.html.twig', array(
            'settlements' => $settlements,
        ));
    }

    /**
     * Creates a new settlement entity.
     *
     * @Route("/new", name="settlement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settlement = new Settlement();
        $form = $this->createForm('WerdGameBundle\Form\SettlementType', $settlement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settlement);
            $em->flush();

            return $this->redirectToRoute('settlement_show', array('id' => $settlement->getId()));
        }

        return $this->render('settlement/new.html.twig', array(
            'settlement' => $settlement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a settlement entity.
     *
     * @Route("/{id}", name="settlement_show")
     * @Method("GET")
     */
    public function showAction(Settlement $settlement)
    {
        $deleteForm = $this->createDeleteForm($settlement);

        return $this->render('settlement/show.html.twig', array(
            'settlement' => $settlement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing settlement entity.
     *
     * @Route("/{id}/edit", name="settlement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Settlement $settlement)
    {
        $deleteForm = $this->createDeleteForm($settlement);
        $editForm = $this->createForm('WerdGameBundle\Form\SettlementType', $settlement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('settlement_edit', array('id' => $settlement->getId()));
        }

        return $this->render('settlement/edit.html.twig', array(
            'settlement' => $settlement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a settlement entity.
     *
     * @Route("/{id}", name="settlement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Settlement $settlement)
    {
        $form = $this->createDeleteForm($settlement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settlement);
            $em->flush();
        }

        return $this->redirectToRoute('settlement_index');
    }

    /**
     * Creates a form to delete a settlement entity.
     *
     * @param Settlement $settlement The settlement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Settlement $settlement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settlement_delete', array('id' => $settlement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
