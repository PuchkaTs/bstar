<?php
/**
 * User model config
 */
return array(
    'title' => 'Сошл Хэрэглэгч',
    'single' => 'Сошл Хэрэглэгч',
    'model' => 'App\SocialAccount',
    /**
     * The display columns
     */
    'columns' => array(
        'user_id',
        'provider_user_id'
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
        'user_id' => array(
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