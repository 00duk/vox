<?php

namespace vox\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class voxUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}