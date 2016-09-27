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
            'title' => 'Нэр',
            'type'  => 'text',
        ),
        'producttype' => array(
            'type' => 'relationship',
            'title' => 'Хамааралтай цэс',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )
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
        'producttype' => array(
            'type' => 'relationship',
            'title' => 'Хамааралтай цэс',
            'name_field' => 'id', //what column or accessor on the other table you want to use to represent this object
        ),
        'product_number' => array(
            'title' => 'Хэдэн бүтээгдэхүүн харуулах',
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