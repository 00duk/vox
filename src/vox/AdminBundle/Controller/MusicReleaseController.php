<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use vox\AdminBundle\Entity\MusicRelease;
use vox\AdminBundle\Form\MusicReleaseType;
use Symfony\Component\HttpFoundation\Request;

class MusicReleaseController extends Controller
{
    /**
     * @Route("/admin/releases", name="release_index")
     * @Template("")
     */
    public function release_indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:MusicRelease');

        $listReleases = $repository->findAll();

        return array('listReleases' => $listReleases);
    }

    /**
     * @Route("/admin/add_release", name="release_add")
     * @Template("")
     */

    public function release_addAction(Request $request)
    {
        $music_release = new MusicRelease();
        $form = $this->get('form.factory')->create(new MusicReleaseType(), $music_release);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $music_release->setArtistName($form->get('artist')->getData()->getName());
            $em->persist($music_release);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Release saved.');

            return $this->redirect($this->generateUrl('release_index'));
        }


        return array('form' => $form->createView());
    }


    /**
     * @Route("/admin/edit_release/{id}", name="release_edit")
     * @Template("")
     */

    public function release_editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:MusicRelease');

        $release = $repository->find($id);

        $form = $this->get('form.factory')->create(new MusicReleaseType(), $release);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $release->setArtistName($form->get('artist')->getData()->getName());
            $em->persist($release);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Release edited.');

            return $this->redirect($this->generateUrl('release_index'));
        }


        return array('form' => $form->createView(), 'img' => $release->getImage());
    }

    /**
     * @Route("/admin/release_delete/{id}", name="release_delete")
     * @Template("")
     */

    public function release_deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:MusicRelease');

        $release = $repository->find($id);

        $em->remove($release);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Release deleted.');

        return $this->redirect($this->generateUrl('release_index'));
    }
}
