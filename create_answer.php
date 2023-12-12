<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_id = $_POST['question_id'];
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "INSERT INTO answers (question_id, content) VALUES ('$question_id', '$content')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: question_detail.php?id=$question_id"); // 답변 작성 후 문의 상세 페이지로 리디렉션
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>