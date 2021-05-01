<?php

$host = 'localhost';

$username = 'phpmyadmin';

$password = 'some_pass';

$database = 'forum';

$database_connection = mysqli_connect($host, $username, $password, $database);


$id = $_GET['id'];

$sql = "SELECT * FROM `question` WHERE id='$id'";

$question_query = mysqli_query($database_connection, $sql);

$question_data = mysqli_fetch_assoc($question_query);

$question = $question_data['question'];
$answer = $question_data['answer'];

echo "
<form method='POST'>
<div class='single-question'>
		<b>$question</b>
		<br/><br/>
		<textarea name='answer' cols='100' rows='4'>$answer</textarea>
		<br/><br/>
	</div>
	<input type='submit'  value='Update answer'/>
	</form>
";


// isset and ! empty check to see if variable is not empty and is set.

if ( isset($_POST['answer'] ) && !empty($_POST['answer'])) {

	$answer = $_POST['answer'];

	// This query will add the question to the mysql database, note that we are substituting
	// the $query variable in the below query.
	$query = "UPDATE `question` SET answer='$answer' WHERE id='$id'";

	mysqli_query($database_connection, $query);

	echo "Answer successfully updated";


}

?>