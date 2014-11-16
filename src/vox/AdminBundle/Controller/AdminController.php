<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Route("/admin/index", name="admin_index")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => '');
    }

    /**
     * @Route("/admin/visitors", name="admin_visitors")
     * @Template()
     */
    public function visitorsAction()
    {
        return array('name' => '');
    }
}
