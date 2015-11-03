<?php

namespace Tutorial\Model;

use Tutorial\Table;

class Post
{

    public function getAll(array $options = null)
    {
        if (null === $options) {
            $options = ['order' => 'submitted DESC'];
        }
        return Table\Posts::findAll($options)->rows();
    }

    public function getById($id)
    {
        return Table\Posts::findById($id)->getColumnsAsObject();
    }

    public function save(array $fields)
    {
        $post = new Table\Posts([
            'name'      => (!empty($fields['name']) ? $fields['name'] : null),
            'comment'   => $fields['comment'],
            'submitted' => date('Y-m-d H:i:s')
        ]);

        $post->save();
    }

    public function remove($id)
    {
        $post = Table\Posts::findById($id);
        if (isset($post->id)) {
            $post->delete();
        }
    }

}