<?php

namespace Tutorial\Controller;

use Pop\Application;
use Pop\Controller\AbstractController;
use Pop\Console\Console;
use Tutorial\Model;

class ConsoleController extends AbstractController
{

    protected Console $console;

    public function __construct(Application $application, Console $console)
    {
        $this->application = $application;
        $this->console     = $console;

        $this->console->setHeader(PHP_EOL . "Pop Tutorial CLI" . PHP_EOL . "----------------" . PHP_EOL);
        $this->console->setFooter(PHP_EOL);
        $this->console->setHelpColors(Console::BOLD_CYAN, Console::BOLD_GREEN, Console::BOLD_MAGENTA);
        $this->console->addCommandsFromRoutes($application->router()->getRouteMatch(), './pop');
    }

    public function help(): void
    {
        $this->console->help();
    }

    public function show(): void
    {
        $posts = (new Model\Post())->getAll(['order' => 'id ASC']);

        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $this->console->append(
                    $post->id . '. ' .
                    (!empty($post->name) ? $post->name : 'Anonymous') .
                    ' [' . date('M d, Y g:i A', strtotime($post->submitted)) . ']'
                );
            }
        } else {
            $this->console->append('There are currently no posts');
        }

        $this->console->send();
    }

    public function delete(): void
    {

        $postModel = new Model\Post();
        $posts     = $postModel->getAll(['order' => 'id ASC']);

        $this->console->setHeaderSent(true);
        $this->console->append($this->console->getHeader(true));

        if (count($posts) > 0) {
            $postIds = [];
            foreach ($posts as $post) {
                $postIds[] = $post->id;
                $this->console->append($post->id . ":\t" . (!empty($post->name) ? $post->name : 'Anonymous'));
            }

            $this->console->append();
            $this->console->send(false);

            $postId = null;
            while (!is_numeric($postId) || !in_array($postId, $postIds)) {
                $postId = $this->console->prompt('Select Post ID: ', null, false, 500, false);
            }

            $postModel->remove($postId);

            $this->console->append();
            $this->console->append($this->console->colorize('Post Removed!', Console::BOLD_RED));
            $this->console->append($this->console->getFooter(true));
            $this->console->send(false);
        } else {
            $this->console->append('There are currently no posts');
            $this->console->append($this->console->getFooter(true));
            $this->console->send(false);
        }
    }

    public function error(): void
    {
        $this->console->append($this->console->colorize('Sorry, that command was not valid.', Console::BOLD_RED));
        $this->console->append();
        $this->console->append('./pop help for help');
        $this->console->send();
    }

}
