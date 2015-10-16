<?php

namespace StacyMark\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use StacyMark\MainBundle\Entity\Painting;
use StacyMark\MainBundle\Form\PaintingType;

/**
 * Painting controller.
 *
 */
class PaintingController extends Controller
{
    /**
     * Lists all Painting entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('StacyMarkMainBundle:Painting')->findAll();

        return $this->render('StacyMarkMainBundle:Painting:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Painting entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Painting();
        $form = $this->createForm(new PaintingType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('painting_show', array('id' => $entity->getId())));
        }

        return $this->render('StacyMarkMainBundle:Painting:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Painting entity.
     *
     */
    public function newAction()
    {
        $entity = new Painting();
        $form   = $this->createForm(new PaintingType(), $entity);

        return $this->render('StacyMarkMainBundle:Painting:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Painting entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StacyMarkMainBundle:Painting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Painting entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('StacyMarkMainBundle:Painting:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Painting entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StacyMarkMainBundle:Painting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Painting entity.');
        }

        $editForm = $this->createForm(new PaintingType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('StacyMarkMainBundle:Painting:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Painting entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StacyMarkMainBundle:Painting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Painting entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PaintingType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('painting_edit', array('id' => $id)));
        }

        return $this->render('StacyMarkMainBundle:Painting:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Painting entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('StacyMarkMainBundle:Painting')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Painting entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('painting'));
    }

    /**
     * Creates a form to delete a Painting entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
