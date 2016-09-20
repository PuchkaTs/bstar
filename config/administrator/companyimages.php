<?php
/**
 * User model config
 */
return array(
    'title' => 'Дэлгүүрийн зураг',
    'single' => 'Дэлгүүрийн зураг',
    'model' => 'App\Companyimage',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'description',
        'image' => array(
            'title' => 'Image',
            'output' => '<img src="/assets/stores/(:value)" height="100" />',
        ),
        'company' => array(
            'relationship' => 'company',
            'title' => 'Belongs to a project',
            'select' => '(:table).name', //what column or accessor on the other table you want to use to represent this object
        ),
        'position',

    ),
    /**
     * The filter set
     */
    'filters' => array(
        'company' => array(
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
        'company' => array(
            'type' => 'relationship',
            'title' => 'Belongs to a project',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),      
        'image' => array(
            'title' => 'Image 600x400',
            'type' => 'image',
            'location' => public_path() . '/assets/stores/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
//                    array(65, 57, 'landscape', public_path() . '/assets/banner/thumbs/small/', 100),
//                    array(220, 138, 'fit', public_path() . '/assets/stores/thumbs/medium/', 100),
                array(600, 400, 'crop', public_path() . '/assets/stores/', 100),
                array(100, 100, 'crop', public_path() . '/assets/stores/100x100/', 100)
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