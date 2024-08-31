<?php
session_start();

if (isset($_POST['meeting_key'])) {
	$_SESSION['meeting_key'] = $_POST['meeting_key'];
	echo 'Session updated';
} else {
	echo 'No meeting key provided';
}
?>