<?php
/**
 * User model config
 */
return array(
    'title' => 'Top banner',
    'single' => 'Top banner',
    'model' => 'App\TopBanner',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'title'     => array(
            'title' => 'Title',
        ),
        'position'     => array(
            'title' => 'Position',
        ),
        'image' => array(
            'title' => 'Image',
            'output' => '<img src="/assets/banners/subbanners/thumbs/(:value)" height="100" />',
        )
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'title'  => array(
            'title' => 'Title',
            'type'  => 'text',
        ),
        'description'  => array(
            'title' => 'Description',
            'type'  => 'text',
        ),
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        ),
        'url'  => array(
            'title' => 'URL',
            'type'  => 'text',
        ),
        'image' => array(
            'title' => 'Image 1000x180',
            'type' => 'image',
            'location' => public_path() . '/assets/banners/subbanners/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
//                    array(65, 57, 'crop', public_path() . '/uploads/banner/thumbs/small/', 100),
//                    array(220, 138, 'fit', public_path() . '/uploads/products/thumbs/medium/', 100),
                array(1000, 184, 'crop', public_path() . '/assets/banners/subbanners/', 100),
                array(540, 100, 'landscape', public_path() . '/assets/banners/subbanners/thumbs/', 100)
            )
        )

    ),

    /**
     * Filters
     */
    'filters' => array(
        'id',
        'title' => array(
            'title' => 'Title',
        ),
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        )
    ),
);