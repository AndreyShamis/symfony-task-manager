<?php

namespace Werd\FinanceBundle\Controller;

use Werd\FinanceBundle\Entity\StockData;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Stockdatum controller.
 *
 * @Route("stockdata")
 */
class StockDataController extends Controller
{
    /**
     * Lists all stockDatum entities.
     *
     * @Route("/", name="stockdata_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stockDatas = $em->getRepository('WerdFinanceBundle:StockData')->findAll();

        return $this->render('stockdata/index.html.twig', array(
            'stockDatas' => $stockDatas,
        ));
    }

    /**
     * Creates a new stockDatum entity.
     *
     * @Route("/new", name="stockdata_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $stockDatum = new Stockdatum();
        $form = $this->createForm('Werd\FinanceBundle\Form\StockDataType', $stockDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stockDatum);
            $em->flush($stockDatum);

            return $this->redirectToRoute('stockdata_show', array('id' => $stockDatum->getId()));
        }

        return $this->render('stockdata/new.html.twig', array(
            'stockDatum' => $stockDatum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stockDatum entity.
     *
     * @Route("/{id}", name="stockdata_show")
     * @Method("GET")
     */
    public function showAction(StockData $stockDatum)
    {
        $deleteForm = $this->createDeleteForm($stockDatum);

        return $this->render('stockdata/show.html.twig', array(
            'stockDatum' => $stockDatum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stockDatum entity.
     *
     * @Route("/{id}/edit", name="stockdata_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, StockData $stockDatum)
    {
        $deleteForm = $this->createDeleteForm($stockDatum);
        $editForm = $this->createForm('Werd\FinanceBundle\Form\StockDataType', $stockDatum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stockdata_edit', array('id' => $stockDatum->getId()));
        }

        return $this->render('stockdata/edit.html.twig', array(
            'stockDatum' => $stockDatum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stockDatum entity.
     *
     * @Route("/{id}", name="stockdata_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, StockData $stockDatum)
    {
        $form = $this->createDeleteForm($stockDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stockDatum);
            $em->flush($stockDatum);
        }

        return $this->redirectToRoute('stockdata_index');
    }

    /**
     * Creates a form to delete a stockDatum entity.
     *
     * @param StockData $stockDatum The stockDatum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StockData $stockDatum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stockdata_delete', array('id' => $stockDatum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
