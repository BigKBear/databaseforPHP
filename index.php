<?php
// A simple website in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console


//include 'db_connection.php';
include 'db_class.php';
?>

<div class="text-center">
	<a href="formView.php">Add Learnt Skill</a>
</div>

<?php 
	$allSkills = getLerntDetails($conn);
	if ($allSkills) {
		foreach($allSkills->fetchAll() as $skills => $skill) {
			echo '<p value="'.$skill['screenname'].'">'.$skill['screenname'].'</p>';
			echo '<p value="'.$skill['learned'].'">'.$skill['learned'].'</p>';
		}
	}
?>

<div class="text-center">
	<a href="formView.php">Add Learnt Skill</a>
</div>

<!--

<?php
// A simple website in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console


//include 'db_connection.php';
include 'database.php';
?>

<div class="text-center">
	<a href="formView.php">Add Learnt Skill</a>
</div>

<?php 
	$db = new Database();
	var_dump($db);
	$skills = $db->qry('SELECT * FROM skills');
	echo '<h3> Below shows todays top learned skills added</h3>';
	//$allSkills = getLerntDetails($conn);
	/*if ($skills) {
		foreach($allSkills->fetchAll() as $skills => $skill) {
			echo '<p value="'.$skill['display_name'].'">'.$skill['display_name'].'</p>';
		}
	}*/
?>

-->