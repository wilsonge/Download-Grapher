Download-Grapher
================

A Joomla Component to view downloads with graphical feature. It allows you to track weekly download counts and total download counts of anything you like! It uses the jQuery Visualize plugin (with a few tweaks). So all bugs in it are going to be due to my changes!!

Primarily designed for use on my own site I decided it might be useful for anyone else if they wished to adapt to their own site and so uploaded it to github. I hope that you find this useful if you choose to use it!

Please feel free to post about any bugs etc. And I'll try and fix them ASAP

SQL Tables
================
It requires two sql tables (not installed with the component) with the following layout:

Table 1 (in this component called #__jjdownloads):

References: 

admin/models/totaldownloads.php    Line: 19

admin/models/jjdownloads.php       Line: 39

Layout: 

Coloumn 1 (key): id

Coloumn 2: Name for inserting values into table

Coloumn 3: Downloads Counts

Coloumn 4: Name for Graph Table

Note this needs to be updated by you with a function attached to a download button.

Table 2 (in this component called #__jjdownloads_history):

References: 

admin/models/jjdownloads.php       Line: 19

Layout: 

Coloumn 1 (key): id

Coloumn 2: Date

Coloumn 3: Download count

Note the second table should be automatically populated by the cron.php file when the cron is set up

Cron Usage
================
A cron.php file is supplied with the module. Assuming the sql layout given above is used then it will automatically update the second file with values.

A example command would be:
/home/USERNAME/public_html/administrator/components/com_jjdownloads/cron.php
where USERNAME is replaced with the username used on your hosting. 

You also need to specify how regularly to update the cron file. The component is designed for a weekly update currently. The example below will update every Monday:

Min Hour Day Month Weekday

 0	 0 	  *	   *	 1
 