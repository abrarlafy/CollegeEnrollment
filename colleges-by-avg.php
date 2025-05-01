<?php

$conn = mysqli_connect("localhost", "root", "", "ref_DB");

$title = 'Colleges';
include 'header.php';

if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
	echo "<div class='container mt-3 '>
	<div class='alert alert-danger'>$msg</div>
	</div>";
}
if (isset($_GET['msgg'])) {
	$msgg = $_GET['msgg'];
	echo "<div class='container mt-3 '>
	<div class='alert alert-success'>$msgg</div>
	</div>";
}

$allColleges = [
	["id" => 1, "name" => "College of Computer Science", "avg" => 90, "uni_id" => 1, "UniversityName" => "Majmaah University"],
	["id" => 1, "name" => "College of Engineering", "avg" => 90, "uni_id" => 1, "UniversityName" => "King Saud University"],
	["id" => 2, "name" => "College of Medicine", "avg" => 95, "uni_id" => 1, "UniversityName" => "King Saud University"],
	["id" => 3, "name" => "College of Computer Science", "avg" => 85, "uni_id" => 2, "UniversityName" => "King Abdulaziz University"],
	["id" => 4, "name" => "College of Business", "avg" => 80, "uni_id" => 2, "UniversityName" => "King Abdulaziz University"],
	["id" => 5, "name" => "College of Arts", "avg" => 75, "uni_id" => 3, "UniversityName" => "Imam University"]
];

if (isset($_GET['avg'])) {
	$avg = $_GET['avg'];

	
	$colleges = array_filter($allColleges, fn($college) => $college['avg'] <= $avg);

	
	usort($colleges, fn($a, $b) => $b['avg'] <=> $a['avg']);

	$index = 1;
	echo '
 <div class="row container ">
 <div class="col-5 my-5 p-5 text-center">
                <h4 style="color: #261f4c ; font-style:italic;" class="display-4">College Enrollment</h4>
             <p style="font-size: 18px;color: #261f4c ; font-style:italic;">
             Your Average is ' . $avg . '
                There are all 
                <span style="font-size: 32px;color: #261f4c;font-weight:bold; font-style:italic;">Colleges </span>
                 of all Universities in Kingdom That allow you to apply in :
             </p>
    </div>

    <div class="col-7 my-5 p-5 text-center  rounded shadow">
    <span style="font-size: 32px;color: #261f4c;font-weight:bold; font-style:italic;">Colleges </span>
 <table class="table table-striped">
 <thead>
   <tr>
     <th scope="col">#NO</th>
     <th scope="col">University</th>
     <th scope="col">Name</th>
     <th scope="col">Average</th>';

	if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
		echo '<th scope="col">Action</th>';
	}

	echo '</tr>
 </thead>
 <tbody>';

	foreach ($colleges as $college) {
		echo '<tr>
        <th scope="row">' . $index++ . '</th>
        <td>' . $college['UniversityName'] . '</td>
        <td>' . $college['name'] . '</td>
        <td>' . $college['avg'] . '</td>';

		if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
			echo '<td>
        <a class="btn btn-outline-danger" href="delete-college.php?uniID=' . $college['uni_id'] . '&col_id=' . $college['id'] . '">Delete</a>
        <a class="btn btn-outline-info" href="update-college.php?uniID=' . $college['uni_id'] . '&col_id=' . $college['id'] . '">Update</a>
        </td>';
		}

		echo '</tr>';
	}

	echo '</tbody>
    </table>
    </div>
    </div>';
}

include 'footer.php';
?>
