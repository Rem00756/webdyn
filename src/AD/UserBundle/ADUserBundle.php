<?php

namespace AD\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ADUserBundle extends Bundle
{
    public function getParent() 
    {
        return 'FOSUserBundle';
    }
    
}
