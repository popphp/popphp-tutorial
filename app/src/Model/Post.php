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
        return Table\Posts::findAll($options);
    }

    public function getById($id)
    {
        return Table\Posts::findById($id);
    }

    public function save($form)
    {
        $post = new Table\Posts([
            'name'      => (!empty($form['name']) ? $form['name'] : null),
            'comment'   => $form['comment'],
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