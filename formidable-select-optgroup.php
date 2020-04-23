<?php
/*
Plugin Name: Formidable Select OptGroup
Plugin URI: http://www.53mp.com/formdiable-select-optgroup
Description: This plugin will allow you to create optgroup's in your select forms
Version: 1.0
Author: Eric Lozaga
Author URI: http://53mp.com

Copyright (c) 2015 a 53 minute production

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

*/ 

//////////////////////////////////////////////////////

function frm_add_opgroup($html, $field, $args){
	if($field['type']=='select'){
		if (strpos($html,'**') !== false) {
			$h = explode("\n", $html);
			$newline = '';
			foreach($h AS $line){
				$line = trim($line);
				if(substr( $line, 0, 17) === '<option value="**'){
					$pattern = "#<\s*?option\b[^>]*>(.*?)</option\b[^>]*>#s";
					preg_match($pattern, $line, $matches);
					$g = str_replace("**", "", $matches[1]);
					$newline.= '<optgroup label="'.$g.'"></optgroup>';
				}
				else{
					$newline .= $line;
				}
			}
			$html = $newline;
		}
	}
	return $html;
}
add_filter('frm_replace_shortcodes', 'frm_add_opgroup', 10, 3);
