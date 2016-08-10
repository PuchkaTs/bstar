<?php
/**
 * User model config
 */
return array(
    'title' => 'Үйлчилгээний газрын зураг',
    'single' => 'Үйлчилгээний газрын зураг',
    'model' => 'App\Placeimage',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'description',
        'image' => array(
            'title' => 'Image',
            'output' => '<img src="/assets/places/(:value)" height="100" />',
        ),
        'place' => array(
            'relationship' => 'place',
            'title' => 'Belongs to a project',
            'select' => '(:table).name', //what column or accessor on the other table you want to use to represent this object
        ),
        'position',

    ),
    /**
     * The filter set
     */
    'filters' => array(
        'place' => array(
            'type' => 'relationship',
            'title' => 'belong to project',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'  => array(
            'title' => 'Title',
            'type'  => 'text',
        ),
        'description'  => array(
            'title' => 'Description',
            'type'  => 'wysiwyg',
        ),
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        ),
        'place' => array(
            'type' => 'relationship',
            'title' => 'Belongs to a project',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),      
        'image' => array(
            'title' => 'Image 600x400',
            'type' => 'image',
            'location' => public_path() . '/assets/places/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
//                    array(65, 57, 'landscape', public_path() . '/assets/banner/thumbs/small/', 100),
//                    array(220, 138, 'fit', public_path() . '/assets/places/thumbs/medium/', 100),
                array(600, 400, 'crop', public_path() . '/assets/places/', 100),
                array(100, 100, 'crop', public_path() . '/assets/places/100x100/', 100)
            )
        )
    ),
);