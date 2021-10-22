<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0baa49a8e2cb0c7d03af24f54a63737b
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Exdda\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Exdda\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Exdda\\Controllers\\Ajax\\AjaxController' => __DIR__ . '/../..' . '/includes/Controllers/Ajax/AjaxController.php',
        'Exdda\\Controllers\\Ajax\\Migration' => __DIR__ . '/../..' . '/includes/Controllers/Ajax/Migration.php',
        'Exdda\\Controllers\\Asset\\AssetContoller' => __DIR__ . '/../..' . '/includes/Controllers/Asset/AssetContoller.php',
        'Exdda\\Controllers\\Filter\\FilterController' => __DIR__ . '/../..' . '/includes/Controllers/Filter/FilterController.php',
        'Exdda\\Controllers\\Hook\\HookController' => __DIR__ . '/../..' . '/includes/Controllers/Hook/HookController.php',
        'Exdda\\Controllers\\MainController' => __DIR__ . '/../..' . '/includes/Controllers/MainController.php',
        'Exdda\\Controllers\\Meta\\MetaController' => __DIR__ . '/../..' . '/includes/Controllers/Meta/MetaController.php',
        'Exdda\\Controllers\\Meta\\Types\\Jurygroup' => __DIR__ . '/../..' . '/includes/Controllers/Meta/Types/Jurygroup.php',
        'Exdda\\Controllers\\PostType\\PostTypeController' => __DIR__ . '/../..' . '/includes/Controllers/PostType/PostTypeController.php',
        'Exdda\\Controllers\\PostType\\Types\\AdvisoryMember' => __DIR__ . '/../..' . '/includes/Controllers/PostType/Types/AdvisoryMember.php',
        'Exdda\\Controllers\\PostType\\Types\\Invoice' => __DIR__ . '/../..' . '/includes/Controllers/PostType/Types/Invoice.php',
        'Exdda\\Controllers\\PostType\\Types\\Jurygroup' => __DIR__ . '/../..' . '/includes/Controllers/PostType/Types/Jurygroup.php',
        'Exdda\\Controllers\\PostType\\Types\\Project' => __DIR__ . '/../..' . '/includes/Controllers/PostType/Types/Project.php',
        'Exdda\\Controllers\\PostType\\Types\\Sponsor' => __DIR__ . '/../..' . '/includes/Controllers/PostType/Types/Sponsor.php',
        'Exdda\\Controllers\\PostType\\Types\\Ticket' => __DIR__ . '/../..' . '/includes/Controllers/PostType/Types/Ticket.php',
        'Exdda\\Controllers\\SettingMenu\\Menus\\ReOrder' => __DIR__ . '/../..' . '/includes/Controllers/SettingMenu/Menus/ReOrder.php',
        'Exdda\\Controllers\\SettingMenu\\SettingMenuController' => __DIR__ . '/../..' . '/includes/Controllers/SettingMenu/SettingMenuController.php',
        'Exdda\\Controllers\\Taxonomy\\TaxonomyController' => __DIR__ . '/../..' . '/includes/Controllers/Taxonomy/TaxonomyController.php',
        'Exdda\\Controllers\\Taxonomy\\Types\\ProjectCategory' => __DIR__ . '/../..' . '/includes/Controllers/Taxonomy/Types/ProjectCategory.php',
        'Exdda\\Controllers\\Taxonomy\\Types\\SponsorLevel' => __DIR__ . '/../..' . '/includes/Controllers/Taxonomy/Types/SponsorLevel.php',
        'Exdda\\Controllers\\Taxonomy\\Types\\Year' => __DIR__ . '/../..' . '/includes/Controllers/Taxonomy/Types/Year.php',
        'Exdda\\Controllers\\Widget\\Elementor\\ElementorController' => __DIR__ . '/../..' . '/includes/Controllers/Widget/Elementor/ElementorController.php',
        'Exdda\\Controllers\\Widget\\Elementor\\Widgets\\Example' => __DIR__ . '/../..' . '/includes/Controllers/Widget/Elementor/Widgets/Example.php',
        'Exdda\\Controllers\\Widget\\Gutenberg\\Blocks\\Example' => __DIR__ . '/../..' . '/includes/Controllers/Widget/Gutenberg/Blocks/Example.php',
        'Exdda\\Controllers\\Widget\\Gutenberg\\GutenbergController' => __DIR__ . '/../..' . '/includes/Controllers/Widget/Gutenberg/GutenbergController.php',
        'Exdda\\Controllers\\Widget\\WidgetController' => __DIR__ . '/../..' . '/includes/Controllers/Widget/WidgetController.php',
        'Exdda\\Helpers\\Constant' => __DIR__ . '/../..' . '/includes/Helpers/Constant.php',
        'Exdda\\Helpers\\Functions' => __DIR__ . '/../..' . '/includes/Helpers/Functions.php',
        'Exdda\\Models\\Course' => __DIR__ . '/../..' . '/includes/Models/Course.php',
        'Exdda\\Traits\\SingletonTrait' => __DIR__ . '/../..' . '/includes/Traits/SingletonTrait.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0baa49a8e2cb0c7d03af24f54a63737b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0baa49a8e2cb0c7d03af24f54a63737b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0baa49a8e2cb0c7d03af24f54a63737b::$classMap;

        }, null, ClassLoader::class);
    }
}