<?php

namespace Skeleton\Controller;

use Pop\Controller\AbstractController;
use Pop\Console\Console;
use Pop\Console\Input\Command;
use Skeleton\Model;

class ConsoleController extends AbstractController
{

    protected $console;

    public function __construct()
    {
        $this->console = new Console();
        $this->console->setIndent('    ');

        $help = new Command('help');
        $help->setHelp('This is the help screen.');
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
        $posts = (new Model\Post())->getAll(['order' => 'id ASC']);

        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $this->console->write(
                    $post->id . '. ' . (!empty($post->name) ? $post->name : 'Anonymous') . ' (' . date('M d, Y g:i A', strtotime($post->submitted)) . ')'
                );
            }
        } else {
            $this->console->write('There are currently no posts');
        }
        $this->console->send();
    }

    public function error()
    {
        $this->console->write($this->console->colorize('Sorry that command was not valid.', Console::BOLD_RED));
        $this->console->send();
    }

}
