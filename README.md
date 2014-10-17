# Web Font Specimen Server

[Web Font Specimen](http://wfs.typographisme.net/) is a very lightweight tool helping any designer who uses type to check any font properties in a really simple and fast way.  

[Web Font Specimen Server](http://www.webiche.info/projects/wfss) is just aimed at people having a PHP server available, who need to check **loads** of fonts - just like me at this time.

_**For people who don't like PHP**, you can simply use [Web Font Specimen](http://wfs.typographisme.net/) coupled with [FontFrient](http://somadesign.ca/projects/fontfriend/), an incredibly useful bookmarklet that allows you to change your page's font by simply dragging it in a zone. But that's not the point._

## How to

### Installation

Extract the content of the archive if needed, then simply move the folder anywhere under your webserver document root.  
While it's not essential, I recommend setting a virtual host. Nice web typography deserves at least a host, you lazy!

#### Linking to the fonts
##### Directory structure
The easiest way to use WFSS is **linking** to a folder containing all your fonts or subfolders in which fonts can be found.  
It can be like in the following examples :  

* Simple folder containing both fonts and font folders  
-`Fonts`	
++++`OpenSans`  
------`Arial(huh)`  
---------------`ArialBold.ttf`

* Folder ordered by type … type  
-`Fonts`	
++++`Handwritten`  
------`Serif`  
---------------`JustOldFashion`  
------------------------------------`JustOldFashion.ttf`

* If you find some folder structures that are not read correctly, please make a pull request if you think you can fix it, or post an issue in this project's Github. I'll fix it asap.

##### Linking 
* __Mac OS X users, as well as Linux users, can make a link to their Fonts folder in the terminal by typing : __  
	`ln -s [/path/to/your/fonts/folder] [/path/to/web-font-specimen-server/root/Fonts]`  
	_(the second path must be the same that the index.php file)_  
	For me, it was : `ln -s ~/Fonts/Web ~/www/tools/WebFontSpecimenServer/htdocs/Fonts`  
	
* __Windows users have to build a symlink using [this tutorial](http://www.simounet.net/creation-de-liens-symboliques-sous-windows-7-symlink/)__ (_in french_).  
If you can't read french, go to [this page on How-To Geek](http://www.howtogeek.com/howto/16226/complete-guide-to-symbolic-links-symlinks-on-windows-or-linux/) _(didn't test this one)_


#### Setting the config file
Just open the /inc/config.inc.php file and set config.fonts.directory to the right location, regarding your document root (_will be `/Fonts` for me. I use dotted notation as this project is part of a framework project using this config notation_)



### Enjoy the beauty of type
Now you're done! Just go with your browser to the right page, and you should see something really similar to Web Font Specimen, with just one exception: the select menu allows you to dynamically change the font you're watching, but also to see a preview of all the fonts. 