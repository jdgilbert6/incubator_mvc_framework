<?php

class Page_View_Page extends Page_View_Abstract {

    const ASSET_DIRECTORY = 'asset';

    protected $_template;
    protected $_data = array();

    /**
     * Page view constructor
     *
     * If no template is specified, the default page template will be set.
     */
    public function __construct() {
//        $this->setTemplate('page/default');
    }

    /**
     * Template getter
     *
     * Value of $_template will be returned
     */
    public function getTemplate() {
        return $this->_template;
    }

    /**
     * Template setter
     *
     * Variable $template is passed in as 'directory/file'.
     * File path is defined and returned if it exists.
     * Exception template is displayed if file path does not exist.
     */
    public function setTemplate($template) {

        if(!empty($template)) {
            $pathArray = explode('/', $template);
            $path = TMP_PATH . DS . $pathArray[0] . DS . $pathArray[1] . '.phtml';
            if(file_exists(strtolower($path))) {
                $this->_template = $path;
            } else {
                $this->_template = TMP_PATH . DS . 'page' . DS . 'error.phtml';
            }
        }
    }

    public function setChildTemplate($template, $file = null) {

        if(!empty($template) && $file != null) {
            $this->_data[$template] = $file;
        }
    }

    /**
     * Template renderer
     *
     *  If it exists, the value of $_template is included and displayed.
     */
    public function renderTemplate(){

        if(file_exists(strtolower($this->getTemplate()))) {
            include_once $this->getTemplate();
        }
    }

    /**
     * Add block template
     *
     * Variable $block is passed in as 'directory/file'.
     * If the file path can be resolved, it is included once.
     */
    public function addBlock($block = null) {

        if(array_key_exists($block, $this->_data)) {
            $blockFile = $this->_data[$block];
            $blockPath = TMP_PATH . DS . 'block' . DS . $blockFile . '.phtml';
        } else {
            $blockFile = $block . '.phtml';
            $blockPath = stream_resolve_include_path(TMP_PATH . DS . 'block' . DS . $blockFile);
        }
        include_once $blockPath;
    }

    /**
     * Add css, image, or js asset
     *
     * Variable $asset is passed in as 'directory/file'.
     * Type of asset and file name are determined.
     * An asset url is established and returned.
     */
    public function addAsset($asset) {

        $assetArray = explode('/', $asset);
        $type = array_shift($assetArray);
        $assetFile = strtolower(array_pop($assetArray));
        $assetPath = ASS_PATH . DS . $type . DS . $assetFile;
        return $assetPath;
    }
}