<?php
/**
 * User model config
 */
return array(
    'title' => 'Зарын төрөл',
    'single' => 'Зарын төрөл',
    'model' => 'App\Adstag',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Зарын төрлийн нэр',
        ),       
        'position'     => array(
            'title' => 'Байрлал',
        ),
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'  => array(
            'title' => 'Зарын төрлийн нэр',
            'type'  => 'text',
        ),      
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        )

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