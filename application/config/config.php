<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['base_url'] = APP_URL;
$config['index_page'] = '';
$config['uri_protocol'] = 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = TRUE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-@\=';
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['allow_get_array'] = TRUE;

/*
|--------------------------------------------------------------------------
| Error Logging
|--------------------------------------------------------------------------
| 1 = Errors only (production safe)
| 2 = Debug (development only)
*/
$config['log_threshold'] = 1;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0640;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = '';

/*
|--------------------------------------------------------------------------
| Session Configuration (HARDENED)
|--------------------------------------------------------------------------
| sess_driver = database: session data stored in DB, not in /tmp files.
|
| IMPORTANT: Before deploying, create the ci_sessions table:
|   CREATE TABLE IF NOT EXISTS `ci_sessions` (
|     `id`         varchar(128) NOT NULL,
|     `ip_address` varchar(45)  NOT NULL,
|     `timestamp`  int(10) unsigned DEFAULT 0 NOT NULL,
|     `data`       blob NOT NULL,
|     KEY `ci_sessions_timestamp` (`timestamp`)
|   );
|
| Then run: ALTER TABLE ci_sessions ADD PRIMARY KEY (id);
| If sess_match_ip is TRUE the PRIMARY KEY must include ip_address:
|   ALTER TABLE ci_sessions ADD PRIMARY KEY (id, ip_address);
*/
$config['sess_driver']            = 'database';   // was: 'files' — file sessions break on multi-server
$config['sess_cookie_name']       = 'ci_session';
$config['sess_expiration']        = 7200;          // 2 hours
$config['sess_save_path']         = 'ci_sessions'; // DB table name
$config['sess_match_ip']          = TRUE;          // was: FALSE — IP binding prevents session hijacking
$config['sess_time_to_update']    = 300;           // regenerate session ID every 5 min
$config['sess_regenerate_destroy'] = TRUE;         // was: FALSE — destroy old session data on regeneration

/*
|--------------------------------------------------------------------------
| Cookie Configuration (HARDENED)
|--------------------------------------------------------------------------
*/
$config['cookie_prefix']   = '';
$config['cookie_domain']   = '';
$config['cookie_path']     = '/';
$config['cookie_secure']   = TRUE;   // was: FALSE — only send cookies over HTTPS
$config['cookie_httponly']  = TRUE;  // was: FALSE — block JavaScript access to cookies (XSS mitigation)

// NOTE: CodeIgniter 3 does not support SameSite natively.
// Add to application/hooks/SameSiteCookie.php (see DevSecOps notes):
//   session_set_cookie_params(['samesite' => 'Strict']);

$config['standardize_newlines']  = FALSE;
$config['global_xss_filtering']  = FALSE; // Deprecated in CI3. Use htmlspecialchars() / output_escaping() explicitly.

/*
|--------------------------------------------------------------------------
| CSRF Protection
|--------------------------------------------------------------------------
*/
$config['csrf_protection']  = TRUE;
$config['csrf_token_name']  = 'ekart_security_token';
$config['csrf_cookie_name'] = 'ekart_security_cookie';
$config['csrf_expire']      = 7200;
$config['csrf_regenerate']  = TRUE;

// API routes excluded from CSRF (use JWT bearer token auth instead).
// Webhook routes must validate provider signatures in the controller.
$config['csrf_exclude_uris'] = array(
    'admin/product/process_bulk_upload',
    'auth/login',
    'admin/area/add_city_group',
    'admin/area/add_zipcode_group',
    'compare/add_to_compare',
    'admin/home/reset-password',
    'login/logout',
    'cart/manage',
    'admin/setting/update_seller_flow',
    'auth/[a-z_-]+',
    'admin/return_request/update-return-request',
    'delivery_boy/orders/update_return_order_item_status',
    'cart/place-order',
    'my-account/[a-z_-]+',
    'my-account/update-order-item-status',
    'admin/custom_sms/view_sms_by_id',
    'admin/Sms_gateway_settings/update_notification_module',
    'admin/product/get_subcategory',
    'admin/themes/switch',
    'admin/setting/set-default-theme',
    'my-account/manage-favorites',
    'admin/updater/upload_update_file',
    'my-account/get-zipcode',
    'admin/webhook/spr_webhook',
    'cart/pre-payment-setup',
    'cart/validate-promo-code',
    'my-account/get-address',
    'payment/[a-z_-]+',
    'admin/orders/update_orders',
    'admin/product/update_product_order',
    'admin/orders/delete_orders',
    'admin/product/delete_product',
    'admin/language/set_default_for_web',
    'app/v1/api/[a-z_-]+',
    'delivery_boy/app/v1/api/[a-z_-]+',
    'admin/app/v1/api/[a-z_-]+',
    'admin/home/fetch_sales',
    'seller/app/v1/api/[a-z_-]+',
    'app/v1/Chat_Api/[a-z_-]+',
    'seller/app/v1/Chat_Api/[a-z_-]+',
    'delivery_boy/login/create_delivery_boy',
    'admin/webhook/[a-z_-]+',
    'admin/media/upload',
    'admin/webhook/phonepe_webhook',
    'admin/chat/[a-z_-]+',
    'admin/login/update_user',
    'seller/login/update_user',
    'seller/chat/[a-z_-]+',
    'admin/orders/[a-z_-]+',
    'seller/orders/[a-z_-]+'
);

$config['compress_output'] = FALSE;
$config['time_reference']  = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';

/*
|--------------------------------------------------------------------------
| System Modules (Permission Map)
|--------------------------------------------------------------------------
*/
$config['system_modules'] = [
    'orders'               => array('read', 'update', 'delete'),
    'categories'           => array('create', 'read', 'update', 'delete'),
    'product'              => array('create', 'read', 'update', 'delete'),
    'media'                => array('create', 'read', 'update', 'delete'),
    'product_order'        => array('read', 'update'),
    'tax'                  => array('create', 'read', 'update', 'delete'),
    'attribute'            => array('create', 'read', 'update', 'delete'),
    'attribute_set'        => array('create', 'read', 'update', 'delete'),
    'attribute_value'      => array('create', 'read', 'update', 'delete'),
    'home_slider_images'   => array('create', 'read', 'update', 'delete'),
    'new_offer_images'     => array('create', 'read', 'delete'),
    'promo_code'           => array('create', 'read', 'update', 'delete'),
    'featured_section'     => array('create', 'read', 'update', 'delete'),
    'customers'            => array('read', 'update'),
    'return_request'       => array('read', 'update'),
    'delivery_boy'         => array('create', 'read', 'update', 'delete'),
    'fund_transfer'        => array('create', 'read', 'update', 'delete'),
    'send_notification'    => array('create', 'read', 'delete'),
    'notification_setting' => array('read', 'update'),
    'area'                 => array('create', 'read', 'update', 'delete'),
    'city'                 => array('create', 'read', 'update', 'delete'),
    'faq'                  => array('create', 'read', 'update', 'delete'),
    'chat'                 => array('create', 'read', 'delete'),
];

/*
|--------------------------------------------------------------------------
| Allowed Upload Media Types
|--------------------------------------------------------------------------
| SVG intentionally excluded: SVG files can embed JavaScript and cause XSS.
*/
$config['type'] = array(
    'image'       => ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'eps', 'webp'],
    'video'       => ['mp4', '3gp', 'avchd', 'avi', 'flv', 'mkv', 'mov', 'webm', 'wmv', 'mpg', 'mpeg', 'ogg'],
    'document'    => ['doc', 'docx', 'txt', 'pdf', 'ppt', 'pptx'],
    'spreadsheet' => ['xls', 'xlsx'],
    'archive'     => ['zip', '7z', 'bz2', 'gz', 'gzip', 'rar', 'tar'],
);

$config['excluded_resize_extentions'] = ['gif'];
