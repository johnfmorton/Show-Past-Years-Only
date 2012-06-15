<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * ShowPastYearsOnly Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		John Morton
 * @link		http://jmx2.com
 */

$plugin_info = array(
	'pi_name'		=> 'ShowPastYearsOnly',
	'pi_version'	=> '1.0',
	'pi_author'		=> 'John Morton',
	'pi_author_url'	=> 'http://supergeekery.com',
	'pi_description'=> 'Show only past yearly date stamp.',
	'pi_usage'		=> Showpastyearsonly::usage()
);


class Showpastyearsonly {

	public $return_data;
    
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		$theYear = $this->EE->TMPL->fetch_param('year');
		$foreword = $this->EE->TMPL->fetch_param('foreword');
		$afterword = $this->EE->TMPL->fetch_param('afterword');

		// replace the token SPACE with a space character
		$patterns = 'SPACE';
		$replacements = ' ';
		$foreword = str_replace($patterns, $replacements, $foreword);
		$afterword = str_replace($patterns, $replacements, $afterword);


		$currentYear = date("Y");
		$returnedYear = '';
		if ($theYear != $currentYear) {
			$returnedYear = $foreword . $theYear . $afterword;
		}

		$this->return_data .= $returnedYear;
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>

What if you only wanted to show the year for entries from past years and leave more current entries with a cleaner date? This plug-in is here to help. 

Just pass in a year, presumably from the entry date of an entry, and this will return the year for display only if it does not match the current year. It can also prepend or append strings to the output to give you the proper formatting for your dates that do display the year.

The plug-in requires 1 parameter and has 2 optional parameters:

The 'year' parameter is required. This is typically the year of the entry you are displaying.

The 'foreword' and 'afterword' parameters are optional. They are strings that will be added before or after the returned year, if a year is returned at all. 

NOTE: ExpressionEngine trims whitespace from parameter values, so in order to use spaces in 'foreword' and 'afterword' we need a special token. This token is the word "SPACE" and it will be replaced with an actual space character when returned.

-----------------------------------

For example let's assume you have an entry created on January 1, <?php echo date('Y');?>. Within a channels entry loop returning that entry, you would do something like this:

{entry_date format='%F %j'}{exp:showpastyearsonly year='{entry_date format='%Y'}' foreword=',SPACE'}

During <?php echo date('Y');?>, this would return:

January 1

As soon as <?php echo date('Y');?> is over, it will return:

January 1, <?php echo date('Y');?>




<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.showpastyearsonly.php */
/* Location: /system/expressionengine/third_party/showpastyearsonly/pi.showpastyearsonly.php */