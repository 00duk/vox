<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     * @Route("/admin/", name="admin")
     * @Template()
     */
    public function dashboardAction()
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
