<?php

class Page_View_Page extends Page_View_Abstract {

    protected $_template;
        
    public function __construct() {
        $this->setTemplate('page/default');
    }

    public function getTemplate() {
        return $this->_template;
    }

    public function setTemplate($template = null) {
        if(!empty($template)) {
            $pathArray = explode('/', $template);
            $path = TMP_PATH . DS . $pathArray[0] . DS . $pathArray[1] . '.phtml';
            if(file_exists(strtolower($path))) {
                $this->_template = $path;
            } else {
                $this->_template = TMP_PATH . DS . 'page' . DS . 'default.phtml';
            }
        }
    }

    public function renderTemplate(){
        if(file_exists(strtolower($this->getTemplate()))) {
            include_once $this->getTemplate();
        }
    }

    public function addBlock($block = null) {

        $blockArray = explode('/', $block);
        $module = array_shift($blockArray);
        $blockFile = strtolower(array_pop($blockArray)) . '.phtml';

        $blockPath = stream_resolve_include_path($module . DS . 'view' . DS . 'block' . DS . $blockFile);

        if($blockPath) {
            include_once $blockPath;
        }
    }

    public function addAsset($asset) {

        $assetArray = explode('/', $asset);
        $type = array_shift($assetArray);
        $assetFile = strtolower(array_pop($assetArray));

        switch($type) {

            case 'css':
                $cssPath = BASE_URL . '/assets' . DS . $type . DS . $assetFile . '.css';
                    echo "<link href='$cssPath' rel='stylesheet' />";
                break;

            case 'images':
                $imagePath = ASS_PATH . DS . $type . DS . $assetFile;
                    echo "<img src='$imagePath'/>";
                break;

            case 'js':
                $jsPath = ASS_PATH . DS . $type . DS . $assetFile . '.js';
                if(file_exists($jsPath)) {
                    echo "<script src='$jsPath' type='text/javascript'></script>";
                }
                break;
        }
    }
}