<?php
/**
 * User model config
 */
return array(
    'title' => 'Дэлгүүрийн төрөл',
    'single' => 'Дэлгүүрийн төрөл',
    'model' => 'App\CompanyType',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'menu' => array(
            'title' => 'In menu',
            'relationship' => 'menu',
            'select' => '(:table).name',
        ),        
        'comp_number',
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'name' => array(
            'title' => 'name',
            'type'  => 'text',
        ),
        'menu' => array(
            'type' => 'relationship',
            'title' => 'In menu',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )        
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Name:',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Position:',
            'type' => 'number',
        ),
        'menu' => array(
            'type' => 'relationship',
            'title' => 'In menu',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),        
        'comp_number' => array(
            'title' => 'how many companies to show',
            'type' => 'number',
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