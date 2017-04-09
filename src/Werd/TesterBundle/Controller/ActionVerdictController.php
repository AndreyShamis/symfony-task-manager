<?php

namespace Werd\TesterBundle\Controller;

use Werd\TesterBundle\Entity\ActionVerdict;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Actionverdict controller.
 *
 * @Route("actionverdict")
 */
class ActionVerdictController extends Controller
{
    /**
     * Lists all actionVerdict entities.
     *
     * @Route("/", name="actionverdict_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actionVerdicts = $em->getRepository('TesterBundle:ActionVerdict')->findAll();

        return $this->render('actionverdict/index.html.twig', array(
            'actionVerdicts' => $actionVerdicts,
        ));
    }

    /**
     * Creates a new actionVerdict entity.
     *
     * @Route("/new", name="actionverdict_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $actionVerdict = new Actionverdict();
        $form = $this->createForm('Werd\TesterBundle\Form\ActionVerdictType', $actionVerdict);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actionVerdict);
            $em->flush($actionVerdict);

            return $this->redirectToRoute('actionverdict_show', array('id' => $actionVerdict->getId()));
        }

        return $this->render('actionverdict/new.html.twig', array(
            'actionVerdict' => $actionVerdict,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a actionVerdict entity.
     *
     * @Route("/{id}", name="actionverdict_show")
     * @Method("GET")
     */
    public function showAction(ActionVerdict $actionVerdict)
    {
        $deleteForm = $this->createDeleteForm($actionVerdict);

        return $this->render('actionverdict/show.html.twig', array(
            'actionVerdict' => $actionVerdict,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing actionVerdict entity.
     *
     * @Route("/{id}/edit", name="actionverdict_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ActionVerdict $actionVerdict)
    {
        $deleteForm = $this->createDeleteForm($actionVerdict);
        $editForm = $this->createForm('Werd\TesterBundle\Form\ActionVerdictType', $actionVerdict);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actionverdict_edit', array('id' => $actionVerdict->getId()));
        }

        return $this->render('actionverdict/edit.html.twig', array(
            'actionVerdict' => $actionVerdict,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a actionVerdict entity.
     *
     * @Route("/{id}", name="actionverdict_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ActionVerdict $actionVerdict)
    {
        $form = $this->createDeleteForm($actionVerdict);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actionVerdict);
            $em->flush($actionVerdict);
        }

        return $this->redirectToRoute('actionverdict_index');
    }

    /**
     * Creates a form to delete a actionVerdict entity.
     *
     * @param ActionVerdict $actionVerdict The actionVerdict entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ActionVerdict $actionVerdict)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actionverdict_delete', array('id' => $actionVerdict->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
