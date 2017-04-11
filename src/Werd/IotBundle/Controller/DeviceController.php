<?php

namespace Werd\IotBundle\Controller;

use Werd\IotBundle\Entity\Device;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Device controller.
 *
 * @Route("device")
 */
class DeviceController extends Controller
{
    /**
     * Lists all device entities.
     *
     * @Route("/", name="device_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $devices = $em->getRepository('IotBundle:Device')->findAll();

        return $this->render('device/index.html.twig', array(
            'devices' => $devices,
        ));
    }

    /**
     * Creates a new device entity.
     *
     * @Route("/new", name="device_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $device = new Device();
        $form = $this->createForm('Werd\IotBundle\Form\DeviceType', $device);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($device);
            $em->flush($device);

            return $this->redirectToRoute('device_show', array('id' => $device->getId()));
        }

        return $this->render('device/new.html.twig', array(
            'device' => $device,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a device entity.
     *
     * @Route("/{id}", name="device_show")
     * @Method("GET")
     */
    public function showAction(Device $device)
    {
        $deleteForm = $this->createDeleteForm($device);

        return $this->render('device/show.html.twig', array(
            'device' => $device,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing device entity.
     *
     * @Route("/{id}/edit", name="device_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Device $device)
    {
        $deleteForm = $this->createDeleteForm($device);
        $editForm = $this->createForm('Werd\IotBundle\Form\DeviceType', $device);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('device_edit', array('id' => $device->getId()));
        }

        return $this->render('device/edit.html.twig', array(
            'device' => $device,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a device entity.
     *
     * @Route("/{id}", name="device_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Device $device)
    {
        $form = $this->createDeleteForm($device);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($device);
            $em->flush();
        }

        return $this->redirectToRoute('device_index');
    }

    /**
     * Creates a form to delete a device entity.
     *
     * @param Device $device The device entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Device $device)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('device_delete', array('id' => $device->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
