<pre>
<?php
	$title = mysql_real_escape_string($_POST['name']);
	$time = mysql_real_escape_string($_POST['anotherName']);
	$intro = mysql_real_escape_string($_POST['Intro']);
	if(!isset($_POST['submit'])) {
		echo "Thanks for the submission";
		die();
	}
	$bridge = mysqli_connect('localhost', 'root', '', 'tvshowtimes');
	if(!$bridge){
		echo "die";
		die();
	} else {
		echo "Working";
		$query = "INSERT INTO information (ID, start, introLen) VALUES ('$title', '$time', '$intro')";
		mysqli_query($bridge, $query);
		$result = mysqli_query("SELECT * FROM information");          //query
  	$array = mysqli_fetch_row($result);
		echo json_encode($array);
		mysqli_close($bridge);
	}
?>
<pre>
