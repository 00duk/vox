<?php

namespace vox\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use vox\AdminBundle\Entity\MusicRelease;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{

    /**
     * @Route("/", name="front_home")
     * @Template("")
     */

    public function indexAction()
    {
        return array();
    }
}
