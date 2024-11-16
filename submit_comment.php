<?php
$comment = $_POST['comment'];

$comment_to_store = "<p>" . $comment . "</p>\n";

file_put_contents('comments.txt', $comment_to_store, FILE_APPEND);

header("Location: stored.php");
exit;
?>
