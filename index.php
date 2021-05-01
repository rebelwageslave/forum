<title>Welcome to my forum | Add your question</title>
<link rel="stylesheet" type="text/css" href="style.css">
<nav>
	<div>My Forum</div>
</nav>
<br/><br/>





<div class="wrapper">

<form method="POST">
	<input type="text" placeholder="Enter your question here" name="question">
	<input type="submit" value="Create question">
</form>


<h3>Questions</h3>

<?php

$host = 'localhost';

$username = 'phpmyadmin';

$password = 'some_pass';

$database = 'forum';

$database_connection = mysqli_connect($host, $username, $password, $database);


// isset and ! empty check to see if variable is not empty and is set.

if ( isset($_POST['question'] ) && !empty($_POST['question'])) {

	$question = $_POST['question'];

	// This query will add the question to the mysql database, note that we are substituting
	// the $query variable in the below query.
	$query = "INSERT INTO `question` (`id`, `question`, `answer`) VALUES (NULL, '$question', '') ";

	mysqli_query($database_connection, $query);

	header("Location: index.php");

}

$questions_query = "SELECT * FROM `question`";
$questions_result = mysqli_query($database_connection, $questions_query);

while ( $question_data = mysqli_fetch_assoc($questions_result) ) {
	$question = $question_data['question'];
	$answer = $question_data['answer'];
		$id = $question_data['id'];

	echo "<div class='single-question'>
		<b><a href='question.php?id=$id'>$question</a></b>
		<p>$answer</p>
	</div>";
}
?>
</div>