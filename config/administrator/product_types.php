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
            'title' => 'Нэр',
            'type'  => 'text',
        ),
        'productmenu' => array(
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
        'productmenu' => array(
            'type' => 'relationship',
            'title' => 'Хамааралтай цэс',
            'name_field' => 'id', //what column or accessor on the other table you want to use to represent this object
        ),
        'subtype_number' => array(
            'title' => 'Хэдэн дэд төрөл харуулах?',
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