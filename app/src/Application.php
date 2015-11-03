<?php

namespace Skeleton;

use Pop\Db\Record;

class Application extends \Pop\Application
{

    public function bootstrap($autoloader = null)
    {
        parent::bootstrap($autoloader);

        $this->on('app.init', function($application){
            Record::setDb($application->services['database']);
        });

        if ($this->router->isCli()) {
            $this->on('app.route.pre', function(){
                echo PHP_EOL;
                echo '    Pop Skeleton CLI' . PHP_EOL;
                echo '    ----------------' . PHP_EOL . PHP_EOL;
            });

            $this->on('app.dispatch.post', function(){
                echo PHP_EOL;
                echo '    ----------------' . PHP_EOL;
                echo '    Complete!' . PHP_EOL . PHP_EOL;
            });
        }
    }

}
