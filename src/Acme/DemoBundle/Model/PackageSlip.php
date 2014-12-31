<?php

namespace Acme\DemoBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

class PackageSlip {

    private $list;

    public function __construct(ArrayCollection $list)
    {
        $this->list = $list;
    }
}