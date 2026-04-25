<?php
/**
 * Ion Auth Configuration
 * Credentials loaded from environment variables — never hardcoded.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$config['database_group_name'] = '';

$config['tables']['login_users']    = 'users';
$config['tables']['groups']         = 'groups';
$config['tables']['users_groups']   = 'users_groups';
$config['tables']['login_attempts'] = 'login_attempts';

$config['join']['login_users'] = 'user_id';
$config['join']['groups']      = 'group_id';

// Hash method: bcrypt (cost 10 for users, 12 for admins)
$config['hash_method']          = 'bcrypt';
$config['bcrypt_default_cost']  = 10;
$config['bcrypt_admin_cost']    = 12;
$config['argon2_default_params'] = [
    'memory_cost' => 1 << 12,
    'time_cost'   => 2,
    'threads'     => 2,
];
$config['argon2_admin_params'] = [
    'memory_cost' => 1 << 14,
    'time_cost'   => 4,
    'threads'     => 2,
];

$config['site_title']                 = 'Eshop';
$config['admin_email']                = 'admin@example.com';
$config['default_group']              = 'members';
$config['admin_group']                = 'admin';
$config['delivery_boy_group']         = 'delivery_boy';
$config['seller_group']               = 'seller';
$config['identity']                   = 'mobile';
$config['min_password_length']        = 8;
$config['email_activation']           = FALSE;
$config['manual_activation']          = FALSE;
$config['remember_users']             = TRUE;
$config['user_expire']                = 86500;
$config['user_extend_on_login']       = FALSE;
$config['track_login_attempts']       = TRUE;
$config['track_login_ip_address']     = TRUE;
$config['maximum_login_attempts']     = 3;
$config['lockout_time']               = 600;
$config['forgot_password_expiration'] = 1800;
$config['recheck_timer']              = 0;

/*
| Session hash — loaded from environment variable.
| Generate: openssl rand -hex 32
| Set ION_AUTH_SESSION_HASH in server environment / cPanel PHP env vars.
*/
$config['session_hash'] = getenv('ION_AUTH_SESSION_HASH')
    ?: ($_ENV['ION_AUTH_SESSION_HASH'] ?? '');

if (empty($config['session_hash'])) {
    log_message('error', 'CRITICAL: ION_AUTH_SESSION_HASH environment variable is not set.');
    show_error('Server configuration error. Please contact the administrator.', 500);
}

$config['remember_cookie_name'] = 'remember_code';

$config['use_ci_email'] = TRUE;
$config['email_config'] = ['mailtype' => 'html'];

$config['email_templates']      = 'auth/email/';
$config['email_activate']       = 'activate.tpl.php';
$config['email_forgot_password'] = 'forgot_password.tpl.php';

$config['delimiters_source']       = 'config';
$config['message_start_delimiter'] = '<div>';
$config['message_end_delimiter']   = '</div>';
$config['error_start_delimiter']   = '<div>';
$config['error_end_delimiter']     = '</div>';
