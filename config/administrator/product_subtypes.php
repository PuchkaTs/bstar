<?php
/**
 * User model config
 */
return array(
    'title' => 'Бүтээгэдхүүний дэд төрөл',
    'single' => 'Бүтээгэдхүүний дэд төрөл',
    'model' => 'App\ProductSubType',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'producttype' => array(
            'title' => 'Цэс',
            'relationship' => 'producttype',
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
        'producttype' => array(
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
        'producttype' => array(
            'type' => 'relationship',
            'title' => 'In menu',
            'name_field' => 'id', //what column or accessor on the other table you want to use to represent this object
        ),
        'product_number' => array(
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