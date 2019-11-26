<?php

return [
    'sidebar_hover' => 'anomaly.field_type.boolean',
    'navigation'    => [
        'type'       => 'anomaly.field_type.textarea',
        'input_view' => 'rajv3.theme.admin::admin/navigation/preferences',
    ],
    'display'       => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'default_value' => 'default',
            'mode'          => 'dropdown',
            'options'       => [
                'default' => 'rajv3.theme.admin::preference.display.option.default',
                'compact' => 'rajv3.theme.admin::preference.display.option.compact',
            ],
        ],
    ],
    'sidebars'      => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options'       => [
                'default' => 'rajv3.theme.admin::preference.sidebars.option.default',
                'static'  => 'rajv3.theme.admin::preference.sidebars.option.static',
            ],
            'default_value' => 'default',
            'mode'          => 'dropdown',
        ],
    ],
];
