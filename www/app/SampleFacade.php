<?php
/**
 * 
 */
namespace App;

use Illuminate\Support\Facades\Facade;

class SampleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sample';
    }
}