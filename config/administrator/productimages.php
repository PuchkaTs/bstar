<?php
/**
 * User model config
 */
return array(
    'title' => 'Product images',
    'single' => 'Product image',
    'model' => 'App\Productimage',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'description',
        'image' => array(
            'title' => 'Image',
            'output' => '<img src="/assets/products/(:value)" height="100" />',
        ),
        'product' => array(
            'relationship' => 'product',
            'title' => 'Belongs to a project',
            'select' => '(:table).name', //what column or accessor on the other table you want to use to represent this object
        ),
        'position',
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'product' => array(
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
        'product' => array(
            'type' => 'relationship',
            'title' => 'Belongs to a project',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'image' => array(
            'title' => 'Image 900x450',
            'type' => 'image',
            'location' => public_path() . '/assets/products/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
//                    array(65, 57, 'landscape', public_path() . '/assets/banner/thumbs/small/', 100),
//                    array(220, 138, 'fit', public_path() . '/assets/products/thumbs/medium/', 100),
                array(560, 560, 'crop', public_path() . '/assets/products/', 100),
                array(100, 100, 'crop', public_path() . '/assets/products/100x100/', 100)
            )
        )
    ),
);