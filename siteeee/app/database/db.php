<?php

global $pdo;
if(!isset($_SESSION)){
    session_start();
}
require('connect.php');


function test($value){
    echo '<pre>';
    print_r($value);
    echo '<pre>';
    exit();
}
//Проверка выполнения запроса к БД
function dbCheckError($query){
    $ErrorInfo = $query->errorInfo();
    if($ErrorInfo[0] !== PDO::ERR_NONE){
        echo $ErrorInfo[2];
        exit();
    }
    return true;
}
//Запрос на получение данных одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

$params = [
    'admin' => 1,
    'username' => 'kate'
];

// Запись в таблицу
function insert($table,$params){
    global $pdo;
    $i = 0;
    $col = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if($i === 0){
            $col = $col . "$key";
            $mask = $mask ."'". "$value"."'";
        }else {
            $col = $col . ", $key";
            $mask = $mask .", '". "$value"."'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}


//Обновление строки в таблице
function update($table, $id, $params) {
    global $pdo;
    $columns = array_keys($params);
    $values = array_values($params);

    $setClause = implode(' = ?, ', $columns) . ' = ?';
    $sql = "UPDATE $table SET $setClause WHERE id = ?";

    $values[] = $id;

    $query = $pdo->prepare($sql);
    $query->execute($values);
    dbCheckError($query);
}


function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id = " .  $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

function selectBorrowedPostsByUserID($table1, $table2){
    global $pdo;

    $sql = "
    SELECT 
    $table1.id,
    $table1.title,
    $table1.image,
    $table1.content,
    $table1.status,
    $table1.id_topic,
    $table2.username
    FROM $table1 JOIN $table2 ON $table1.id_user = $table2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
