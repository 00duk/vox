<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TrafficController extends Controller
{
    /**
     * @Route("/admin/traffic", name="traffic_index")
     * @Template()
     */
    public function traffic_indexAction()
    {
        return array('name' => '');
    }
}
