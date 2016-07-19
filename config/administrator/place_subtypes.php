<?php
/**
 * User model config
 */
return array(
    'title' => 'Дэд төрөл',
    'single' => 'Дэд төрөл',
    'model' => 'App\PlaceSubType',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'placetype' => array(
            'title' => 'ямар төрөлд хамаарах',
            'relationship' => 'placetype',
            'select' => '(:table).name',
        ),
        'company_number',
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'name' => array(
            'title' => 'name',
            'type'  => 'text',
        ),
        'placetype' => array(
            'type' => 'relationship',
            'title' => 'ямар төрөлд хамаарах',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Нэр',
            'type' => 'text',
        ),
        'position' => array(
            'title' => 'Байрлал',
            'type' => 'number',
        ),
        'placetype' => array(
            'type' => 'relationship',
            'title' => 'ямар төрөлд хамаарах',
            'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
        ),
        'company_number' => array(
            'title' => 'Хэр олон Ү-Газар харуулах',
            'type' => 'number',
        ),

    ),
);