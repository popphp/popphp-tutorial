<?php

namespace Skeleton\Table;

use Pop\Db;

class Posts extends Db\Record
{

    public function __construct(array $columns = null, $table = null, Db\Adapter\AbstractAdapter $db = null)
    {
        if (null === $db) {
            $db = new Db\Adapter\Sqlite([
                'database' => __DIR__ . '/../../data/.htpopskel.sqlite'
            ]);
        }

        parent::__construct($columns, $table, $db);
    }

}