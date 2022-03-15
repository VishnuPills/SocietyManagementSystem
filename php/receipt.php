<?php
     session_start();
     $db = mysqli_connect('localhost', 'root', '', 'faida_estate');
   
	$update = false;
 
      if(isset($_POST['save'])) {
	    
		
		$month = $_POST['month'];
		$security = $_POST['security'];
		$garbage = $_POST['garbage'];
		$infrastructure = $_POST['infrastructure'];
		$total_inr = $_POST['total_inr'];
		$total_tax = $_POST['total_inr'];
		
		mysqli_query($db, "INSERT INTO statement (month, security, garbage, infrastructure, total_inr, total_tax) VALUES ('$month' ,'$security', '$garbage', '$infrastructure' , '$total_inr' , '$total_tax')"); 
	            echo '<script language="javascript">';
                echo 'alert("Your Statement has been Added!")';
                echo '</script>';
				echo "<script>location.href='../html/receipt.html';</script>";

	 
}

 ?>