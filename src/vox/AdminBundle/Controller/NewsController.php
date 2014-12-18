<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use vox\AdminBundle\Entity\News;
use vox\AdminBundle\Form\NewsType;

class NewsController extends Controller
{
    /**
     * @Route("/admin/news", name="news_index")
     * @Template()
     */
    public function news_indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:News');

        $listNews = $repository->findAll();

        return array('listNews' => $listNews);
    }

    /**
     * @Route("/admin/add_news", name="news_add")
     * @Template("")
     */
    public function news_addAction(Request $request)
    {
        $news = new News();
        $form = $this->get('form.factory')->create(new NewsType(), $news);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'News saved.');

            return $this->redirect($this->generateUrl('news_index'));
        }


        return array('form' => $form->createView());

    }


    /**
     * @Route("/admin/edit_news/{id}", name="news_edit")
     * @Template("")
     */

    public function news_editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:News');

        $news = $repository->find($id);

        $form = $this->get('form.factory')->create(new NewsType(), $news);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'News edited.');

            return $this->redirect($this->generateUrl('news_index'));
        }


        return array('form' => $form->createView());
    }

    /**
     * @Route("/admin/news_delete/{id}", name="news_delete")
     * @Template("")
     */

    public function news_deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:News');

        $news = $repository->find($id);

        $em->remove($news);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'News deleted.');

        return $this->redirect($this->generateUrl('news_index'));
    }
}
