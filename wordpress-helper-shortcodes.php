<?php
/**
 * Plugin Name: Wordpress Helper Shortcodes
 * Plugin URI: https://github.com/paulbunyannet/wordpress-helper-shortcodes
 * Description: Common shortcodes we use from project to project
 * Version: 1.0.0
 * Author: Nate Nolting
 * Author URI: https://paulbunyan.net
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package Wordpress Helper
 * @version 1.0.0
 * @author Nate Nolting <naten@paulbunyan.net>
 * @copyright Copyright (c) 2018, Paul Bunyan Communications
 * @link https://github.com/paulbunyannet/wordpress-helper-shortcodes
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

require_once dirname(__FILE__) . '/src/WordpressHelperShortCodes.php';
/**
 * Environment short tag
 * Get an item from the current environment, used like [env ENVIRONMENT_VAR_NAME]
 */

add_shortcode('env', 'wp_helper_sc_get_env');

/**
 * @param $attributes
 * @param null $content
 * @param null $tag
 * @return string|null
 */
function wp_helper_sc_get_env($attributes, $content = null, $tag = null) {
   return WordpressHelperShortCodes::getEnv($attributes, $content, $tag);
}