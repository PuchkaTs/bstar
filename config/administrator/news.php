<?php
/**
 * User model config
 */
return array(
    'title' => 'News',
    'single' => 'News',
    'model' => 'App\Content',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'position',
        'title',
        'photo' => array(
            'title' => 'Зураг',
            'output' => '<img src="/assets/news/thumbs/(:value)" height="100" />',
        ),
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'title' => array(
            'title' => 'Header',
            'type'  => 'text',
        ),
        'tags' => array(
            'title' => 'Тагууд',
            'relationship' => 'tags',
            'select' => '(:table).name',
        ),        
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'title' => array(
            'title' => 'Name',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Position:',
            'type' => 'number',
        ),      
        'body' => array(
            'title' => 'Text:',
            'type' => 'wysiwyg',
        ),
        'tags' => array(
            'type' => 'relationship',
            'title' => 'Мэдээний таг',
            'name_field' => 'title', //what column or accessor on the other table you want to use to represent this object
        ),        
        'photo' => array(
            'title' => 'Image 900x400',
            'type' => 'image',
            'location' => public_path() . '/assets/news/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(450, 200, 'crop', public_path() . '/assets/news/thumbs/', 100),
                array(900, 400, 'crop', public_path() . '/assets/news/', 100),

            )
        )        
    ),
);