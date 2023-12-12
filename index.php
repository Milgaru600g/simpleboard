<?php
include 'db.php';
include 'header.php';

// 글쓰기 버튼 추가
echo '<a href="create_question.php" class="button">글쓰기</a>';

// 기존의 게시글 목록 로직
$sql = "SELECT * FROM questions ORDER BY post_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div><a href='question_detail.php?id=" . $row["id"] . "'>" . $row["title"] . "</a></div>";
    }
} else {
    echo "No questions found.";
}

include 'footer.php';
?>