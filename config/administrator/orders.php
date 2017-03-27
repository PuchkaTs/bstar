<?php
/**
 * User model config
 */
return array(
    'title' => 'Захиалга',
    'single' => 'Захиалга',
    'model' => 'App\Order',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'transactionNumber',
        'totalPrice',
        'totalItems',
        'delivered',
        'body',
        'owner' => array(
            'title' => 'Захиалагч',
            'relationship' => 'owner',
            'select' => '(:table).name',
        ),
        'oroldlogo',
        'created_at',
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'transactionNumber' => array(
            'title' => 'Захиалгын дугаар',
            'type'  => 'text',
        ),
        'phone' => array(
            'title' => 'Утасны дугаар',
            'type'  => 'text',
        ),     
        'phone2' => array(
            'title' => 'Утасны дугаар 2',
            'type'  => 'text',
        ),         
        'delivered' => array(
            'title' => 'Хүргэгдсэн',
            'type'  => 'bool',
        ),            
        'owner' => array(
            'type' => 'relationship',
            'title' => 'Захиалагч',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'delivered' => array(
            'title' => 'хүргэгдсэн',
            'type'  => 'bool',
        ),  
        'oroldlogo' => array(
            'title' => 'Оролдлого',
            'type'  => 'bool',
        ),         
        'created_at' => array(
            'title' => 'хүргэгдсэн',
            'type'  => 'date',
        ),                        
        'transactionNumber' => array(
            'title' => 'Захиалгын дугаар',
            'type' => 'text',
        ),
        'totalPrice' => array(
            'title' => 'Нийт дүн',
            'type' => 'number',
        ),
        'totalItems' => array(
            'title' => 'Нийт бараа',
            'type' => 'number',
        ),        
        'phone' => array(
            'title' => 'Утас',
            'type' => 'text',
        ),
        'phone2' => array(
            'title' => 'Утасны дугаар 2',
            'type'  => 'text',
        ),          
        'owner' => array(
            'type' => 'relationship',
            'title' => 'Захиалагч',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'address' => array(
            'title' => 'Хаяг',
            'type' => 'text',
        ),        
        'body' => array(
            'title' => 'Захиалга',
            'type' => 'wysiwyg',
        )

    ),
        /**
     * Action permissions
     */
    'action_permissions'=> array(
        'create' => function($model)
        {
            return true;
        },
        'update' => function($model)
        {
            return true;
        },
        'delete' => function($model)
        {
            return Auth::user()->hasRole(['super_admin']);
        }
    ),
);