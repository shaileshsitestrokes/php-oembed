<?
require_once("config.php");
$url = $_REQUEST['url'];
$manager = ProviderManager::getInstance();
try{
    $myObj= $manager->provide($url,"object");
    $body = new LazyTemplateEngine();
    $body->content=$myObj->renderClass();
    echo $body->render("Main.template.php");
 } catch (Exception $e){
    header("HTTP/1.0 404 Not Found");
}
