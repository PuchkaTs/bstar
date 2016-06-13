<?php
/**
 * User model config
 */
return array(
    'title' => 'PlaceMenu',
    'single' => 'PlaceMenu',
    'model' => 'App\PlaceMenu',
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