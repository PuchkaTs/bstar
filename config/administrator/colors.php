<?php
/**
 * User model config
 */
return array(
    'title' => 'Color',
    'single' => 'Color',
    'model' => 'App\Color',
    /**
     * The display columns
     */
    'columns'     => array(
        'id',
        'name'     => array(
            'title' => 'Name',
        ),
        'color'=> array(
            'title'=>'Color',
            'output'=> '<div style="background-color:(:value); height:20px; width:100%;"></div>'
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
        ),
        'color' => array(
            'title' => 'Position',
            'type'  => 'color',
        )

    ),
);