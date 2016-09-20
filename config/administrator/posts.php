<?php
/**
 * User model config
 */
return array(
    'title' => 'Блог',
    'single' => 'Блог',
    'model' => 'App\Post',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'position',
        'approved',
        'title',
        'photo' => array(
            'title' => 'Зураг',
            'output' => '<img src="/assets/posts/thumbs/(:value)" height="100" />',
        ),
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'title' => array(
            'title' => 'Header',
            'type'  => 'text',
        ),
        'approved' => array(
            'title' => 'Approved',
            'type'  => 'bool',
        ),        
        'tag' => array(
            'title' => 'Тагууд',
            'relationship' => 'tag',
            'select' => '(:table).name',
        ),        
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'title' => array(
            'title' => 'Name',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Position:',
            'type' => 'number',
        ),   
        'approved' => array(
            'title' => 'Approved:',
            'type' => 'bool',
        ),  
        'body' => array(
            'title' => 'Text:',
            'type' => 'wysiwyg',
        ),
        'tag' => array(
            'type' => 'relationship',
            'title' => 'Мэдээний таг',
            'name_field' => 'title', //what column or accessor on the other table you want to use to represent this object
        ),        
        'photo' => array(
            'title' => 'Image 430x200',
            'type' => 'image',
            'location' => public_path() . '/assets/posts/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'sizes' => array(
                array(450, 200, 'crop', public_path() . '/assets/posts/thumbs/', 100),
                array(900, 400, 'crop', public_path() . '/assets/posts/', 100),

            )
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