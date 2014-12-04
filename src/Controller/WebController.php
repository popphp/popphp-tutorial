<?php

namespace Skeleton\Controller;

use Pop\Controller\Controller;

class WebController extends Controller
{

    public function index()
    {
        echo 'Hello World!' . PHP_EOL;
    }

    public function hello($name, array $items = null)
    {
        echo 'Hello ' . ucfirst($name) . '!' . PHP_EOL;
        if (null !== $items) {
            print_r($items);
        }
    }

    public function error()
    {
        echo 'Whoops!' . PHP_EOL;
    }

}
