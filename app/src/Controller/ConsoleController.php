<?php

namespace Tutorial\Controller;

use Pop\Controller\AbstractController;
use Pop\Console\Console;
use Pop\Console\Command;
use Tutorial\Model;

class ConsoleController extends AbstractController
{

    /**
     * @var Console
     */
    protected $console;

    public function __construct()
    {
        $this->console = new Console(80, '    ');
        $this->console->setHeader(PHP_EOL . "Pop Tutorial CLI" . PHP_EOL . "----------------" . PHP_EOL);
        $this->console->setFooter(PHP_EOL);

        $this->console->addCommand(new Command('./pop show', null, 'Show current posts'));
        $this->console->addCommand(new Command('./pop delete', null, 'Delete a post'));
        $this->console->addCommand(new Command('./pop help', null, 'Show this help screen'));

        $this->console->setHelpColors(Console::BOLD_YELLOW, Console::BOLD_CYAN);
    }

    public function help()
    {
        $this->console->help();
    }

    public function show()
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

    public function delete()
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

    public function error()
    {
        $this->console->append($this->console->colorize('Sorry, that command was not valid.', Console::BOLD_RED));
        $this->console->append();
        $this->console->append('./pop help for help');
        $this->console->send();
    }

}
