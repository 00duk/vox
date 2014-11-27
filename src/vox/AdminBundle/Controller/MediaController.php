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
            $days[] = $stat->getDate()->format('d M');
            $likes[] = $stat->getLikes();
        }

        $days = json_encode($days);
        $likes = json_encode($likes);

        return array('days' => $days, 'likes' => $likes);
    }


}
