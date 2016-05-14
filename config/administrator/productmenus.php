<?php
/**
 * User model config
 */
return array(
    'title' => 'Бүтээгдэхүүний цэс',
    'single' => 'Бүтээгдэхүүний цэс',
    'model' => 'App\ProductMenu',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Name',
        ),
        'position'     => array(
            'title' => 'Position',
        ),
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name'  => array(
            'title' => 'Name',
            'type'  => 'text',
        ),
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        )

    ),

    /**
     * Action permissions
     */
    'action_permissions'=> array(
        'create' => function($model)
        {
            return Auth::user()->hasRole('super_admin');
        },
        'update' => function($model)
        {
            return Auth::user()->hasRole('super_admin');
        },
        'delete' => function($model)
        {
            return Auth::user()->hasRole('super_admin');
        }
    ),
);