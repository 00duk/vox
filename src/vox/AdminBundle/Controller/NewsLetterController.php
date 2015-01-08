<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use vox\AdminBundle\Entity\NewsLetter;
use vox\AdminBundle\Form\NewsLetterType;
use Symfony\Component\HttpFoundation\Request;

class NewsLetterController extends Controller
{

    /**
     * @Route("/admin/newsletters", name="newsletter_index")
     * @Template("")
     */
    public function newsletter_indexAction()
    {
        $em = $this->getDoctrine()->getManager();
                $repository = $em->getRepository('voxAdminBundle:NewsLetter');

        $listNewsletters = $repository->findAll();

        return array('listNewsletters' => $listNewsletters);
    }


    /**
     * @Route("/admin/add_newsletter", name="newsletter_add")
     * @Template("")
     */
    public function newsletter_addAction(Request $request)
    {
        $newsletter = new NewsLetter();
        $form = $this->get('form.factory')->create(new NewsLetterType(), $newsletter);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Newsletter saved.');

            return $this->redirect($this->generateUrl('newsletter_index'));
        }


        return array('form' => $form->createView());

    }



    /**
     * @Route("/admin/edit_newsletter/{id}", name="newsletter_edit")
     * @Template("")
     */

    public function newsletter_editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:NewsLetter');

        $newsletter = $repository->find($id);

        $form = $this->get('form.factory')->create(new NewsLetterType(), $newsletter);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Newsletter edited.');

            return $this->redirect($this->generateUrl('newsletter_index'));
        }


        return array('form' => $form->createView());
    }

    /**
     * @Route("/admin/newsletter_delete/{id}", name="newsletter_delete")
     * @Template("")
     */

    public function newsletter_deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:NewsLetter');

        $newsletter = $repository->find($id);

        $em->remove($newsletter);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Newsletter deleted.');

        return $this->redirect($this->generateUrl('newsletter_index'));
    }


    /**
     * @Route("/admin/newsletter_preview/{id}", name="newsletter_preview")
     * @Template("")
     */

    public function newsletter_previewAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:NewsLetter');

        $newsletter = $repository->find($id);

        #$request->getSession()->getFlashBag()->add('notice', 'Subscriber deleted.');

        $content = $newsletter->getMessage();
        $subject = $newsletter->getSubject();

        return array('content' => $content, 'subject' => $subject, 'id' => $id);
    }


    /**
     * @Route("/admin/newsletter_send/{id}", name="newsletter_send")
     * @Template("")
     */

    public function newsletter_sendAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:NewsLetter');

        $newsletter = $repository->find($id);

        #$request->getSession()->getFlashBag()->add('notice', 'Subscriber deleted.');

        $content = $newsletter->getMessage();
        $subject = $newsletter->getSubject();

        $repository = $em->getRepository('voxAdminBundle:Subscriber');
        $subs = $repository->findAll();

        foreach($subs as $sub) {
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom('send@example.com')
                ->setTo($sub->getEmail())
                ->setBody(
                    $this->renderView(
                        'voxAdminBundle:Mail:template.html.twig',
                        array('content' => $content)
                    ), 'text/html'
                );

            $this->get('mailer')->send($message);
        }

        return $this->redirect($this->generateUrl('newsletter_index'));
    }
}
