<?php
/**
 * User model config
 */
return array(
    'title' => 'Бүтээгдэхүүний брэнд',
    'single' => 'Бүтээгдэхүүний брэнд',
    'model' => 'App\Brand',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'position',
        'logo' => array(
            'title' => 'Logo',
            'output' => '<img src="/assets/brands/logos/(:value)" height="50" />',
        )        
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'name' => array(
            'title' => 'Нэр',
            'type'  => 'text',
        ),
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        ),        
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Нэр',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Байрлал',
            'type' => 'number',
        ),
        'logo' => array(
            'title' => 'Image 200x100',
            'type' => 'image',
            'location' => public_path() . '/assets/brands/logos/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(200, 100, 'crop', public_path() . '/assets/brands/logos/', 100),
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