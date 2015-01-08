<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use vox\AdminBundle\Entity\Subscriber;
use vox\AdminBundle\Form\SubscriberType;
use Symfony\Component\HttpFoundation\Request;

class SubscriberController extends Controller
{

    /**
     * @Route("/admin/subscribers", name="subscriber_index")
     * @Template("")
     */
    public function subscriber_indexAction()
    {
        $em = $this->getDoctrine()->getManager();
                $repository = $em->getRepository('voxAdminBundle:Subscriber');

        $listSubscribers = $repository->findAll();

        return array('listSubscribers' => $listSubscribers);
    }


    /**
     * @Route("/admin/add_subscriber", name="subscriber_add")
     * @Template("")
     */
    public function subscriber_addAction(Request $request)
    {
        $subscriber = new Subscriber();
        $form = $this->get('form.factory')->create(new SubscriberType(), $subscriber);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($subscriber);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Subscriber saved.');

            return $this->redirect($this->generateUrl('subscriber_index'));
        }


        return array('form' => $form->createView());

    }



    /**
     * @Route("/admin/edit_subscriber/{id}", name="subscriber_edit")
     * @Template("")
     */

    public function subscriber_editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:Subscriber');

        $subscriber = $repository->find($id);

        $form = $this->get('form.factory')->create(new SubscriberType(), $subscriber);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subscriber);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Subscriber edited.');

            return $this->redirect($this->generateUrl('subscriber_index'));
        }


        return array('form' => $form->createView());
    }

    /**
     * @Route("/admin/subscriber_delete/{id}", name="subscriber_delete")
     * @Template("")
     */

    public function subscriber_deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:Subscriber');

        $subscriber = $repository->find($id);

        $em->remove($subscriber);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Subscriber deleted.');

        return $this->redirect($this->generateUrl('subscriber_index'));
    }


}
