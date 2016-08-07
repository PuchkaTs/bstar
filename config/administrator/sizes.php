<?php
/**
 * User model config
 */
return array(
    'title' => 'Хэмжээ',
    'single' => 'Хэмжээ',
    'model' => 'App\Size',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Name',
        ),
        'size'     => array(
            'title' => 'Size',
        ),        
        'position'     => array(
            'title' => 'Position',
        ),
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'  => array(
            'title' => 'Name',
            'type'  => 'text',
        ),
        'size'  => array(
            'title' => 'Size',
            'type'  => 'text',
        ),        
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        )

    ),
);