<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
  'pi_name' => 'Last Updated',
  'pi_version' => '1.0.0',
  'pi_author' => 'Alex Kendrick',
  'pi_author_url' => 'http://twosixcode.com/',
  'pi_description' => 'A simple plugin that returns the edit date of the most recently updated template or channel entry. Accepts EE date variable formatting.',
  'pi_usage' => Last_updated::usage()
  );

/**
 * Last_updated Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Alex Kendrick
 * @copyright		Copyright (c) 2010, Alex Kendrick
 * @link			http://twosixcode.com/expressionengine-add-ons/
 */

class Last_updated
{

var $return_data = "";

	// --------------------------------------------------------------------

	/**
	 * Last_updated
	 *
	 * This function returns a list of members
	 *
	 * @access	public
	 * @return	string
	 */

	function Last_updated()
	{
		$this->EE =& get_instance();
		
		// get the edit date of the most recently updated channel entry or template, whichever is more recent
	    $query = $this->EE->db->query('SELECT UNIX_TIMESTAMP(edit_date) AS last_updated FROM exp_channel_titles UNION SELECT edit_date FROM exp_templates ORDER BY last_updated DESC LIMIT 1');
		
		// load the date helper
		$this->EE->load->helper('date');
		
		// get the plugin tag's date format parameter
		$format = $this->EE->TMPL->fetch_param('format');			
		
		// return the date with specified format using the date helper's mdate() function
		$this->return_data .= mdate($format, ($query->row('last_updated')));
	}

	// --------------------------------------------------------------------

	/**
	 * Usage
	 *
	 * This function describes how the plugin is used.
	 *
	 * @access	public
	 * @return	string
	 */
	
  //  Make sure to use output buffering

  function usage()
  {
  ob_start(); 
  ?>

The Last Updated Plugin outputs the edit date of the most recently edited template or entry. It uses EE's date formatting
http://expressionengine.com/user_guide/templates/date_variable_formatting.html

EXAMPLE:

{exp:last_updated format="%F %d, %Y"}

would return something like "November 24, 2010"

  <?php
  $buffer = ob_get_contents();
	
  ob_end_clean(); 

  return $buffer;
  }
  // END

}
/* End of file pi.last_updated.php */ 
/* Location: ./system/expressionengine/third_party/last_updated/pi.last_updated.php */