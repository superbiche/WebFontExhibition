<?php

/**
 * @class Tools
 * Actually, a bunch of helpful options for this custom version of Web Font Specimen
 */
class Tools {
    public static $iso_codes = array(
        'fr' => 'fr-FR'
    );
    public static function l($string, $lang = __DEFAULT_LANG__) {
        $iso_code = self::$iso_codes[$lang];
        if(!file_exists(dirname(__FILE__).'/language/'.$iso_code.'.php')) {
            throw new Exception('Language file not found.');
            die(1);
        }
        require dirname(__FILE__).'/language/'.$iso_code.'.php';
        if(!isset($lang_values[$lang])) {
            throw new Exception('Incorrect language values: data truncated or corrupted, or array not found.');
            die(1);
        }
        return isset($lang_values[$lang][$string]) ? $lang_values[$lang][$string] : '';
    }
}