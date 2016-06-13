<?php
/**
 * User model config
 */
return array(
    'title' => 'Зарын төрөл',
    'single' => 'Зарын төрөл',
    'model' => 'App\Adstag',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Зарын төрлийн нэр',
        ),       
        'position'     => array(
            'title' => 'Байрлал',
        ),
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'  => array(
            'title' => 'Зарын төрлийн нэр',
            'type'  => 'text',
        ),      
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        )

    ),
);