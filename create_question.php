<?php
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    $sql = "INSERT INTO questions (title, content, author) VALUES ('$title', '$content', '$author')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // 성공 시 index.php로 리디렉션
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="create_question.php" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Content:</label>
    <textarea id="content" name="content" required></textarea>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>

    <input type="submit" value="Submit">
    <a href="index.php" class="button">Index로 돌아가기</a>
</form>

<?php
include 'footer.php';
?>