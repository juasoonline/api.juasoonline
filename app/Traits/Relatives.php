<?php

namespace App\Traits;

trait Relatives
{
    private $relationships;

    public function __construct()
    {
        $this -> relationships = includeResources();
    }
}
