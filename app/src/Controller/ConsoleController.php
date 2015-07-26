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

        $help = new Command('help');
        $help->setHelp('This is the general help screen.');
        $this->console->addCommand($help);

        $hello = new Command('hello');
        $this->console->addCommand($hello);

        $edit = new Command('edit', Command::VALUE_REQUIRED);
        $edit->setHelp('This is the help screen for the edit screen.');
        $this->console->addCommand($edit);
    }

    public function help()
    {
        $this->console->write($this->console->getCommand('help')->getHelp(), '    ');
        $this->console->send();
    }

    public function hello($name, $yell = null)
    {
        $text = (null !== $yell) ?
            'HELLO ' . $this->console->colorize(strtoupper($name), Console::BOLD_CYAN) :
            'Hello ' . $this->console->colorize($name, Console::BOLD_CYAN) . '!';

        $this->console->write($text, '    ');
        $this->console->send();
    }

    public function edit($item, $id)
    {
        $text = 'You have selected to edit ' . $this->console->colorize($item, Console::BOLD_GREEN) .
            ' ' . $this->console->colorize($id, Console::BOLD_MAGENTA);

        $this->console->write($text, '    ');
        $this->console->send();
    }

    public function editHelp()
    {
        $this->console->write($this->console->getCommand('edit')->getHelp(), '    ');
        $this->console->send();
    }

    public function error()
    {
        $this->console->write($this->console->colorize('Sorry that was not valid.', Console::BOLD_RED), '    ');
        $this->console->send();
    }

}
