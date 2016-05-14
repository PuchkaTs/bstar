<?php
/**
 * User model config
 */
return array(
    'title' => 'Бүтээгэдхүүний төрөл',
    'single' => 'Бүтээгэдхүүний төрөл',
    'model' => 'App\Producttype',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'productmenu' => array(
            'title' => 'Цэс',
            'relationship' => 'productmenu',
            'select' => '(:table).name',
        ),
        'product_number',
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'name' => array(
            'title' => 'name',
            'type'  => 'text',
        ),
        'productmenu' => array(
            'type' => 'relationship',
            'title' => 'In menu',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )
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
        'productmenu' => array(
            'type' => 'relationship',
            'title' => 'In menu',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'product_number' => array(
            'title' => 'how many companies to show',
            'type' => 'number',
        ),

    ),
);