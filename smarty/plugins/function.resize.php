<?php
include_once 'api/ImageApi.php';

function smarty_function_resize($params, Smarty_Internal_Template $template){
    $params['filename'];
    $img = ImageApi::getInstance();
    echo $img->resize($params['filename'],$params['width'],0);
}