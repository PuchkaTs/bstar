<?php
/**
 * User model config
 */
return array(
    'title' => 'Азтай Хэрэглэгч',
    'single' => 'Азтай Хэрэглэгч',
    'model' => 'App\Aztan',
    /**
     * The display columns
     */
    'columns' => array(
        'social_id'
    ),
    /**
     * The filter set
     */
    'filters' => array(

    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'social_id' => array(
            'title' => 'user_id:',
            'type' => 'text',
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