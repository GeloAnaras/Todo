<?php
function getConnection(){
    static $connection = NULL;
    if ($connection == NULL){
        $connection = new PDO("mysql:dbname=todo_app;host=127.0.0.1;charset=utf8",
            "root",
            "",
            [
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
            ]
        );
    }
    return $connection;
}

function getAll(){
    $dbh = getConnection();
    $stmt = $dbh->query("SELECT * FROM Todo");
    return $stmt->fetchAll();
}

function addTask ($name){
    $dbh = getConnection();
    $stmt = $dbh->prepare("INSERT INTO Todo(`text`) VALUES (:name)");
    $stmt->execute([
        "name"=>$name
    ]);
}

function deleteTask ($id){
    $dbh = getConnection();
    $stmt = $dbh->prepare("DELETE FROM Todo WHERE id=?");
    $stmt->execute([(int)$id]);
}