<?php

class Page_View_Page extends Page_View_Abstract {

    protected $_template;

    /**
     * Page view constructor
     *
     * If no template is specified, the default page template will be set.
     */
    public function __construct() {
        $this->setTemplate('page/default');
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
    public function setTemplate($block, $template = null) {

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

        $blockFile = $block . '.phtml';

        $blockPath = stream_resolve_include_path(TMP_PATH. DS . 'block' . DS . $blockFile);

        if($blockPath) {
            include_once $blockPath;
        }
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

        switch($type) {

            case 'css':
                $cssUrl = BASE_URL . '/asset' . DS . $type . DS . $assetFile . '.css';
                return $cssUrl;
                break;

            case 'image':
                $imageUrl = BASE_URL . '/asset' . DS . $type . DS . $assetFile;
                return $imageUrl;
                break;

            case 'js':
                $jsUrl = BASE_URL . '/asset' . DS . $type . DS . $assetFile . '.js';
                return $jsUrl;
                break;
        }
    }
}