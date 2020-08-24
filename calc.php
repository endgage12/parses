<?php
    include_once "pageTemplate.php";

    $host = "127.0.0.1";
    $databaseName = "parse";
    $usr = "root";
    $password = "";
    
    //Подключение к базе
    $connect_db = new mysqli($host, $usr, $password, $databaseName);
    if($connect_db->connect_errno) {
        echo "Не удалось подключиться: " . $connect_db->connect_errno;
        exit;
    }

    //Занести данные в базу
    if(!$connect_db->query("INSERT INTO posts (content) VALUES ('texts')")) {
        echo "Ошибка при выполнении запроса: " . $connect_db->connect_errno;
        exit;
    }

    //Обновить (редактировать) данные c условием
    if(!$connect_db->query("UPDATE posts SET content = 'NewContent' WHERE id > 2")) {
        echo "Ошибка при выполнении запроса: " . $connect_db->connect_errno;
        exit;
    }

    //Вывести неповторяющиеся данные
    if($result = $connect_db->query("SELECT DISTINCT content FROM posts")) {
        while($row = $result->fetch_row()) {
            echo $row[0];
        }
    }
?>