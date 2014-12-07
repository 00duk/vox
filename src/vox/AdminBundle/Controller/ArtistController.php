<?php

namespace vox\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArtistController extends Controller
{
    /**
     * @Route("/admin/artists", name="artist_index")
     * @Template()
     */
    public function artist_indexAction()
    {
        return array('name' => '');
    }
}
