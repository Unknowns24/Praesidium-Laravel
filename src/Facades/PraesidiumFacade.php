<?php 

namespace UNK\Praesidium\Facades;

use Illuminate\Support\Facades\Facade;

class PraesidiumFacade extends Facade
{
    public function getFacadeAccessor()
    {
        return 'praesidium';
    }
}