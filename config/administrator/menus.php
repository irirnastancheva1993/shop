<?php
return [
    'title' => 'Menu',
    'single' => 'item',
    'model' => 'App\Menu',
    'columns' => [
        'id',
        'active',
        'title',
        'position',
    ],
    'edit_fields' => [
        'active' => [
            'type' => 'boolean',
        ]
    ],
];