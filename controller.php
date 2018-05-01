<?php

function action_get(){
    load_model("model");
    load_view("view", getAll());
}

function action_add(){
    load_model("model");
    addTask($_POST["text"]);
    load_view("view");
    header("Location:/");
}

function action_del(){
    load_model("model");
    $id = preg_replace("/[^,.0-9]/", '', $_SERVER['REQUEST_URI']);
    deleteTask($id);
    //var_dump(preg_replace("/[^,.0-9]/", '', $_SERVER['REQUEST_URI']));
    load_view("view");
    header("Location:/");
}