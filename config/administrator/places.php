<?php
/**
 * User model config
 */
return array(
    'title' => 'Places',
    'single' => 'Place',
    'model' => 'App\Place',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'placeMenu' => array(
            'title' => 'Цэс',
            'relationship' => 'placeMenu',
            'select' => '(:table).name',
        ),          
        'placeType' => array(
            'title' => 'Төрөл',
            'relationship' => 'placeType',
            'select' => '(:table).name',
        ),
        'placeSubType' => array(
            'title' => 'Дэд төрөл',
            'relationship' => 'placeSubType',
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
        'placeMenu' => array(
            'type' => 'relationship',
            'title' => 'Цэс',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),         
        'placeType' => array(
            'type' => 'relationship',
            'title' => 'Төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'placeSubType' => array(
            'type' => 'relationship',
            'title' => 'Дэд төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )
               
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Үйлчилгээний газрын нэр',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Байрлал',
            'type' => 'number',
        ),
        'url' => array(
            'title' => 'URL:',
            'type' => 'text',
        ),
        'placeMenu' => array(
            'type' => 'relationship',
            'title' => 'Цэс',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'placeType' => array(
            'type' => 'relationship',
            'title' => 'Төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'placeSubType' => array(
            'type' => 'relationship',
            'title' => 'Дэд төрөл',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),                
        'owner' => array(
            'type' => 'relationship',
            'title' => 'Эзэмшигч',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'about' => array(
            'title' => 'Тухай',
            'type' => 'wysiwyg',
        ),
        'cover' => array(
            'title' => 'Зураг 1200x400',
            'type' => 'image',
            'location' => public_path() . '/assets/places/cover/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(1200, 400, 'crop', public_path() . '/assets/places/cover/', 100),
            )
        )

    ),
);