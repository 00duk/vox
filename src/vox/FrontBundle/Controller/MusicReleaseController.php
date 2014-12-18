<?php

namespace vox\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use vox\AdminBundle\Entity\MusicRelease;
use Symfony\Component\HttpFoundation\Request;

class MusicReleaseController extends Controller
{
    /**
     * @Route("/releases", name="front_release_index")
     * @Template("")
     */
    public function release_indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:MusicRelease');

        $listReleases = $repository->findAll();

        return array('listReleases' => $listReleases);
    }
}