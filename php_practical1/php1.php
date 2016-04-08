<?php 
	$name = $_POST['firstname'] . " " . $_POST['middlename'] . " " . $_POST['lastname'];
	$gender = $_POST['gender'];
	$dob =  date("d-m-Y", strtotime($_POST['date_of_birth']));
	$contact1 = $_POST['contact_number_1'];
	$contact2 = $_POST['contact_number_2'];
	$email = $_POST['email_address'];
	$enrollment_number = $_POST['enrollment_number'];
	$college = $_POST['college_name'];
	$sem = $_POST['semesters'];
	$field = $_POST['field'];
	$address = $_POST['address_student'];
	$need_hostel = $_POST['hostel'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP form output!</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	
	<table class = "table table-striped table-bordered table-hover table-responsive">
   		<thead>
      		<tr>
         		<th>Field</th>
         		<th>Your Response</th>
      		</tr>
   		</thead>
   
   		<tbody>
   			<tr>
   				<td>Name</td>
   				<td><?php echo $name; ?></td>
   			</tr>


   			<tr>
   				<td>Gender</td>
   				<td><?php echo $gender;?></td>
   			</tr>

   			<tr>
   				<td>Date of birth</td>
   				<td><?php echo $dob;?></td>
   			</tr>

   			<tr>
   				<td>Contact 1</td>
   				<td><?php echo $contact1;?></td>
   			</tr>

   			<tr>
   				<td>Contact 2</td>
   				<td><?php echo ($contact2.length == 0 )? "Not Specified" : $contact2;?></td>
   			</tr>

   			<tr>
   				<td>Email</td>
   				<td><?php echo $email;?></td>
   			</tr>


   			<tr>
   				<td>Enrollment Number</td>
   				<td><?php echo $enrollment_number;?></td>
   			</tr>

   			<tr>
   				<td>College</td>
   				<td><?php echo $college;?></td>
   			</tr>

   			<tr>
   				<td>Semester</td>
   				<td><?php echo $sem;?></td>
   			</tr>

   			<tr>
   				<td>Field</td>
   				<td><?php echo $field;?></td>
   			</tr>

   			<tr>
   				<td>Address</td>
   				<td><?php echo $address;?></td>
   			</tr>

   			<tr>
   				<td>Need Hostel?</td>
   				<td><?php echo $need_hostel;?></td>
   			</tr>
   		</tbody>
	</table>

</div>

</body>
</html>