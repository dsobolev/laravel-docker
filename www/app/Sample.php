<?php

namespace App;

class Sample
{
    public $name = 'Sample';
    public $purpose = 'To represent a sample';

    public $config;
    public $dep;

    public function __construct(SampleDependency $dep, $config) {
        $this->dep = $dep;
        $this->config = $config;
    }

    public function shout()
    {
        exit("WOOOW!!! My name is {$this->name}. My goal is {$this->purpose}");    
    }
}