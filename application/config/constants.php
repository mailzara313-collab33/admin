<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| JWT Secret Key — loaded from environment, never hardcoded.
| Generate a new key:  openssl rand -hex 32
| Set via cPanel > PHP Environment Variables or server .env file.
*/
defined('JWT_SECRET_KEY') or define(
    'JWT_SECRET_KEY',
    getenv('JWT_SECRET_KEY') ?: ($_ENV['JWT_SECRET_KEY'] ?? '')
);

if (empty(JWT_SECRET_KEY)) {
    log_message('error', 'CRITICAL: JWT_SECRET_KEY environment variable is not set.');
    show_error('Server configuration error. Please contact the administrator.', 500);
}

/*
| Debug backtrace — disabled in all environments for security.
| Stack traces leak file paths, line numbers, and internal logic.
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', FALSE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
*/
defined('FILE_READ_MODE')  or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
*/
defined('FOPEN_READ')                          or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                    or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')      or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb');
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b');
defined('FOPEN_WRITE_CREATE')                  or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')             or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')           or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')      or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
*/
defined('EXIT_SUCCESS')      or define('EXIT_SUCCESS', 0);
defined('EXIT_ERROR')        or define('EXIT_ERROR', 1);
defined('EXIT_CONFIG')       or define('EXIT_CONFIG', 3);
defined('EXIT_UNKNOWN_FILE') or define('EXIT_UNKNOWN_FILE', 4);
defined('EXIT_UNKNOWN_CLASS')  or define('EXIT_UNKNOWN_CLASS', 5);
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6);
defined('EXIT_USER_INPUT')   or define('EXIT_USER_INPUT', 7);
defined('EXIT_DATABASE')     or define('EXIT_DATABASE', 8);
defined('EXIT__AUTO_MIN')    or define('EXIT__AUTO_MIN', 9);
defined('EXIT__AUTO_MAX')    or define('EXIT__AUTO_MAX', 125);

// Application path constants
define('FORMS', 'forms/');
define('IS_ALLOWED_MODIFICATION', 1);
define('CI_DEBUG', FALSE);
define('DEMO_VERSION_MSG', 'Modification in demo version is not allowed');
define('SEMI_DEMO_MODE', 1);
define('APP_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));
define('SEMI_DEMO_MODE_MSG', 'Modification in semi demo version is not allowed');
define('TABLES', 'tables/');
define('VIEW', 'view/');
define('AFFILIATE', 'affiliate/');
define('CATEGORY_IMG_PATH', 'uploads/category_image/');
define('SUBCATEGORY_IMG_PATH', 'uploads/subcategory_image/');
define('PRODUCT_IMG_PATH', 'uploads/product_image/');
define('SLIDER_IMG_PATH', 'uploads/slider_image/');
define('OFFER_IMG_PATH', 'uploads/offer_image/');
define('NOTIFICATION_IMG_PATH', 'uploads/notifications/');
define('USER_IMG_PATH', 'uploads/user_image/');
define('UPDATE_PATH', 'update/');
define('MEDIA_PATH', 'uploads/media/');
define('CHAT_MEDIA_PATH', 'uploads/chat_media/');
define('FIREBASE_PATH', '');
define('NO_IMAGE', 'assets/no-image.png');
define('NO_USER_IMAGE', 'assets/no-user-img.png');
define('EMAIL_ORDER_SUCCESS_IMG_PATH', 'assets/admin/images/order-success.png');
define('REVIEW_IMG_PATH', 'uploads/review_image/');
define('TICKET_IMG_PATH', 'uploads/tickets/');
define('DIRECT_BANK_TRANSFER_IMG_PATH', 'uploads/bank_transfer/');
define('SELLER_DOCUMENTS_PATH', 'uploads/seller/');
define('DELIVERY_BOY_DOCUMENTS_PATH', 'uploads/delivery_boy/');
define('ORDER_ATTACHMENTS', 'uploads/order_attachments/');
define('RETURN_IMAGES', 'uploads/return_images/');
define('APP_CODE', '34108271');
define('WEB_CODE', '34380052');

// Thumbnail paths
define('THUMB_MD', 'thumb-md/');
define('THUMB_SM', 'thumb-sm/');
define('CROPPED_MD', 'cropped-md/');
define('CROPPED_SM', 'cropped-sm/');

define('PERMISSION_ERROR_MSG', ' You are not authorize to operate on the module ');

// Ticket status
define('PENDING', '1');
define('OPENED', '2');
define('RESOLVED', '3');
define('CLOSED', '4');
define('REOPEN', '5');

define('BANK_TRANSFER', 'Direct Bank Transfer');

// Pincode deliverable type
define('NONE', '0');
define('ALL', '1');
define('INCLUDED', '2');
define('EXCLUDED', '3');

defined('WORD_LIMIT') || define('WORD_LIMIT', 12);
defined('DESCRIPTION_WORD_LIMIT') || define('DESCRIPTION_WORD_LIMIT', 150);
defined('SHORT_DESCRIPTION_WORD_LIMIT') || define('SHORT_DESCRIPTION_WORD_LIMIT', 22);
