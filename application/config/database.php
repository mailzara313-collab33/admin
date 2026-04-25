<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| All credentials are loaded from environment variables.
| Never hardcode credentials here — set them in .env (excluded from git)
| or via cPanel > Software > PHP Environment Variables.
|
| Required env vars:
|   DB_HOST, DB_USER, DB_PASS, DB_NAME
| -------------------------------------------------------------------
*/

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'      => '',
    'hostname' => getenv('DB_HOST') ?: $_ENV['DB_HOST'] ?? 'localhost',
    'username' => getenv('DB_USER') ?: $_ENV['DB_USER'] ?? '',
    'password' => getenv('DB_PASS') ?: $_ENV['DB_PASS'] ?? '',
    'database' => getenv('DB_NAME') ?: $_ENV['DB_NAME'] ?? '',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    // Show DB errors only outside production
    'db_debug'    => (ENVIRONMENT !== 'production'),
    'cache_on'    => FALSE,
    'cachedir'    => '',
    'char_set'    => 'utf8mb4',
    'dbcollat'    => 'utf8mb4_unicode_ci',
    'swap_pre'    => '',
    'encrypt'     => FALSE,
    'compress'    => FALSE,
    'stricton'    => TRUE,
    'failover'    => array(),
    // Disable in production — prevents memory bloat and query leakage in errors
    'save_queries' => (ENVIRONMENT !== 'production'),
);
