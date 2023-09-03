<?php
include "config.php";
if (isset($_POST['add_wpm'])) {
    try {
        $user_id = $_POST['User_ID'];
        $wpm = $_POST['WPM'];
        $accuracy = $_POST['Accuracy'];
        $net_wpm = $_POST['Net_WPM'];
        $course_code = $_POST['Course_Code'];
        $sql = "INSERT INTO tbl_wpm(WPM,Accuracy,Net_WPM,Course_Code) values(:wpm,:accuracy,:net_wpm,:course_code)";
        $query = $connection->prepare($sql);
        $query->bindParam("wpm", $wpm, PDO::PARAM_STR);
        $query->bindParam("accuracy", $accuracy, PDO::PARAM_STR);
        $query->bindParam("net_wpm", $net_wpm, PDO::PARAM_STR);
        $query->bindParam("course_code", $course_code, PDO::PARAM_STR);
        $query->execute();
    } catch (Exception $ex) {
        $error = $ex;
    } finally {
        unset($connection);
        unset($query);
    }
}


if (isset($_POST['Insert'])) {
    echo ("hello");
    try {
        $data = $_POST['data'];
        $table = $_POST['table'];
        $notes = $_REQUEST['notes'];
        $data = json_decode($data);
        $notes = array();
        $columns = array();
        $columnsParam = array();
        $values  = array();

        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $columns[] = $key;
                $columnsParam[] = ":$key";
                $values[] = $value;
            }
        }
        $sql = 'INSERT INTO $table(" . implode(",", $columns) . ") values(" . implode(",", $columnsParam) . ")';

        $query = $connection->prepare($sql);
        for ($index = 0; $index < count($columnsParam); $index++) {
            $query->bindParam($columnsParam[$index], $values[$index], PDO::PARAM_STR);
        }
        $query->execute();
    } catch (Exception $ex) {
    } finally {
        unset($connection);
        unset($query);
    }
}

if (isset($_POST["Insert_CourseTaken"])) {
    try {
        $user_id = $_POST['User_ID'];
        $course_code = $_POST['Course_Code'];

        $sql = "INSERT INTO tbl_coursetaken(User_ID,Course_Code) values(:user_id,:course_code)";
        $query = $connection->prepare($sql);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $query->bindParam(":course_code", $course_code, PDO::PARAM_STR);
        $query->execute();
    } catch (Exception $ex) {
        echo $ex;
    } finally {
        unset($connection);
        unset($query);
    }
}




if (isset($_GET['SELECT'])) {
    $data = "";
    $query = $_GET["query"];
    $sql = $query;
    $pdo_query = $connection->prepare($sql);
    $pdo_query->execute();
    $results = $pdo_query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}
