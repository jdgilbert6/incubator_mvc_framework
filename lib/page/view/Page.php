<?php

class Page_View_Page extends Page_View_Abstract {

    protected $_template;
    protected $_title;
    protected $_header;
    protected $_content;
    protected $_footer;

    /**
     * Page view constructor
     *
     * If no template is specified, the default page template will be set.
     */
    public function __construct() {
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
            $path = TMP_PATH . DS . $pathArray[0] . DS . $pathArray[1] . DS . $pathArray[2] . '.phtml';
            if(file_exists(strtolower($path))) {
                $this->_template = $path;
            } else {
                throw new Exception('The specified template does not exist.');
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

    public function addForm($form = null) {

        if(array_key_exists($form, $this->_data)) {
            $formFile = $this->_data[$form];
            $formPath = TMP_PATH . DS . 'form' . DS . $formFile . '.phtml';
        } else {
            $formFile = $form . '.phtml';
            $formPath = stream_resolve_include_path(TMP_PATH . DS . 'form' . DS . $formFile);
        }
        include_once $formPath;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function setHeader() {
        $this->_header = TMP_PATH . DS . 'header.phtml';
    }

    public function getContent() {
        return $this->_content;
    }

//    public function setContent($content) {
//        $this->_content = $content;
//    }

    public function setFooter() {
        $this->_footer = TMP_PATH . DS . 'footer.phtml';
    }
}