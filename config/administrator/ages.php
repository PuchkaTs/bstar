<?php
/**
 * User model config
 */
return array(
    'title' => 'Нас',
    'single' => 'Нас',
    'model' => 'App\Age',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'title'     => array(
            'title' => 'Нас',
        ),       
        'position'     => array(
            'title' => 'Байрлал',
        ),
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'title'  => array(
            'title' => 'нас',
            'type'  => 'text',
        ),      
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        )

    ),
);