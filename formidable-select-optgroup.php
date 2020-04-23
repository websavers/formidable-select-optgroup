<?php
/*
Plugin Name: Formidable Select OptGroup
Plugin URI: https://github.com/websavers/formidable-select-optgroup
Description: This plugin will allow you to create optgroups in your Formidable Forms select fields
Version: 2.0
Author: Websavers Inc.
Author URI: https://websavers.ca
Original Creator: Eric Lozaga

Copyright (c) 2015 a 53 minute production

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 3
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

function frm_add_optgroup($html, $field, $args){
	if ($field['type']=='select'){
		if (strpos($html,'**') !== false) {
			$html = preg_replace( "/(<option.*>)\n/", "$1", $html ); //remove line breaks from middle of option HTML
			$options = explode("\n", $html);
			$optgroup_i = 0;
			foreach($options as $key => $opt){
				if (strpos($opt,'**') !== false) {
					preg_match('/<\s*?option\b[^>]*>\s*\*\*(.*?)\*\*\s*<\/option\b[^>]*>/sm', $opt, $matches);
					if (!empty($matches[1])){
						$close_prev = ($optgroup_i > 0)? "</optgroup>\n" : "";
						$options[$key] = "$close_prev<optgroup label=\"{$matches[1]}\">";
						$optgroup_i++;
					}
				}
			}
			if ($optgroup_i > 0) $options[] = "</optgroup>\n"; //Close last group
			$html = implode("\n", $options);
		}
	}
	return $html;
}
add_filter('frm_replace_shortcodes', 'frm_add_optgroup', 10, 3);
