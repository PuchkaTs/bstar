<?php
/**
 * User model config
 */
return array(
    'title' => 'Компаний дэд төрөл',
    'single' => 'Компаний дэд төрөл',
    'model' => 'App\CompanySubType',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'companytype' => array(
            'title' => 'ямар төрөлд хамаарах',
            'relationship' => 'companytype',
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
        'companytype' => array(
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
        'companytype' => array(
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