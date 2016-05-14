<?php
/**
 * User model config
 */
return array(
    'title' => 'Gallery',
    'single' => 'Gallery',
    'model' => 'App\Gallery',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Name',
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
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        )

    ),
);