<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>"Geominibus-Tech"',
    'logo_img' => 'vendor/adminlte/dist/img/LogoBus.jpg',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-cyan',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => 'bg-info',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-secondary navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dash',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [


        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'Buscar',
        ],

        ['header' => 'USUARIOS', 'can' => 'Administrador',],
        [
            'text'    => 'Usuarios',
            'icon'    => 'fa fa-user-tie',
            'icon_color' => 'cyan',
            'can' => 'Administrador',
            'submenu' => [
                [
                    'text' => 'Usuarios',
                    'url'  => '/Usuarios',
                    'icon'        => 'fa fa-user-tie',
                    'icon_color' => 'cyan',
                    'label_color' => 'success',
                ],
                [
                    'text'    => 'Roles',
                    'url'     => '/Roles',
                    'icon'        => 'fa fa-user-tie',
                    'icon_color' => 'cyan',
                    'label_color' => 'success',
                ],
            ],
        ],

        ['header' => 'MENU'],
        [
            'text'        => 'Conductores',
            'url'         => '/Conductor',
            'icon'        => 'fa fa-user-tie',
            'icon_color' => 'cyan',
            'label_color' => 'success',
            'can' => 'Administrador',
        ],
        [
            'text'        => 'Minibuses',
            'url'         => '/Minibus',
            'icon'        => 'fa fa-bus',
            'icon_color' => 'cyan',
            'label_color' => 'success',
            'can'         => 'Ver Minibus',
            'can' => 'Administrador',
        ],
        [
            'text'        => 'Asignar Minibus',
            'url'         => '/AsignarMinibus',
            'icon'        => 'fa fa-id-card',
            'icon_color' => 'cyan',
            'label_color' => 'success',
            'can' => 'Administrador',
        ],
        [
            'text'        => 'Rutas',
            'url'         => '/Ruta',
            'icon'        => 'fa fa-map',
            'icon_color' => 'cyan',
            'label_color' => 'success',
            'can' => 'Administrador',
        ],
        [
            'text'        => 'Clientes',
            'url'         => '/Cliente',
            'icon'        => 'fa fa-users',
            'icon_color' => 'cyan',
            'label_color' => 'success',
            'can' => 'Ver cliente',
        ],
        [
            'text'        => 'Horarios',
            'url'         => '/Horario',
            'icon'        => 'fa fa-calendar',
            'icon_color' => 'cyan',
            'label_color' => 'success',
        ],
        [
            'text'        => 'Boletos',
            'url'         => '/Boleto',
            //'icon'        => 'fa fa-ticket-alt',
            'icon'        => 'fa fa-credit-card',
            'icon_color' => 'cyan',
            'label_color' => 'success',
        ],
        [
            'text'        => 'Encomiendas',
            'url'         => '/Encomienda',
            'icon'        => 'fa fa-truck',
            'icon_color' => 'cyan',
            'label_color' => 'success',
        ],
        /*[
            'text'        => 'Monitoreo',
            'url'         => '/Mapa',
            'icon'        => 'fa fa-map-marker',
            'icon_color' => 'cyan',
            'label'       => 'VER',
            'label_color' => 'success',
        ],*/
        [
            'text'        => 'Monitoreo',
            'url'         => '/Mapa2',
            'icon'        => 'fa fa-map-marker',
            'icon_color' => 'cyan',
            'label_color' => 'success',
        ],
        [
            'text'        => 'Reportes',
            'url'         => '/Reportes',
            'icon'        => 'fa fa-clipboard',
            'icon_color' => 'cyan',
            'label_color' => 'success',
            'can' => 'Ver cliente',
        ],
        ['header' => 'CONFIGURACIÓN DE LA CUENTA'],
        [
            'text' => 'Perfil de Usuario',
            'url'  => 'user/profile',
            'icon' => 'fas fa-fw fa-user',
            'icon_color' => 'danger',
        ],
        [
            'text' => 'Cambio de Contraseña',
            'url'  => 'user/profile',
            'icon' => 'fas fa-fw fa-lock',
            'icon_color' => 'danger',
        ],
        /*[
            'text' => 'Contacto',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-home',
            'icon_color' => 'danger',
        ],
        /*
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        */

        ['header' => 'REPORTES'],
        [
            'text'       => 'Reporte de Conductores',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/Conductor/pdf',
            'can' => 'Ver cliente',
        ],
        [
            'text'       => 'Reporte de Minibuses',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/Minibus/pdf',
            'can' => 'Ver cliente',
        ],
        [
            'text'       => 'Reporte de Asignaciones',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/AsignarMinibus/pdf',
            'can' => 'Ver cliente',
        ],
        [
            'text'       => 'Reporte de Rutas',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/Ruta/pdf',
        ],
        [
            'text'       => 'Reporte de Clientes',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/Cliente/pdf',
            'can' => 'Ver cliente',
        ],
        [
            'text'       => 'Reporte de Horarios',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/Horario/pdf',
        ],
        [
            'text'       => 'Reporte de Boletos',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/Boleto/pdf',
        ],
        [
            'text'       => 'Reporte de Encomiendas',
            'icon'       => 'fa fa-clipboard',
            'icon_color' => 'warning',
            'url'        => '/Encomienda/pdf',
        ],
        /*
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
        */
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
