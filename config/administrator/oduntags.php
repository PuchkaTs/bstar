<?php
/**
 * Tag model config
 */
return array(
    'title' => 'Мэдээний таг',
    'single' => 'Мэдээний таг',
    'model' => 'App\Oduntag',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'title'     => array(
            'title' => 'Title',
        ),
        'position'     => array(
            'title' => 'Position',
        )
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'title'  => array(
            'title' => 'Title',
            'type'  => 'text',
        ),
        'position' => array(
            'title' => 'Position',
            'type'  => 'number',
        ),

    ),

    /**
     * Filters
     */
    'filters' => array(
        'id',
        'title' => array(
            'title' => 'Title',
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
            return Auth::user()->hasRole(['super_admin', 'editor']);
        },
        'update' => function($model)
        {
            return Auth::user()->hasRole(['super_admin', 'editor']);
        },
        'delete' => function($model)
        {
            return Auth::user()->hasRole(['super_admin', 'editor']);
        }
    ),
);