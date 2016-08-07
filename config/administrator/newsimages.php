<?php
/**
 * User model config
 */
return array(
    'title' => 'Мэдээний зураг',
    'single' => 'Мэдээний зураг',
    'model' => 'App\Newsimage',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'description'     => array(
            'title' => 'Description',
        ),
        'image' => array(
            'title' => 'Image',
            'output' => '<img src="/uploads/news/thumbs/(:value)" height="100" />',
        ),
        'News' => array(
            'relationship' => 'News',
            'title' => 'Belongs to a project',
            'select' => '(:table).header', //what column or accessor on the other table you want to use to represent this object
        ),
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'news' => array(
            'type' => 'relationship',
            'title' => 'News header',
            'name_field' => 'header', //what column or accessor on the other table you want to use to represent this object
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'description'  => array(
            'title' => 'Description',
            'type'  => 'text',
        ),
        'news' => array(
            'type' => 'relationship',
            'title' => 'Belongs to a project',
            'name_field' => 'header', //what column or accessor on the other table you want to use to represent this object
        ),
        'image' => array(
            'title' => 'Image 900x450',
            'type' => 'image',
            'location' => public_path() . '/uploads/news/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
//                    array(65, 57, 'landscape', public_path() . '/uploads/banner/thumbs/small/', 100),
//                    array(220, 138, 'fit', public_path() . '/uploads/products/thumbs/medium/', 100),
                array(900, 450, 'crop', public_path() . '/uploads/news/', 100),
                array(120, 120, 'crop', public_path() . '/uploads/news/thumbs/', 100),
                array(560, 300, 'crop', public_path() . '/uploads/news/560x300/', 100)
            )
        )
    ),
);