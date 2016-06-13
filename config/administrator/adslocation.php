<?php
/**
 * User model config
 */
return array(
    'title' => 'Зарын байршил',
    'single' => 'Зарын байршил',
    'model' => 'App\Adslocation',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Зарын байршилын нэр',
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
            'title' => 'Зарын байршилын нэр',
            'type'  => 'text',
        ),      
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        )

    ),
);