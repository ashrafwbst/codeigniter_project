<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_URI Extends CI_URI {
	
	protected function _set_uri_string($str)
	{
		$this->uri_string = trim(remove_invisible_characters($str, FALSE), '/');
		if ($this->uri_string !== '')
		{
			// Remove the URL suffix, if present
			if (($suffix = (string) $this->config->item('url_suffix')) !== '')
			{
				$slen = strlen($suffix);

				if (substr($this->uri_string, -$slen) === $suffix)
				{
					$this->uri_string = substr($this->uri_string, 0, -$slen);
				}
			}
			$this->segments[0] = NULL;
			// Populate the segments array
			foreach (explode('/', trim($this->uri_string, '/')) as $val)
			{
				$val = trim($val);
				// Filter segments for security
				$this->filter_uri($val);

				if ($val !== '')
				{
					$this->segments[] = urldecode($val); /* Fix here */
				}
			}
			unset($this->segments[0]);
		}
	}
}
