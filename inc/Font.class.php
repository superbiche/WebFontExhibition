<?php

class Font {
    public 
        /**
         * @var array $files [an array containing all the font's files as SPLFileInfos]
         */
        $files = array(),
        /**
         * @var boolean $has_fontfacekit [are there .eot, .ttf, .woff and .svg files for this font?]
         */
        $has_fontfacekit,
        /**
         * @var string $name [the name of the font]
         * @todo atm it's the name of the file but I'm looking for a way and a lib to use in PHP to get it's real name
         */
        $name,
        /**
         * @var string $default_path [the default path to a random format available. Filenames should only differ by format]
         */
        $default_path
        ;
    public function __construct(Array $data) {
        foreach($data as $key => $value)
        {
            //if ($this->$key) {
                $this->$key = $value;
            //}
        }
        if(empty($this->has_fontfacekit) && $this->has_fontfacekit !== 0 && !empty($this->files))
            $this->setHasFontFaceKit();
        $format = $this->getRandFormat();
        if($format && empty($this->default_path))
            $this->default_path = substr($this->files[$format]['pathName'], 0, $this->files[$format]['pathName']- strlen($format) - 1);
    }
    protected function setHasFontFaceKit()
    {
          if(array_key_exists('ttf', $this->files)
            && array_key_exists('eot', $this->files)
            && array_key_exists('svg', $this->files)
            && array_key_exists('woff', $this->files)) {
            $this->has_fontfacekit = true;
        }
    }
    /**
     * Public function buildCSSDeclaration
     * Proxy for the next 2 methods, it choses one of the available protected CSS declaration methods depending on the file formats available
     * @param $output can be indent or anything else actually. Indent inserts line breaks for a clean css file for development, 'blop' returns condensed data (for json encoding etc)
     * @param weight(string, optional, default : 'normal') : the weight of the font file
     * @param style(string, optional, default : 'normal') : the style of the font file
     * @param variant(string, optional, default : 'normal') : the variant of the font file (normal / small-caps!)
     * @return string : a font-face CSS declaration
     */
    public function buildCSSDeclaration($output = 'indent', $path_prefix = '', $weight = 'normal', $style = 'normal', $variant = 'normal') {
        return $this->has_fontfacekit ? $this->buildCompleteCSSDeclaration($output, $path_prefix, $weight, $style, $variant) : $this->buildFallbackCSSDeclaration($output, $path_prefix, $weight, $style, $variant);
    }
    /**
     * Protected function buildCompleteCSSDeclaration
     * Builds a complete, cross-browser CSS @font-face declaration and sets the font as default for body inside a <script> block
     * @param $output can be indent or anything else actually. Indent inserts line breaks for a clean css file for development, 'blop' returns condensed data (for json encoding etc)
     * @param weight(string, optional, default : 'normal') : the weight of the font file
     * @param style(string, optional, default : 'normal') : the style of the font file
     * @param variant(string, optional, default : 'normal') : the variant of the font file (normal / small-caps!)
     * @return string : a complete, cross-browser @font-face CSS declaration
     */
    protected function buildCompleteCSSDeclaration($output, $path_prefix, $weight = 'normal', $style = 'normal', $variant = 'normal') {
        $p = $path_prefix ? $path_prefix : '';
        $n = $output == 'indent' ? "\n" : '';
        return 
        $n . "@font-face {" . $n . 
                    "font-family: \"".str_replace('_', '-',$this->name)."\";" . $n .
                        "src: url('" . $p . substr($this->files["eot"]['pathName'], 0)."');" . $n .
                        "src: url('" . $p . substr($this->files["eot"]['pathName'], 0)."?#iefix') format('embedded-opentype')," . $n .
                             "url('" . $p . substr($this->files["woff"]['pathName'], 0)."') format('woff')," . $n .
                             "url('" . $p . substr($this->files["ttf"]['pathName'], 0)."') format('truetype')," . $n .
                             "url('" . $p . substr($this->files["svg"]['pathName'], 0).'#'.$this->name."') format('svg');" . $n .
                    "font-style: ". $style .";" . $n .
                    "font-weight: ". $weight .";" . $n .
                    "font-variant: ". $variant .";" . $n .
                "}";
    }
    /**
     * Protected function buildFallbackCSSDeclaration
     * Builds a simple CSS @font-face declaration that will work only in some browsers, depending on file formats available and sets the font as default for body inside a <script> block
     * @param $output can be indent or anything else actually. Indent inserts line breaks for a clean css file for development, 'blop' returns condensed data (for json encoding etc)
     * @param weight(string, optional, default : 'normal') : the weight of the font file
     * @param style(string, optional, default : 'normal') : the style of the font file
     * @param variant(string, optional, default : 'normal') : the variant of the font file (normal / small-caps!)
     * @return string : a style block with the @font-face declaration
     */
    protected function buildFallbackCSSDeclaration($output, $path_prefix, $weight = 'normal', $style = 'normal', $variant = 'normal') {
        $fallback_format = $this->getCSSFallbackFormat();
         $p = $path_prefix ? $path_prefix : '';
        $n = $output == 'indent' ? "\n" : '';
        return empty($fallback_format) ? '' : 
            $n . "@font-face { " . $n .
                        "font-family: \"".str_replace('_', '-',$this->name)."\";" . $n .
                        "src: url('". $p . substr($this->files[$fallback_format['extension']]['pathName'], 0)."') format('".$fallback_format['format']."');". $n .
                    "}";
    }
    /**
     * Protected function getCSSFallbackFormat
     * Checks for the availability of fallback formats - usually, if no font-face kit is present, there should be at least one .otf or one .ttf file
     * This method checks for the available format (with priority to .otf as it's an open standard) and returns the right information for the CSS Fallback @font-face
     * @return array : an array containing the file extension ['extension'] and format ['format'] strings to use inside the @font-face declaration
      */
    protected function getCSSFallbackFormat() {
        return (array_key_exists('otf', $this->files) ? array('extension' => 'otf', 'format' => 'opentype') : (array_key_exists('ttf', $this->files) ? array('extension' => 'ttf', 'format' => 'truetype')  : array()));
    }
    /**
     * Protected function getRandFormat
     * Used to know which key is available in order to use it to get the default path
     * @return string : a file extension key
      */
    protected function getRandFormat() {
        return array_key_exists('woff', $this->files) ? 'woff' : (array_key_exists('ttf', $this->files) ? 'ttf' : (array_key_exists('otf', $this->files) ? 'otf' : NULL));
    }
    /**
     * Public function getRandFormat
     * Used in the HTML to set a data-format dataset attribute to use when an option is selected
     * Can be of 3 types : "fontface", "otf", "ttf".
     * This format will define the CSS @font-face declaration that will be added by jQuery
     * @return string : a data-format value
      */
    public function getDatasetFormat() {
        $format = $this->getRandFormat();
        return $format == 'woff' ? 'fontface' : $format;
    }

    function offsetExists($var) 
    {
        return isset($this->$var);
    }
    function offsetGet($var) 
    {
        if(isset($this->$var))
            return $this->$var;
    }
    function offsetSet($var, $value) 
    {
        if(isset($this->$var))
            $this->$var = $value;
    }
    function offsetUnset($var) 
    {
        throw new \Exception( 'Cannot delete.' );
    }
}
