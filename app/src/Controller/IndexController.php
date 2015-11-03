<?php

namespace Skeleton\Controller;

use Pop\Controller\AbstractController;
use Pop\Http\Request;
use Pop\Http\Response;
use Pop\View\View;
use Skeleton\Form;
use Skeleton\Model;

class IndexController extends AbstractController
{

    protected $request;
    protected $response;
    protected $viewPath;

    public function __construct()
    {
        $this->request  = new Request();
        $this->response = new Response();
        $this->viewPath = __DIR__ . '/../../view';
    }

    public function index()
    {
        $post = new Model\Post();

        $view = new View($this->viewPath . '/index.phtml');
        $view->title = 'Welcome';
        $view->form  = new Form\Post();

        if ($this->request->isPost()) {
            $view->form->addFilter('strip_tags')
                 ->addFilter('htmlentities', [ENT_QUOTES, 'UTF-8'])
                 ->setFieldValues($this->request->getPost());

            if ($view->form->isValid()) {
                $view->form->clearFilters()
                     ->addFilter('html_entity_decode', [ENT_QUOTES, 'UTF-8']);

                $post->save($view->form->getFields());
                $view->form  = false;
            }
        }

        $view->posts = $post->getAll();

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
