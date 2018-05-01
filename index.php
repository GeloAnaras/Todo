<?php
define("PROJROOT","/");
define("URLROOT",$_SERVER["DOCUMENT_ROOT"].PROJROOT);

$request = explode("?",$_SERVER["REQUEST_URI"])[0];

function load_model($name){
    include URLROOT."model.php";
}

function load_view($name,$data=[]){
    include URLROOT."view.php";
}

function router($request){
    if($request === PROJROOT){
        include URLROOT."controller.php";
        call_user_func("action_get");
    }
    if( end(explode("/",trim($request,"/"))) === "add" || end(explode("/",trim($request,"/"))) === "del" ){
        include URLROOT."controller.php";
        call_user_func("action_".end(explode("/",trim($request,"/"))));
    }
    else{
        echo "404";
    }
}

router($request);