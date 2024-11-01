<?php
/*
Plugin Name: TentBlogger Gravatar Reminder
Plugin URI: http://tentblogger.com/gravatar-reminder/
Description: Remind your commenters to get a <a href="http://tentblogger.com/gravatar/">Gravatar</a>!
Version: 2.2
Author: TentBlogger
Author URI: http://tentblogger.com
Author Email: info@tentblogger.com
*/

/*------------------------------------------------*
 * Core Functions
 *------------------------------------------------*/ 

/**
 * Imports the default stylesheet for the plugin.
 */
function tentblogger_gravatar_reminder_init() {
  if(!is_admin()) {
    wp_register_style('tentblogger-gravatar-reminder', WP_PLUGIN_URL . '/tentblogger-gravatar-reminder/css/style.css');
    wp_enqueue_style('tentblogger-gravatar-reminder'); 
  } // end if
} // end tentblogger_gravatar_reminder_init
 
/**
 * Appends a reminder below the "Submit Comment" button on the comment form
 * reminding users to sign up for gravatars!
 */
function show_gravatar_reminder() {
  
  $str_reminder = '<p class="tentblogger-gravatar-reminder">';
    $str_reminder .= __("Don't have a Gravatar? ", 'tentblogger-gravatar-reminder');
    $str_reminder .= '<a href="http://en.gravatar.com/" target="_blank">';
      $str_reminder .= __('Get one!', 'tentblogger-gravatar-reminder');
    $str_reminder .= '</a>';
  $str_reminder .= '</p>';
  	
  echo $str_reminder;
  
} // end show_gravatar_reminder

/*------------------------------------------------*
 * WordPress Hooks
 *------------------------------------------------*/ 
add_action('init', 'tentblogger_gravatar_reminder_init');
add_action('comment_form', 'show_gravatar_reminder');

?>