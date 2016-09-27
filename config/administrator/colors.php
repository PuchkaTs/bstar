<?php
/**
 * User model config
 */
return array(
    'title' => 'Өнгө',
    'single' => 'Өнгө',
    'model' => 'App\Color',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Нэр',
        ),
        'color'=> array(
            'title'=>'Өнгө',
            'output'=> '<div style="background-color:(:value); height:20px; width:100%;"></div>'
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
            'title' => 'Нэр',
            'type'  => 'text',
        ),
        'position' => array(
            'title' => 'Байрлал',
            'type'  => 'number',
        ),
        'color' => array(
            'title' => 'Өнгө',
            'type'  => 'color',
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