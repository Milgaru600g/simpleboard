<?php
include 'db.php';
include 'header.php';

$question_id = isset($_GET['id']) ? intval($_GET['id']) : die('Question ID not specified.');

// 질문 정보를 가져옵니다.
$sql_question = "SELECT * FROM questions WHERE id = $question_id";
$result_question = $conn->query($sql_question);

if ($result_question->num_rows > 0) {
    $row_question = $result_question->fetch_assoc();
    echo "<h2>" . $row_question["title"] . "</h2>";
    echo "<p>" . $row_question["content"] . "</p>";
} else {
    echo "Question not found.";
}

// 답변 목록을 가져옵니다.
$sql_answers = "SELECT * FROM answers WHERE question_id = $question_id";
$result_answers = $conn->query($sql_answers);

if ($result_answers->num_rows > 0) {
    while($row_answer = $result_answers->fetch_assoc()) {
        echo "<div><p>" . $row_answer["content"] . "</p></div>";
    }
} else {
    echo "<p>No answers yet.</p>";
}

// 답변 작성 폼
?>
<form action="create_answer.php" method="post">
    <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
    <textarea name="content" required></textarea>
    <input type="submit" value="답변 작성">
</form>

<a href="index.php" class="button">홈으로 돌아가기</a>

<?php
include 'footer.php';
?>