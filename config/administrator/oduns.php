<?php
/**
 * User model config
 */
return array(
    'title' => 'Одуны цэс',
    'single' => 'Одуны цэс',
    'model' => 'App\Odun',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'url',
        'title',
        'photo' => array(
            'title' => 'Зураг',
            'output' => '<img src="/assets/oduns/thumbs/(:value)" height="100" />',
        ),
        'photobottom' => array(
            'title' => 'Зураг доод',
            'output' => '<img src="/assets/oduns/thumbs/(:value)" height="100" />',
        ),        
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'title' => array(
            'title' => 'Гачиг',
            'type'  => 'text',
        ),   
        'url' => array(
            'title' => 'Цэсний хаяг',
            'type'  => 'text',
        ),                
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'url' => array(
            'title' => 'Цэсний хаяг',
            'type' => 'text',
        ),  
        'title' => array(
            'title' => 'Гарчиг',
            'type' => 'text',
        ),  
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        ),        
        'body' => array(
            'title' => 'Text:',
            'type' => 'wysiwyg',
        ),      
        'photo' => array(
            'title' => 'Image width 1000px',
            'type' => 'image',
            'location' => public_path() . '/assets/oduns/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(200, 100, 'portrait', public_path() . '/assets/oduns/thumbs/', 100),
                array(1000, 100, 'landscape', public_path() . '/assets/oduns/', 100),

            )
        ),  
        'photobottom' => array(
            'title' => 'Image width 1000px',
            'type' => 'image',
            'location' => public_path() . '/assets/oduns/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(200, 100, 'portrait', public_path() . '/assets/oduns/thumbs/', 100),
                array(1000, 100, 'landscape', public_path() . '/assets/oduns/', 100),

            )
        ),
    ),      

        /**
         * Action permissions
         */
        'action_permissions'=> array(
            'create' => function($model)
            {
                return Auth::user()->hasRole(['super_admin', 'editor']);
            },
            'update' => function($model)
            {
                return Auth::user()->hasRole(['super_admin', 'editor']);
            },
            'delete' => function($model)
            {
                return Auth::user()->hasRole(['super_admin', 'editor']);
            }
        ), 
);