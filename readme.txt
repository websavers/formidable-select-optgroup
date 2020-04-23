=== Formidable Select OptGroup ===
Contributors: montanabanana, abda53, jas8522, websavers
Tags: formidable select optgroup form
Requires at least: 3.0
Tested up to: 5.4
License: GPLv2 or later

== Description ==
This plugin will allow you to group select tag options using HTML standard <optgroup> tags in your Formidable forms
Original project code found here: https://wordpress.org/plugins/formidable-select-optgroup/

== Installation ==
1. Upload the plugin folder to the `/wp-content/plugins/` directory, or install from the repository
2. Activate the plugin from the Plugin menu in Wordpress
3. In your Formidable form, add/edit a Dropdown select box
4. To create an optgroup, add two **'s around the name, for example to create an optgroup of Ford, do **Ford**

== Screenshots ==
1. **Admin View** - Quick Edit
2. **Admin View** - Bulk Edit
3. **Frontend View** - In action
4. **Code Output** - Outputted code

== Frequently Asked Questions ==/
1. What if I want to use something besides two **'s? If you do, just edit the code to fit your needs. I kept this out of the database for speed, but I can add it in the future if people want it.

== Future ToDos ==
1. If there is interest, I can add the ** flag into the database.

== Changelog ==
2.0 
- Forked by Websavers Inc and published on GitHub under GPLv3
- Repaired bug caused by line-break in middle of <option [...] /option> code
- Ensure HTML syntax is valid by providing closing </optgroup> tags to correctly wrap the <option> tags within

1.0 Initial Development
