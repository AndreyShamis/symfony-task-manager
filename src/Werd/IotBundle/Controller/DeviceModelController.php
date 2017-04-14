<?php

namespace Werd\IotBundle\Controller;

use Werd\IotBundle\Entity\DeviceModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Devicemodel controller.
 *
 * @Route("devicemodel")
 */
class DeviceModelController extends Controller
{
    /**
     * Lists all deviceModel entities.
     *
     * @Route("/", name="devicemodel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $deviceModels = $em->getRepository('IotBundle:DeviceModel')->findAll();

        return $this->render('devicemodel/index.html.twig', array(
            'deviceModels' => $deviceModels,
        ));
    }

    /**
     * Creates a new deviceModel entity.
     *
     * @Route("/new", name="devicemodel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $deviceModel = new Devicemodel();
        $form = $this->createForm('Werd\IotBundle\Form\DeviceModelType', $deviceModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($deviceModel);
            $em->flush($deviceModel);

            return $this->redirectToRoute('devicemodel_show', array('id' => $deviceModel->getId()));
        }

        return $this->render('devicemodel/new.html.twig', array(
            'deviceModel' => $deviceModel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a deviceModel entity.
     *
     * @Route("/{id}", name="devicemodel_show")
     * @Method("GET")
     */
    public function showAction(DeviceModel $deviceModel)
    {
        $deleteForm = $this->createDeleteForm($deviceModel);

        return $this->render('devicemodel/show.html.twig', array(
            'deviceModel' => $deviceModel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing deviceModel entity.
     *
     * @Route("/{id}/edit", name="devicemodel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DeviceModel $deviceModel)
    {
        $deleteForm = $this->createDeleteForm($deviceModel);
        $editForm = $this->createForm('Werd\IotBundle\Form\DeviceModelType', $deviceModel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('devicemodel_edit', array('id' => $deviceModel->getId()));
        }

        return $this->render('devicemodel/edit.html.twig', array(
            'deviceModel' => $deviceModel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a deviceModel entity.
     *
     * @Route("/{id}", name="devicemodel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DeviceModel $deviceModel)
    {
        $form = $this->createDeleteForm($deviceModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($deviceModel);
            $em->flush();
        }

        return $this->redirectToRoute('devicemodel_index');
    }

    /**
     * Creates a form to delete a deviceModel entity.
     *
     * @param DeviceModel $deviceModel The deviceModel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DeviceModel $deviceModel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('devicemodel_delete', array('id' => $deviceModel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
