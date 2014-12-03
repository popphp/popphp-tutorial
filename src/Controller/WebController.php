<?php

namespace Skeleton\Controller;

use Pop\Controller\Controller;

class WebController extends Controller
{

    public function index()
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
