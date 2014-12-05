<?php

namespace Skeleton\Controller;

use Pop\Controller\Controller;

class ConsoleController extends Controller
{

    public function help()
    {
        echo 'Hello World!' . PHP_EOL;
    }

    public function hello($name = null)
    {
        echo 'Hello' . ((null !== $name) ? ' ' . ucfirst($name) : null) . '!' . PHP_EOL;
    }

    public function error()
    {
        echo 'Whoops!' . PHP_EOL;
    }

}
