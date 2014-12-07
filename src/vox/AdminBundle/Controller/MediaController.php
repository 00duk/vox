<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MediaController extends Controller
{
    /**
     * @Route("/admin/media", name="admin_media")
     * @Template()
     */

    public function media_indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('voxAdminBundle:FacebookStats');

        $facebookStats = $repository->findAll();

        foreach($facebookStats as $stat)
        {
            $facebook['days'][]  = $stat->getDate()->format('d M');
            $facebook['likes'][]  = $stat->getLikes();
        }

        $repository = $em->getRepository('voxAdminBundle:YoutubeStats');
        $youtubeStats = $repository->findAll();

        foreach($youtubeStats as $stat)
        {
            $youtube['days'][]  = $stat->getDate()->format('d M');
            $youtube['subs'][]  = $stat->getSubs();
            $youtube['total_views'][]  = $stat->getTotalViews();
        }

        $repository = $em->getRepository('voxAdminBundle:SoundCloudStats');
        $soundcloudStats = $repository->findAll();

        foreach($soundcloudStats as $stat)
        {
            $soundcloud['days'][]  = $stat->getDate()->format('d M');
            $soundcloud['followers'][]  = $stat->getFollowers();
        }

        return array('facebook' => $facebook, 'youtube' => $youtube, 'soundcloud' => $soundcloud);
    }





}
