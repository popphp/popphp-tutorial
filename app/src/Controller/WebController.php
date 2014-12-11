<?php

namespace Skeleton\Controller;

use Pop\Controller\Controller;
use Pop\Http\Response;
use Pop\View\View;

class WebController extends Controller
{

    protected $response;
    protected $viewPath;

    public function __construct()
    {
        $this->response = new Response();
        $this->viewPath = __DIR__ . '/../../view';
    }

    public function index()
    {
        $view = new View($this->viewPath . '/index.phtml');
        $view->title = 'Welcome';

        $this->response->setBody($view->render());
        $this->response->send();
    }

    public function edit($id)
    {
        $view = new View($this->viewPath . '/edit.phtml');
        $view->title = 'Edit ' . $id;
        $view->id    = $id;

        $this->response->setBody($view->render());
        $this->response->send();
    }

    public function error()
    {
        $view = new View($this->viewPath . '/error.phtml');
        $view->title = 'Error';

        $this->response->setBody($view->render());
        $this->response->send(404);
    }

}
