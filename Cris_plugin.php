<?php
/**
 * @package  Cris plugin
 */
/*
Plugin Name: Cris Plugin
Plugin URI: http://alecaddd.com/plugin
Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
Version: 1.0.0
Author: Crispin Manda
Author URI: http://crispin-manda.epizy.com/index.html.com
License: GPLv2 or later
Text Domain: Cris plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
*/


defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );


if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
// ---------------------------------------------------------------

function create_employees_post_type() {
    $labels = array(
        'name' => __( 'Employees' ),
        'singular_name' => __( 'Employee' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'rewrite' => array('slug' => 'employees'),
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type( 'employees', $args );
}
add_action( 'init', 'create_employees_post_type' );


function create_department_taxonomy() {
    $labels = array(
        'name' => __( 'Departments' ),
        'singular_name' => __( 'Department' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'department'),
    );
    register_taxonomy( 'department', 'employees', $args );
}
add_action( 'init', 'create_department_taxonomy' );

// --------------------------------------------------------------------
function activate_Cris_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_Cris_plugin' );


function deactivate_Cris_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_Cris_plugin' );


if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}

// use Cris_Plugin\Plugin;

// $plugin = new Plugin();
// $plugin->run();


