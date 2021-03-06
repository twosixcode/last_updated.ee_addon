# Last Updated Plugin for ExpressionEngine 2.x

### Description

A simple plugin that returns the edit date of the most recently updated template or channel entry. Accepts [EE date variable formatting](http://expressionengine.com/user_guide/templates/date_variable_formatting.html). Based on a query suggested in the [EE forums](http://expressionengine.com/archived_forums/viewthread/111912/#565041).


### Installation:

Copy <code>last_updated</code> to <code>system/expressionengine/third_party/</code>

### Usage:

The Last Updated Plugin outputs the edit date of the most recently edited template or entry. It uses [EE's date formatting](http://expressionengine.com/user_guide/templates/date_variable_formatting.html)

EXAMPLE:

	{exp:last_updated format="%F %d, %Y"}

...would return something like "November 24, 2010"

### Changelog

Version 1.0.0 - Initial release