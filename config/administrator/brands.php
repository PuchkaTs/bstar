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
            'title' => 'name',
            'type'  => 'text',
        ),
        'position' => array(
            'title' => 'position',
            'type'  => 'number',
        ),        
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Name:',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Position:',
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
);