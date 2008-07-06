<?php
require_once("config.php");
class LazyTemplateEngine {
  private $_scriptPath=TEMPLATE_PATH;//comes from config.php
  public function setScriptPath($scriptPath){
  $this->_scriptPath=$scriptPath;
  }
  public function render($filename){

    ob_start();
    if(file_exists($this->_scriptPath.$filename)){
      include($this->_scriptPath.$filename);
    } else throw new TemplateNotFoundException();
    return ob_get_clean();
  }
}
