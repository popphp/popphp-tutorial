<?php

namespace Tutorial\Form;

use Pop\Form\Form;

class Post extends Form
{

    public function __construct(array $fields = null, $action = null, $method = 'post')
    {
        $fields = [
            'name' => [
                'type'       => 'text',
                'label'      => 'Name (Optional)',
                'attributes' => [
                    'size'   => 60
                ]
            ],
            'comment' => [
                'type'       => 'textarea',
                'label'      => 'Comment (Required)',
                'required'   => true,
                'attributes' => [
                    'rows'   => 5,
                    'cols'   => 65
                ]
            ],
            'submit' => [
                'type'  => 'submit',
                'value' => 'Submit'
            ]
        ];

        parent::__construct($fields, $action, $method);
    }

}