<?php

namespace Olexa\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Olexa\TestBundle\Entity\Sklad;
use Olexa\TestBundle\Form\SkladType;

/**
 * Sklad controller.
 *
 * @Route("/sklad")
 */
class SkladController extends Controller
{

    /**
     * Lists all Sklad entities.
     *
     * @Route("/", name="sklad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OlexaTestBundle:Sklad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Sklad entity.
     *
     * @Route("/", name="sklad_create")
     * @Method("POST")
     * @Template("OlexaTestBundle:Sklad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Sklad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sklad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Sklad entity.
     *
     * @param Sklad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Sklad $entity)
    {
        $form = $this->createForm(new SkladType(), $entity, array(
            'action' => $this->generateUrl('sklad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Sklad entity.
     *
     * @Route("/new", name="sklad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Sklad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Sklad entity.
     *
     * @Route("/{id}", name="sklad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OlexaTestBundle:Sklad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sklad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Sklad entity.
     *
     * @Route("/{id}/edit", name="sklad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OlexaTestBundle:Sklad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sklad entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Sklad entity.
    *
    * @param Sklad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sklad $entity)
    {
        $form = $this->createForm(new SkladType(), $entity, array(
            'action' => $this->generateUrl('sklad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Sklad entity.
     *
     * @Route("/{id}", name="sklad_update")
     * @Method("PUT")
     * @Template("OlexaTestBundle:Sklad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OlexaTestBundle:Sklad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sklad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sklad_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Sklad entity.
     *
     * @Route("/{id}", name="sklad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OlexaTestBundle:Sklad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sklad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sklad'));
    }

    /**
     * Creates a form to delete a Sklad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sklad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
