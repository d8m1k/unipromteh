<?php
include_once 'api/ImageApi.php';

function smarty_function_imgslide($params, Smarty_Internal_Template $template){
    $params['filename'];
    $img = ImageApi::getInstance();
    echo '<li data-thumb="'.$img->resize($params['filename'],0,100).'" data-src="/img/'.$params['filename'].'"><img src="'.$img->resize($params['filename'],0,268).'" />';
}