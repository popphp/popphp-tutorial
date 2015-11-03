<?php

namespace Tutorial\Controller;

use Pop\Controller\AbstractController;
use Pop\Console\Console;
use Pop\Console\Input\Command;
use Tutorial\Model;

class ConsoleController extends AbstractController
{

    protected $console;

    public function __construct()
    {
        $this->console = new Console(80, '    ');

        $helpMessage  = './pop ' . $this->console->colorize('show', Console::BOLD_YELLOW) . "\t\tShow current posts" . PHP_EOL;
        $helpMessage .= './pop ' . $this->console->colorize('delete', Console::BOLD_YELLOW) . "\tDelete a post" . PHP_EOL;
        $helpMessage .= './pop ' . $this->console->colorize('help', Console::BOLD_YELLOW) . "\t\tThis help screen";

        $help = new Command('help');
        $help->setHelp($helpMessage);
        $this->console->addCommand($help);
    }

    public function help()
    {
        $this->console->write($this->console->getCommand('help')->getHelp());
        $this->console->send();
    }

    public function show()
    {
        $posts = (new Model\Post())->getAll(['order' => 'id ASC']);

        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $this->console->write(
                    $post->id . '. ' .
                    (!empty($post->name) ? $post->name : 'Anonymous') .
                    ' [' . date('M d, Y g:i A', strtotime($post->submitted)) . ']'
                );
            }
        } else {
            $this->console->write('There are currently no posts');
        }

        $this->console->send();
    }

    public function delete()
    {
        $postId = $this->getPostId();

        if (null !== $postId) {
            $post = new Model\Post();
            $post->remove($postId);

            $this->console->write();
            $this->console->write($this->console->colorize('Post Removed!', Console::BOLD_RED));
        }
    }

    public function error()
    {
        $this->console->write($this->console->colorize('Sorry, that command was not valid.', Console::BOLD_RED));
        $this->console->write();
        $this->console->write('./pop help for help');
        $this->console->send();
    }

    /**
     * Get post id
     *
     * @return int
     */
    protected function getPostId()
    {
        $posts   = (new Model\Post())->getAll(['order' => 'id ASC']);
        $postIds = [];

        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $postIds[] = $post->id;
                $this->console->append($post->id . ":\t" . (!empty($post->name) ? $post->name : 'Anonymous'));
            }

            $this->console->append();
            $this->console->send();

            $postId = null;
            while (!is_numeric($postId) || !in_array($postId, $postIds)) {
                $postId = $this->console->prompt($this->console->getIndent() . 'Select Post ID: ');
            }

            return $postId;
        } else {
            $this->console->write('There are currently no posts');
            $this->console->send();
            return null;
        }
    }

}
