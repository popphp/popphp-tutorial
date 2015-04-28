<?php

namespace Skeleton\Controller;

use Pop\Controller\AbstractController;
use Pop\Console\Console;
use Pop\Console\Input\Command;

class ConsoleController extends AbstractController
{

    protected $console;

    public function __construct()
    {
        $this->console = new Console();

        $help  = new Command('help');
        $help->setHelp('This is the help screen.');
        $this->console->addCommand($help);
    }

    public function help()
    {
        $this->console->response()->reset();
        $this->console->write($this->console->getCommand('help')->getHelp(), '    ');
        $this->console->send();
    }

    public function hello($name)
    {
        $this->console->response()->reset();
        $this->console->write('Hello ' . $this->console->colorize($name, Console::BOLD_YELLOW) . '!', '    ');
        $this->console->send();
    }

    public function error()
    {
        $this->console->response()->reset();
        $this->console->write($this->console->colorize('Sorry that was not valid.', Console::BOLD_RED), '    ');
        $this->console->send();
    }

}
