<?php

namespace WerdGameBundle\Controller;

use WerdGameBundle\Entity\TypeHero;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typehero controller.
 *
 * @Route("typehero")
 */
class TypeHeroController extends Controller
{
    /**
     * Lists all typeHero entities.
     *
     * @Route("/", name="typehero_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeHeroes = $em->getRepository('WerdGameBundle:TypeHero')->findAll();

        return $this->render('typehero/index.html.twig', array(
            'typeHeroes' => $typeHeroes,
        ));
    }

    /**
     * Creates a new typeHero entity.
     *
     * @Route("/new", name="typehero_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeHero = new Typehero();
        $form = $this->createForm('WerdGameBundle\Form\TypeHeroType', $typeHero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeHero);
            $em->flush();

            return $this->redirectToRoute('typehero_show', array('id' => $typeHero->getId()));
        }

        return $this->render('typehero/new.html.twig', array(
            'typeHero' => $typeHero,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeHero entity.
     *
     * @Route("/{id}", name="typehero_show")
     * @Method("GET")
     */
    public function showAction(TypeHero $typeHero)
    {
        $deleteForm = $this->createDeleteForm($typeHero);

        return $this->render('typehero/show.html.twig', array(
            'typeHero' => $typeHero,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeHero entity.
     *
     * @Route("/{id}/edit", name="typehero_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeHero $typeHero)
    {
        $deleteForm = $this->createDeleteForm($typeHero);
        $editForm = $this->createForm('WerdGameBundle\Form\TypeHeroType', $typeHero);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typehero_edit', array('id' => $typeHero->getId()));
        }

        return $this->render('typehero/edit.html.twig', array(
            'typeHero' => $typeHero,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeHero entity.
     *
     * @Route("/{id}", name="typehero_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeHero $typeHero)
    {
        $form = $this->createDeleteForm($typeHero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeHero);
            $em->flush();
        }

        return $this->redirectToRoute('typehero_index');
    }

    /**
     * Creates a form to delete a typeHero entity.
     *
     * @param TypeHero $typeHero The typeHero entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeHero $typeHero)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typehero_delete', array('id' => $typeHero->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
