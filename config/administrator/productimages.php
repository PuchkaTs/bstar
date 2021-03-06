<?php
/**
 * User model config
 */
return array(
    'title' => 'Бүтээгдэхүүний зураг',
    'single' => 'Бүтээгдэхүүний зураг',
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
            'title' => 'Хамааралтай бүтээгдэхүүн',
            'select' => '(:table).name', //what column or accessor on the other table you want to use to represent this object
        ),
        'position',
        'color' => array(
            'type' => 'bool',
            'title' => 'Өнгө',
        ),
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'product' => array(
            'type' => 'relationship',
            'title' => 'Хамааралтай бүтээгдэхүүн',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'  => array(
            'title' => 'Нэр',
            'type'  => 'text',
        ),
        'description'  => array(
            'title' => 'Тайлбар',
            'type'  => 'wysiwyg',
        ),
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        ),
        'product' => array(
            'type' => 'relationship',
            'title' => 'Хамааралтай бүтээгдэхүүн',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'color' => array(
            'type' => 'bool',
            'title' => 'Өнгө',
        ),        
        'image' => array(
            'title' => 'Image 560x560',
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

        /**
     * Action permissions
     */
    'action_permissions'=> array(
        'create' => function($model)
        {
            return Auth::user()->hasRole(['super_admin']);
        },
        'update' => function($model)
        {
            return Auth::user()->hasRole(['super_admin']);
        },
        'delete' => function($model)
        {
            return Auth::user()->hasRole(['super_admin']);
        }
    ),
);