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
        'phone',
        'address',
        'delivered',
        'body',
        'owner' => array(
            'title' => 'Захиалагч',
            'relationship' => 'owner',
            'select' => '(:table).name',
        ),
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
            'title' => 'Утас:',
            'type' => 'text',
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
);