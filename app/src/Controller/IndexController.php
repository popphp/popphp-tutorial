<?php

namespace Tutorial\Controller;

use Pop\Application;
use Pop\Controller\AbstractController;
use Pop\Filter\Filter;
use Pop\Http\Server\Request;
use Pop\Http\Server\Response;
use Pop\View\View;
use Tutorial\Form;
use Tutorial\Model;

class IndexController extends AbstractController
{

    protected Application $application;
    protected Request $request;
    protected Response $response;
    protected string $viewPath;

    public function __construct(Application $application, Request $request, Response $response)
    {
        $this->application = $application;
        $this->request     = $request;
        $this->response    = $response;
        $this->viewPath    = __DIR__ . '/../../view';
    }

    public function index(): void
    {
        $post = new Model\Post();

        $view = new View($this->viewPath . '/index.phtml');
        $view->title = 'Welcome';
        $view->posts = $post->getAll();

        $this->response->setBody($view->render());
        $this->response->send();
    }

    public function post(): void
    {
        $view = new View($this->viewPath . '/post.phtml');
        $view->title = 'Post Comment';
        $view->form  = new Form\Post();

        if ($this->request->isPost()) {
            $view->form->addFilter(new Filter('strip_tags'))
                 ->addFilter(new Filter('htmlentities', [ENT_QUOTES, 'UTF-8']))
                 ->setFieldValues($this->request->getPost());

            if ($view->form->isValid()) {
                $view->form->clearFilters()
                     ->addFilter(new Filter('html_entity_decode', [ENT_QUOTES, 'UTF-8']));

                $post = new Model\Post();
                $post->save($view->form);
                Response::redirect('/');
                exit();
            }
        }

        $this->response->setBody($view->render());
        $this->response->send();
    }

    public function error(): void
    {
        $view = new View($this->viewPath . '/error.phtml');
        $view->title = 'Error - Page Not Found';

        $this->response->setBody($view->render());
        $this->response->send(404);
    }

}
