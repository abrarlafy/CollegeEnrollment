<?php
$conn = mysqli_connect("localhost", "root", "", "ref_DB");

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";

$sql = "DROP DATABASE ref_DB" ; 

if (mysqli_query($conn, $sql))
{
echo "Database Droped successfully <br>" ;
} 


$sql = "CREATE DATABASE ref_DB" ;
if (mysqli_query($conn, $sql))
{
echo "Database created successfully <br>" ;
} 
else
{
echo "Error creating database: " . mysqli_error($conn);
}


if(mysqli_select_db($conn,"ref_DB"))
echo "<br>Database selected<br><br>";
else
echo"<br>Database not selected<br><br>";


$sql = "CREATE TABLE users (
	id int(11) Not null ,
	firstName varchar(50) Not null ,
	lastName varchar(50) Not null ,
	email varchar(50) Not null ,
	phone text Not null ,
	gender text Not null ,
	birth_date DATE NOT NULL,
	is_admin tinyint(1) default(0) Not null ,
	password varchar(50) Not null ,
	photo text 
  )";

if (mysqli_query($conn, $sql)){
	echo "table users created successfully <br>";
	}
	else {
		echo "Error Creating Table: ".mysqLI_error($conn);
		}

		$sql="
		ALTER TABLE users
		  ADD PRIMARY KEY (`id`)";
if (mysqli_query($conn, $sql)){
	echo " users ADD PRIMARY KEY  successfully <br>";
	}
	else {
		echo "Error adding Users: ".mysqLI_error($conn);
		}
		
		$sql="
		ALTER TABLE users  MODIFY id int(11) NOT NULL AUTO_INCREMENT";
if (mysqli_query($conn, $sql)){
	echo "AUTO_INCREMENT <br>";
	}
	else {
		echo "Error adding Users: ".mysqLI_error($conn);
		}

        $password = mysqli_real_escape_string($conn, md5('12345678'));

$sql = "INSERT INTO users ( firstName, lastName, email, phone, is_admin, password, photo) VALUES
( 'Taraf', 'Awad', 'taraf@gmail.com', '0578666673232',1 ,'{$password}','images/Coffee.jpg' ),
( 'MEZNAH', 'AL-SUBAIE', 'MEZNAH@gmail.com', '0578666673232',0 , '12345678','images/Coffee.jpg' ),
( 'Abrar', 'Lafy', 'abrar@gmail.com', '0578666673232',1,'{$password}','images/Coffee.jpg' )
";

if (mysqli_query($conn, $sql)){
	echo "<h1> users added successfully </h1><br>";
	}
	else {
		echo "Error adding Users: ".mysqLI_error($conn);
		}


mysqli_close($conn);
?>