<?php
/**
 * User model config
 */
return array(
    'title' => 'Зар',
    'single' => 'Зар',
    'model' => 'App\Ads',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'title',
        'description',
        'price',
        'gender',
        'adsage' => array(
            'title' => 'Нас',
            'relationship' => 'adsage',
            'select' => '(:table).title',
        ),
        'location' => array(
            'title' => 'Байрлал',
            'relationship' => 'location',
            'select' => '(:table).name',
        ),    
        'adstag' => array(
            'title' => 'Төрөл',
            'relationship' => 'adstag',
            'select' => '(:table).name',
        ),              
        'phone',
        'position',
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'title' => array(
            'title' => 'Гарчиг',
            'type'  => 'text',
        ),
        'phone' => array(
            'title' => 'Утас',
            'type'  => 'text',
        ),

        'location' => array(
            'type' => 'relationship',
            'title' => 'Байрлал',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'adstag' => array(
            'type' => 'relationship',
            'title' => 'Төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )        
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'adstag' => array(
            'type' => 'relationship',
            'title' => 'Type',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),        
        'title' => array(
            'title' => 'Гарчиг:',
            'type' => 'text',
        ),
        'description' => array(
            'title' => 'Дэлгэрэнгүй:',
            'type' => 'wysiwyg',
        ),
        'price' => array(
            'title' => 'Үнэ:',
            'type' => 'number',
        ),    
        'gender' => array(
            'type' => 'enum',
            'title' => 'Gender:',
            'options' => array('Хүү', 'Охин'), //must be an array
        ),  
        'adsage' => array(
            'type' => 'relationship',
            'title' => 'Нас',
            'name_field' => 'title', //what column or accessor on the other table you want to use to represent this object
        ),                    
        'phone' => array(
            'title' => 'Утас:',
            'type' => 'text',
        ),        
        'position' => array(
            'title' => 'Байрлал:',
            'type' => 'number',
        ),
        'location' => array(
            'type' => 'relationship',
            'title' => 'Байрлалын нэр',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )

    ),
        /**
     * Action permissions
     */
    'action_permissions'=> array(
        'create' => function($model)
        {
            return Auth::user()->hasRole(['super_admin', 'editor']);
        },
        'update' => function($model)
        {
            return Auth::user()->hasRole(['super_admin', 'editor']);
        },
        'delete' => function($model)
        {
            return Auth::user()->hasRole(['super_admin', 'editor']);
        }
    ),
);