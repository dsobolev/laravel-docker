<?php
namespace App;

/**
 * 
 */
class SampleDependency
{
    public $name;
    public $desc;
    
    function __construct()
    {
        $this->name = 'Dep Name';
        $this->desc = 'Dependency Description';
    }
}