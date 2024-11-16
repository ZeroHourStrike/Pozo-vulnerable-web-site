<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Comment Section</title>
</head>
<body>

<h1>Leave a Comment</h1>

<form action="submit_comment.php" method="POST">
    <label for="comment">Comment:</label><br>
    <textarea name="comment" id="comment" rows="4" cols="50" placeholder="Enter your comment"></textarea><br><br>
    <input type="submit" value="Submit">
</form>

<h2>Comments:</h2>

<div id="comments">
    <?php
    $comments_file = 'comments.txt';
    
    if (file_exists($comments_file)) {
        $comments = file_get_contents($comments_file);
        echo $comments;
    } else {
        echo "<p>No comments yet!</p>";
    }
    ?>
</div>

</body>
</html>
