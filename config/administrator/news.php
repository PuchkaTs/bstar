<?php
/**
 * User model config
 */
return array(
    'title' => 'News',
    'single' => 'News',
    'model' => 'App\News',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'header',
        'body',
    ),
    /**
     * The filter set
     */
    'form_width' => 500,
    'filters' => array(
        'header' => array(
            'title' => 'Header',
            'type'  => 'text',
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'header' => array(
            'title' => 'Name',
            'type' => 'text',
        ),
        'body' => array(
            'title' => 'Text:',
            'type' => 'wysiwyg',
        ),
    ),
);