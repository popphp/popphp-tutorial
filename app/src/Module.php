<?php

namespace Tutorial;

use Pop\Application;
use Pop\Db\Record;

class Module extends \Pop\Module\Module
{

    protected $name = 'tutorial';

    public function register(Application $application)
    {
        parent::register($application);

        $this->application->on('app.init', function($application){
            Record::setDb($application->services['database']);
        });

        if ($this->application->router->isCli()) {
            $this->application->on('app.route.pre', function() {
                echo PHP_EOL;
                echo '    Pop Tutorial CLI' . PHP_EOL;
                echo '    ----------------' . PHP_EOL . PHP_EOL;
            });

            $this->application->on('app.dispatch.post', function() {
                echo PHP_EOL;
            });
        }
    }

}
