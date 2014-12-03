<?php

namespace Skeleton\Controller;

use Pop\Controller\Controller;

class ConsoleController extends Controller
{

    public function hello()
    {
        echo 'Hello World!' . PHP_EOL;
    }

    public function foo()
    {
        echo 'Foo!' . PHP_EOL;
    }

    public function error()
    {
        echo 'Whoops!' . PHP_EOL;
    }

}
