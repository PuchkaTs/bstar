<?php
/**
 * User model config
 */
return array(
    'title' => 'Бүтээгэдхүүний төрөл',
    'single' => 'Бүтээгэдхүүний төрөл',
    'model' => 'App\ProductType',
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
        'subtype_number',
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
            'name_field' => 'id', //what column or accessor on the other table you want to use to represent this object
        ),
        'subtype_number' => array(
            'title' => 'how many companies to show',
            'type' => 'number',
        ),

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