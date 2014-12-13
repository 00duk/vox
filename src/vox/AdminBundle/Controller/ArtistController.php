<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use vox\AdminBundle\Entity\Artist;
use vox\AdminBundle\Form\ArtistType;
use Symfony\Component\HttpFoundation\Request;

class ArtistController extends Controller
{

    /**
     * @Route("/admin/artists", name="artist_index")
     * @Template("")
     */
    public function artist_indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:Artist');

        $listArtists = $repository->findAll();

        return array('listArtists' => $listArtists);
    }

    /**
     * @Route("/admin/add_artist", name="artist_add")
     * @Template("")
     */

    public function artist_addAction(Request $request)
    {
        $artist = new Artist();
        $form = $this->get('form.factory')->create(new ArtistType(), $artist);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($artist);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Artist saved.');

            return $this->redirect($this->generateUrl('artist_index'));
        }


        return array('form' => $form->createView());
    }





    /**
     * @Route("/admin/edit_artist/{id}", name="artist_edit")
     * @Template("")
     */

    public function artist_editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:Artist');

        $artist = $repository->find($id);

        $form = $this->get('form.factory')->create(new ArtistType(), $artist);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artist);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Artist edited.');

            return $this->redirect($this->generateUrl('artist_index'));
        }


        return array('form' => $form->createView());
    }

    /**
     * @Route("/admin/artist_delete/{id}", name="artist_delete")
     * @Template("")
     */

    public function artist_deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:Artist');

        $artist = $repository->find($id);

        $em->remove($artist);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Artist deleted.');

        return $this->redirect($this->generateUrl('artist_index'));
    }
}
