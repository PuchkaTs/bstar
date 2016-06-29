<?php
/**
 * User model config
 */
return array(
    'title' => 'Companies',
    'single' => 'Company',
    'model' => 'App\Company',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'companyType' => array(
            'title' => 'Type',
            'relationship' => 'companyType',
            'select' => '(:table).name',
        ),
        'position',
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
        'companyType' => array(
            'type' => 'relationship',
            'title' => 'Type',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Company Name:',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Position:',
            'type' => 'number',
        ),
        'url' => array(
            'title' => 'URL:',
            'type' => 'text',
        ),
        'companyType' => array(
            'type' => 'relationship',
            'title' => 'Type',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'owner' => array(
            'type' => 'relationship',
            'title' => 'Owner',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'about' => array(
            'title' => 'About:',
            'type' => 'wysiwyg',
        ),
        'logo' => array(
            'title' => 'logo 200x200',
            'type' => 'image',
            'location' => public_path() . '/assets/stores/logo/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(200, 200, 'crop', public_path() . '/assets/stores/logo/', 100),
            )
        ),        
        'cover' => array(
            'title' => 'Image 2000x650',
            'type' => 'image',
            'location' => public_path() . '/assets/stores/cover/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(2000, 650, 'crop', public_path() . '/assets/stores/cover/', 100),
            )
        )

    ),
);