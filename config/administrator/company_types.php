<?php
/**
 * User model config
 */
return array(
    'title' => 'Company Type',
    'single' => 'Company Type',
    'model' => 'App\CompanyType',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'comp_number',
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'name' => array(
            'title' => 'name',
            'type'  => 'text',
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
        'comp_number' => array(
            'title' => 'how many companies to show',
            'type' => 'number',
        ),

    ),
);