<?php
/**
 * User model config
 */
return array(
    'title' => 'Products',
    'single' => 'Product',
    'model' => 'App\Product',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'producttype' => array(
            'title' => 'Бүтээгэдхүүний төрөл',
            'relationship' => 'Producttype',//model
            'select' => '(:table).name',
        ),
        'gallery' => array(
            'title' => 'Галлерей',
            'relationship' => 'gallery',
            'select' => '(:table).name',
        ),
        'company' => array(
            'title' => 'Компани',
            'relationship' => 'company',
            'select' => '(:table).name',
        ),
        'photo' => array(
            'title' => 'Зураг',
            'output' => '<img src="/assets/products/thumbs/(:value)" height="100" />',
        ),
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'name' => array(
            'title' => 'Name',
            'type'  => 'text',
        ),
        'ProductType' => array(
            'type' => 'relationship',
            'title' => 'Бүтээгэдхүүний төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'gallery' => array(
            'type' => 'relationship',
            'title' => 'Бүтээгэдхүүний төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'company' => array(
            'type' => 'relationship',
            'title' => 'Компани',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Product name:',
            'type' => 'text',
        ),
        'description' => array(
            'title' => 'Description:',
            'type' => 'wysiwyg',
        ),
        'ProductType' => array(
            'type' => 'relationship',
            'title' => 'Бүтээгэдхүүний төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'gallery' => array(
            'type' => 'relationship',
            'title' => 'Галлерей',
            'name_field' => 'name',
        ),
        'company' => array(
            'type' => 'relationship',
            'title' => 'Компани',
            'name_field' => 'name',
        ),
        'price' => array(
            'type'  => 'number',
            'title'  => 'Үнэ',
        ),
        'photo' => array(
            'title' => 'Image 900x450',
            'type' => 'image',
            'location' => public_path() . '/assets/products/thumbs/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(140, 140, 'crop', public_path() . '/assets/products/thumbs/', 100),
            )
        )
    ),
);