<?php
/**
 * Bolton Barber Studio Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Vite Bridge Helper
 */
class BoltonViteBridge {
	private static $instance = null;
	private $is_dev = false;
	private $server_url = 'http://localhost:5173';

	public function __construct() {
		// Detect if dev server is running
		$this->is_dev = $this->check_dev_server();
		
		add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
		add_filter('script_loader_tag', [$this, 'add_type_module'], 10, 3);
	}

	public static function get_instance() {
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function check_dev_server() {
		$response = wp_remote_get($this->server_url, ['timeout' => 1]);
		return !is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200;
	}

	public function enqueue_assets() {
		if ($this->is_dev) {
			// Enqueue Vite client
			wp_enqueue_script('vite-client', $this->server_url . '/@vite/client', [], null, true);
			// Enqueue main entry point
			wp_enqueue_script('bolton-main', $this->server_url . '/src/main.ts', [], null, true);
		} else {
			// Production: Load from manifest
			$manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
			if (file_exists($manifest_path)) {
				$manifest = json_decode(file_get_contents($manifest_path), true);
				if (isset($manifest['src/main.ts'])) {
					$entry = $manifest['src/main.ts'];
					wp_enqueue_script('bolton-main', get_template_directory_uri() . '/dist/' . $entry['file'], [], null, true);
					if (isset($entry['css'])) {
						foreach ($entry['css'] as $css_file) {
							wp_enqueue_style('bolton-styles', get_template_directory_uri() . '/dist/' . $css_file);
						}
					}
				}
			}
		}
	}

	public function add_type_module($tag, $handle, $src) {
		if (in_array($handle, ['vite-client', 'bolton-main'])) {
			return '<script type="module" src="' . esc_url($src) . '" id="' . esc_attr($handle) . '-js"></script>';
		}
		return $tag;
	}
}

BoltonViteBridge::get_instance();

/**
 * Register ACF Fields and Theme Settings
 */
add_action('acf/init', function() {
    // Add Options Page
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page([
            'page_title'    => 'Studio Settings',
            'menu_title'    => 'Studio Settings',
            'menu_slug'     => 'studio-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url'      => 'dashicons-scissors',
        ]);
    }

    // Global Settings Field Group
    acf_add_local_field_group([
        'key' => 'group_studio_settings',
        'title' => 'Studio Information',
        'fields' => [
            [
                'key' => 'field_studio_phone',
                'label' => 'Phone Number',
                'name' => 'studio_phone',
                'type' => 'text',
                'default_value' => '303-901-1163',
            ],
            [
                'key' => 'field_studio_address',
                'label' => 'Address',
                'name' => 'studio_address',
                'type' => 'textarea',
                'default_value' => "10160 w50th ave Unit 3 suite 104\nWheat Ridge, CO 80033",
            ],
            [
                'key' => 'field_studio_email',
                'label' => 'Email',
                'name' => 'studio_email',
                'type' => 'email',
                'default_value' => 'Boltonbarbering@gmail.com',
            ],
            [
                'key' => 'field_sms_optin_text',
                'label' => 'SMS Opt-in Text',
                'name' => 'sms_optin_text',
                'type' => 'textarea',
                'default_value' => 'I agree to receive automated promotional and personalized marketing text messages from Bolton Barber Studio...',
            ],
            [
                'key' => 'field_web3forms_key',
                'label' => 'Web3Forms Access Key',
                'name' => 'web3forms_access_key',
                'type' => 'text',
                'instructions' => 'Paste your Access Key from Web3Forms.com so form submissions are sent to your email.',
                'default_value' => '7f11b2f4-2253-439e-aba0-474729ce130f',
            ]
        ],
        'location' => [
            [['param' => 'options_page', 'operator' => '==', 'value' => 'studio-settings']],
        ],
    ]);

    // Hero Section Field Group
    acf_add_local_field_group([
        'key' => 'group_home_hero',
        'title' => 'Home Page: Hero',
        'fields' => [
            [
                'key' => 'field_hero_headline',
                'label' => 'Headline',
                'name' => 'hero_headline',
                'type' => 'text',
                'default_value' => 'Elite Fades',
            ],
            [
                'key' => 'field_hero_subheadline',
                'label' => 'Subheadline',
                'name' => 'hero_subheadline',
                'type' => 'text',
                'default_value' => 'Modern Vibes',
            ],
            [
                'key' => 'field_hero_description',
                'label' => 'Description',
                'name' => 'hero_description',
                'type' => 'textarea',
                'default_value' => 'Master Barber Chris Bolton brings precision and consistency to every chair.',
            ],
            [
                'key' => 'field_hero_bg',
                'label' => 'Background Image',
                'name' => 'hero_bg',
                'type' => 'image',
                'return_format' => 'url',
            ],
        ],
        'location' => [
            [['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
        ],
    ]);

    // Legacy Section Field Group
    acf_add_local_field_group([
        'key' => 'group_home_legacy',
        'title' => 'Home Page: Legacy',
        'fields' => [
            [
                'key' => 'field_legacy_headline',
                'label' => 'Headline',
                'name' => 'legacy_headline',
                'type' => 'text',
                'default_value' => 'Meet the Master',
            ],
            [
                'key' => 'field_legacy_content',
                'label' => 'Content',
                'name' => 'legacy_content',
                'type' => 'wysiwyg',
            ],
            [
                'key' => 'field_legacy_image',
                'label' => 'Legacy Image',
                'name' => 'legacy_image',
                'type' => 'image',
                'return_format' => 'url',
            ],
        ],
        'location' => [
            [['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
        ],
    ]);

    // Services Field Group
    acf_add_local_field_group([
        'key' => 'group_home_services',
        'title' => 'Home Page: Services',
        'fields' => [
            [
                'key' => 'field_services_repeater',
                'label' => 'Service Menu',
                'name' => 'service_menu',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => 'field_service_name',
                        'label' => 'Service Name',
                        'name' => 'name',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_service_price',
                        'label' => 'Price',
                        'name' => 'price',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_service_desc',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'field_is_premium',
                        'label' => 'Premium?',
                        'name' => 'is_premium',
                        'type' => 'true_false',
                        'ui' => 1,
                    ],
                ],
            ],
            [
                'key' => 'field_addons_repeater',
                'label' => 'Premium Add-ons',
                'name' => 'addons_menu',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'key' => 'field_addon_name',
                        'label' => 'Add-on Name',
                        'name' => 'name',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_addon_price',
                        'label' => 'Price',
                        'name' => 'price',
                        'type' => 'text',
                    ],
                ],
            ],
        ],
        'location' => [
            [['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']],
        ],
    ]);
});

/**
 * SEO & Local Schema (JSON-LD)
 */
add_action('wp_head', function() {
    $phone = get_field('studio_phone', 'options') ?: '303-901-1163';
    $address = get_field('studio_address', 'options') ?: "10160 w50th ave Unit 3 suite 104\nWheat Ridge, CO 80033";
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "BarberShop",
        "name" => get_bloginfo('name'),
        "image" => get_template_directory_uri() . '/assets/bolton-logo.jpg',
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => "10160 w50th ave Unit 3 suite 104",
            "addressLocality" => "Wheat Ridge",
            "addressRegion" => "CO",
            "postalCode" => "80033",
            "addressCountry" => "US"
        ],
        "geo" => [
            "@type" => "GeoCoordinates",
            "latitude" => 39.7869,
            "longitude" => -105.1118
        ],
        "url" => home_url(),
        "telephone" => $phone,
        "priceRange" => "$$"
    ];

    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
});
add_action('after_setup_theme', function() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
});
