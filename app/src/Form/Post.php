<?php

namespace Tutorial\Form;

use Pop\Form\Form;
use Pop\Validator\LengthLessThanEqual;

class Post extends Form
{

    public function __construct(array $fields = null, $action = null, $method = 'post')
    {
        parent::__construct($fields, $action, $method);

        $fieldConfig = [
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
                ],
                'validators' => new LengthLessThanEqual(160, 'The comment must be 160 characters or less.')
            ],
            'submit' => [
                'type'  => 'submit',
                'value' => 'Submit'
            ]
        ];

        $this->addFieldsFromConfig($fieldConfig);
    }

}
