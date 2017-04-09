<?php

namespace Werd\TesterBundle\Controller;

use Werd\TesterBundle\Entity\SkipMode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Skipmode controller.
 *
 * @Route("skipmode")
 */
class SkipModeController extends Controller
{
    /**
     * Lists all skipMode entities.
     *
     * @Route("/", name="skipmode_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $skipModes = $em->getRepository('TesterBundle:SkipMode')->findAll();

        return $this->render('skipmode/index.html.twig', array(
            'skipModes' => $skipModes,
        ));
    }

    /**
     * Creates a new skipMode entity.
     *
     * @Route("/new", name="skipmode_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $skipMode = new Skipmode();
        $form = $this->createForm('Werd\TesterBundle\Form\SkipModeType', $skipMode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skipMode);
            $em->flush($skipMode);

            return $this->redirectToRoute('skipmode_show', array('id' => $skipMode->getId()));
        }

        return $this->render('skipmode/new.html.twig', array(
            'skipMode' => $skipMode,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a skipMode entity.
     *
     * @Route("/{id}", name="skipmode_show")
     * @Method("GET")
     */
    public function showAction(SkipMode $skipMode)
    {
        $deleteForm = $this->createDeleteForm($skipMode);

        return $this->render('skipmode/show.html.twig', array(
            'skipMode' => $skipMode,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing skipMode entity.
     *
     * @Route("/{id}/edit", name="skipmode_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SkipMode $skipMode)
    {
        $deleteForm = $this->createDeleteForm($skipMode);
        $editForm = $this->createForm('Werd\TesterBundle\Form\SkipModeType', $skipMode);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('skipmode_edit', array('id' => $skipMode->getId()));
        }

        return $this->render('skipmode/edit.html.twig', array(
            'skipMode' => $skipMode,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a skipMode entity.
     *
     * @Route("/{id}", name="skipmode_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SkipMode $skipMode)
    {
        $form = $this->createDeleteForm($skipMode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($skipMode);
            $em->flush($skipMode);
        }

        return $this->redirectToRoute('skipmode_index');
    }

    /**
     * Creates a form to delete a skipMode entity.
     *
     * @param SkipMode $skipMode The skipMode entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SkipMode $skipMode)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('skipmode_delete', array('id' => $skipMode->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
