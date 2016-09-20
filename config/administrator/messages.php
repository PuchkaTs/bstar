<?php
/**
 * User model config
 */
return array(
    'title' => 'Захиа',
    'single' => 'Захиа',
    'model' => 'App\Message',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'email',
        'phone',
        'body',       
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'name' => array(
            'title' => 'Нэр',
            'type'  => 'text',
        ),   
        'phone' => array(
            'title' => 'Утас',
            'type'  => 'text',
        ),  
        'email' => array(
            'title' => 'Ц-Шуудан',
            'type'  => 'text',
        ),                
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Нэр',
            'type' => 'text',
        ),  
        'email' => array(
            'title' => 'Ц-Шуудан',
            'type' => 'text',
        ),  
        'phone' => array(
            'title' => 'Утас',
            'type' => 'text',
        ),          
        'body' => array(
            'title' => 'Мэссэж:',
            'type' => 'wysiwyg',
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