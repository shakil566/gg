<?php
namespace App\Repositories;
use illuminate\Support\Facades\Facade;
class Test extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'jogfol';
    }
}

?>
