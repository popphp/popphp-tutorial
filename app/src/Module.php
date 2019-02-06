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
    }

}
