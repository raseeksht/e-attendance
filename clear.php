<?php
	if (isset($_POST['changeit'])){
		$year=$_POST['year'];
		$month=$_POST['month'];
		$day=$_POST['day'];
		$date=$year."/".$month."/".$day;
		$status=$_POST['status'];
		echo $date;
		echo "<br>".$status;
	}else{
		echo "ssuck";
	}
?>