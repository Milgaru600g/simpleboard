<?php
$servername = "localhost";
$username = "test";
$password = "qwer1234!";
$dbname = "regist";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 체크
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>