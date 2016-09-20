<?php
/**
 * User model config
 */
return array(
    'title' => 'Цэсний баннер',
    'single' => 'Цэсний баннер',
    'model' => 'App\Promotion',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'url',
        'position'     => array(
            'title' => 'Байрлал',
        ),
        'image' => array(
            'title' => 'Image',
            'output' => '<img src="/assets/banners/promotions/(:value)" height="50" />',
        ),
        'menus' => array(
            'relationship' => 'menus',
            'title' => 'Дэлгүүрийн цэсэнд',
            'select' => "GROUP_CONCAT((:table).name SEPARATOR ', ')", //what column or accessor on the other table you want to use to represent this object
        ),
        'productmenus' => array(
            'relationship' => 'productmenus',
            'title' => 'Бүтээгдэхүүний цэсэнд',
            'select' => "GROUP_CONCAT((:table).name SEPARATOR ', ')", //what column or accessor on the other table you want to use to represent this object
        ),          
        'placemenus' => array(
            'relationship' => 'placemenus',
            'title' => 'Үйлчилгээний газрын цэсэнд',
            'select' => "GROUP_CONCAT((:table).name SEPARATOR ', ')", //what column or accessor on the other table you want to use to represent this object
        ),        

        
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'menus' => array(
            'type' => 'relationship',
            'title' => 'Дэлгүүрийн цэсэнд',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'productmenus' => array(
            'type' => 'relationship',
            'title' => 'Бүтээгдэхүүний цэсэнд',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),      
        'placemenus' => array(
            'type' => 'relationship',
            'title' => 'Үйлчилгээний газрын цэсэнд',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),             
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'url'  => array(
            'title' => 'URL',
            'type'  => 'text',
        ),
        'menus' => array(
            'type' => 'relationship',
            'title' => 'Дэлгүүрийн цэсэнд гаргах',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'productmenus' => array(
            'type' => 'relationship',
            'title' => 'Бүтээгдэхүүний цэсэнд гаргах',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),      
        'placemenus' => array(
            'type' => 'relationship',
            'title' => 'Үйлчилгээний газрын цэсэнд гаргах',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),           
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        ),        
        'image' => array(
            'title' => 'Image 120x50',
            'type' => 'image',
            'location' => public_path() . '/assets/banners/promotions/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
//                    array(65, 57, 'landscape', public_path() . '/uploads/banner/thumbs/small/', 100),
//                    array(220, 138, 'fit', public_path() . '/uploads/products/thumbs/medium/', 100),
                array(200, 90, 'crop', public_path() . '/assets/banners/promotions/', 100),
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