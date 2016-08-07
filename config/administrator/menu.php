<?php
/**
 * User model config
 */
return array(
    'title' => 'Дэлгүүрийн цэс',
    'single' => 'Дэлгүүрийн цэс',
    'model' => 'App\Menu',
    /**
     * The display columns
     */
    'columns'     => array(
        'name'     => array(
            'title' => 'Name',
        ),
        'position'     => array(
            'title' => 'Position',
        ),
        'deep'     => array(
            'title' => 'Гүн',
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
        ),
        'deep' => array(
            'title' => 'Гүн 1, 2, 3',
            'type'  => 'number',
        )         

    ),

    /**
     * Action permissions
     */
    // 'action_permissions'=> array(
    //     'create' => function($model)
    //     {
    //         return Auth::user()->hasRole('super_admin');
    //     },
    //     'update' => function($model)
    //     {
    //         return Auth::user()->hasRole('super_admin');
    //     },
    //     'delete' => function($model)
    //     {
    //         return Auth::user()->hasRole('super_admin');
    //     }
    // ),
);