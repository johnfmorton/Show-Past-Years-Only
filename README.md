# Installation instructions

To install 'Show Past Years Only' place the 'showpastyearsonly' into your system/expressionengine/third_party folder.

# Overview

What if you only wanted to show the year for entries from past years and leave more current entries with a cleaner date? This plug-in is here to help. 

Just pass in a year, presumably from the entry date of an entry, and this will return the year for display only if it does not match the current year. It can also prepend or append strings to the output to give you the proper formatting for your dates that do display the year.

# Usage

It requires 1 parameter and had 2 optional parameters:

'year' is required. This is typically the year of the entry you are displaying.

'foreword' and 'afterword' are optional and are strings that will be added before or after the returned year, if a year is returned at all. 

NOTE: ExpressionEngine trims whitespace from parameter values, so in order to use spaces in 'foreword' and 'afterword' we need a special token. This token is the word "SPACE" and it will be replaced with an actual space character when returned.

-----------------------------------

For example let's assume you have an entry created on January 1, 2012. Within a channels entry loop returning that entry, you would do something like this:

{entry_date format='%F %j'}{exp:showpastyearsonly year='{entry_date format='%Y'}' foreword=',SPACE'}

During 2012, this would return:

January 1

As soon as 2012 is over, it will return:

January 1, 2012


--

If you have any questions, please drop me a line at john@johnfmorton.com.

If you like this add-on, you may also like my commerical add-on,  Pic Puller: the Instagram Add-on for ExpressionEngine at http://devot-ee.com/add-ons/pic-puller-for-instagram.

Thanks.

-John