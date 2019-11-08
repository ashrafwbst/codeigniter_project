<?php  
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('url_title'))
{

	function url_title($str, $separator = '-', $lowercase = FALSE)
	{
		if ($separator === 'dash')
		{
			$separator = '-';
		}
		elseif ($separator === 'underscore')
		{
			$separator = '_';
		}

		$q_separator = preg_quote($separator, '#');

		$trans = array(
			'&.+?;'			=> '',
			'[^\w\d _-ก-ฮะาิีุูเะแำไใๆ่้๊๋ั็์ึื]'		=> '', /* Fix here for Thai */
			'\s+'			=> $separator,
			'('.$q_separator.')+'	=> $separator
		);

		$str = strip_tags($str);
		foreach ($trans as $key => $val)
		{
			$str = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $str);
		}

		if ($lowercase === TRUE)
		{
			$str = strtolower($str);
		}

		return trim(trim($str, $separator));
	}
        
        if ( ! function_exists('base_url'))
        {
                /**
                 * Base URL
                 *
                 * Create a local URL based on your basepath.
                 * Segments can be passed in as a string or an array, same as site_url
                 * or a URL to a file can be passed in, e.g. to an image file.
                 *
                 * @param	string	$uri
                 * @param	string	$protocol
                 * @param	bool	$static
                 * @return	string
                 */
                function base_url($uri = '', $protocol = NULL, $static = FALSE)
                {
                        return get_instance()->config->base_url($uri, $protocol, $static);
                }
        }
}
