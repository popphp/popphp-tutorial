<?php

namespace Tutorial\Model;

use Tutorial\Table;
use Pop\Db\Record;
use Pop\Db\Record\Collection;

class Post
{

    public function getAll(array $options = null): Collection|array
    {
        if (null === $options) {
            $options = ['order' => 'submitted DESC'];
        }
        return Table\Posts::findAll($options);
    }

    public function getById($id): Record|array
    {
        return Table\Posts::findById($id);
    }

    public function save($form):void
    {
        $post = new Table\Posts([
            'name'      => (!empty($form['name']) ? $form['name'] : null),
            'comment'   => $form['comment'],
            'submitted' => date('Y-m-d H:i:s')
        ]);

        $post->save();
    }

    public function remove($id): void
    {
        $post = Table\Posts::findById($id);
        if (isset($post->id)) {
            $post->delete();
        }
    }

}