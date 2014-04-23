<?php
ini_set('display_errors', 'on');
define('__DEFAULT_LANG__', 'fr'); // @todo change this shitty way
$fonts_root_directory = 'Fonts/Web/'; // don't forget the trailing slash, and check your permissions
define('FONT_CACHE_PATH', './cache/fonts/'); // same as above
$config = array(
    'fonts' => array(
        'directory' => $fonts_root_directory
    )
);

define('SQLITE_DB', 'fonts.sqlite3');