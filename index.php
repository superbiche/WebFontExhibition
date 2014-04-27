<?php
session_set_cookie_params(76000); // will be removed soon
session_start();
//unset($_SESSION['fonts']); 
require_once './inc/config/config.inc.php';
require_once './inc/Tools.class.php';
require_once './inc/PDOFactory.class.php';

require_once './inc/Font.class.php';

// check if directory structure has changed
$dir_changed = false;

if(!$dir_changed && !isset($_SESSION['fonts']))
{
        // if not, check if fonts are in SQLite DB
        $db = \PDOFactory::getSQLiteConnexion();
        try {
            $stmt = $db->query('SELECT * FROM fonts');
            $stmt->execute();
            $fonts = array();
            $db_fonts = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            foreach($db_fonts as $font)
            {
                $font['files'] = json_decode(str_replace('\"', '"', $font['files']), $assoc = true);
                $fonts[$font['name']] = new Font($font);
            }
        } catch(\PDOException $e) {
            $fonts = false;
        }
        // no font table in db, parse the directory
        if(!$fonts) 
        {

            // get the fonts directory from config
            $fonts_dir = opendir($config['fonts']['directory']);

            // init a new Recursive Directory Iterator
            $ite = new RecursiveDirectoryIterator($config['fonts']['directory']);

            $files = $fonts = array();

            // // create the db structure
            //$db->exec('DROP TABLE fonts');
            $db->exec('CREATE TABLE fonts (
                            id_font INTEGER PRIMARY KEY,
                            name TEXT,
                            has_fontfacekit INTEGER,
                            default_path TEXT,
                            files TEXT)');



            // @todo use optgroups if subdirectories
            foreach(new RecursiveIteratorIterator($ite) as $filename => $cur) 
            {

                // if it's a font file, match the file extension
                // @todo check for format instead
                if(preg_match('#(eot|ttf|otf|svg|woff)#i', strtolower($cur->getFilename()), $match) 
                   && substr($cur->getFilename(), 0, 2) != '._' // avoid loading apple ._ files
                    && !preg_match('#.AppleDouble#i', $cur->getPathname())) // avoid loading files found in .AppleDouble folders
                {
                    $files[substr($cur->getFilename(), 0, strlen($cur->getFilename()) - strlen($match[0])-1)][strtolower($match[0])] = array(
                                                                                                                                                 'pathName' => $cur->getPathname(),
                                                                                                                                                 'fileName' => $cur->getFilename()
                                                                                                                                             );
                }

            }
            
            // prepare the pdo statement, using a multi-insert compatible with sqlite 2 and 3  (http://stackoverflow.com/questions/1609637/is-it-possible-to-insert-multiple-rows-at-a-time-in-an-sqlite-database/1734067#1734067)
            $q = '';
            $i = 0;
            if(!empty($files))
            foreach($files as $filename => $filesList) 
            {
                $filename = ucfirst($filename);
                $fonts[$filename] = new Font(array(
                                             'name' => $filename,
                                             'files' => $filesList
                                             ));
                // add the INSERT INTO command to the statement on first loop, then each 500 steps (to keep this long insert statement compatible with older sqlites)
                if($i == 0 || $i % 500 == 0)
                {
                    $q .= 'INSERT INTO `fonts` (`name`, `has_fontfacekit`, `default_path`, `files`) ';
                } else 
                {
                    $q .= 'UNION';
                }
                $q .= ' SELECT ' . $db->quote($fonts[$filename]->name) . ($i > 0 ? '' : ' AS `name`') . ', '.
                            $db->quote($fonts[$filename]->has_fontfacekit) . ($i > 0 ? '' : ' AS `has_fontfacekit`') . ', '.
                            $db->quote($fonts[$filename]->default_path) . ($i > 0 ? '' : ' AS `default_path`') . ', '.
                            $db->quote(str_replace('"', '\"', json_encode($filesList))) . ($i > 0 ? '  '  : ' AS `files` ');
                
                ++$i;
                if($i % 500 == 0) {
                    $stmt = $db->prepare($q);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $q = '';
                }
                    
                if($fonts[$filename]->has_fontfacekit && !isset($default_font)) 
                {
                    $default_font = $fonts[$filename];
                }
            }

            // prepare the last insertions, execute, then close cursor
            $stmt = $db->prepare($q);
            $stmt->execute();
            $stmt->closeCursor();

            // sort the fonts by name, alphabetically
            ksort($fonts, SORT_STRING);

            
            // 2) write the css file with the @font-face declarations
            // 3) write the html content of the select menu
            // @todo try to do this during a previous loop to avoid too many loops
            
            

            // declare each @font-face
            if(!empty($fonts)) 
            {
                // delete old file if exists
                 if(file_exists('cache/fontfaces.css'))
                    unlink('cache/fontfaces.css');
                if(file_exists('cache/fonts.js'))
                    unlink('cache/fonts.js');

                // open (create) file in write mode
                $css_file = fopen('cache/fontfaces.css', 'a');
                $js_file = fopen('cache/fonts.js', 'a');

                $css_str = '';

                $js_str = 'var fonts = "';

                foreach($fonts as $font) 
                {
                    if(is_object($font)) { // necessary until arial is added as an object

                        // set path prefix as the css file is in /cache and css use location relative path
                        $css_str .= $font->buildCSSDeclaration($output = 'indent', $path_prefix = '../') . "\n";

                        // addslashes to escape all the simple/double quotes
                        $js_str .= addslashes($font->buildCSSDeclaration($output = 'condensed')) . " ";

                    }
                }

                $js_str .= '";';

                // write in files
                fwrite($css_file, $css_str);
                fwrite($js_file, $js_str);

                // close the handlers
                fclose($css_file);
                fclose($js_file);
            }

        } else // fonts found in db, fetched, do some treatment if needed
        { 


        }
        

        
        //$_SESSION['fonts'] = $fonts;

} else {
    //$fonts = $_SESSION['fonts'];
}
//echo '<pre>';
//print_r($fonts);
// echo '</pre>';

require_once '_content.php';