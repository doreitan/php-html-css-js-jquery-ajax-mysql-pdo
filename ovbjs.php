<?php

//from post into variables

$txtfirstname=$_POST["txtfirstname"];
$txtfirstname=test_input($txtfirstname);
 
$txtlastname= $_POST["txtlastname"];
$txtlastname = test_input($txtlastname);

$age = $_POST['age'];
$age = test_input($age);

$txtemail=$_POST['txtemail'];
$txtemail = test_input($txtemail);

$txtphone =$_POST['txtphone'];
$txtphone = test_input($txtphone);

$nationality=$_POST['nationality'];
$nationality =  test_input($nationality);

$txturl = $_POST['txturl'];
$txturl =  test_input($txturl);

$txtcomments = $_POST['txtcomments'];
$txtcomments =  test_input($txtcomments);

$gender = $_POST['gender'];
$gender =  test_input($gender);

$var = isset($_POST['firsttime']);

if ($var == 1)
		{ 
			$firsttime = 1;
		}
if ($var == '')
	{ $firsttime = 0; }

//=======================PDO==============================
// connecting to sql database with PDO
 
	try 
		{   
			$connection = new PDO('mysql:host=localhost;dbname=ovbdbs','root','',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		} 
	catch (PDOException $e) 
		{
		print "Error!: " . $e->getMessage();
		die();
		} 
//---------------------------------------------------------------

//creating an insert query
$query = "INSERT into customers_tbl(FirstName, LastName ,Age ,Email ,Phone,";
$query = $query . "nationality, url, Comments, firsttime, gender)";
$query = $query . "values('$txtfirstname','$txtlastname',$age,'$txtemail',";
$query = $query . "'$txtphone','$nationality','$txturl','$txtcomments',";
$query = $query . "'$firsttime', '$gender')";

echo $query."<hr>";
//2. preparing the query
$query = $connection->prepare($query);
//------------------------------------------------
//3.binding
$query->bindparam(':firstname',$txtfirstname,PDO::PARAM_STR);
$query->bindparam(':lastname',$txtlastname,PDO::PARAM_STR);
$query->bindparam (':age',$age,PDO::PARAM_INT);
$query->bindparam (':email',$txtemail,PDO::PARAM_STR);
$query->bindparam (':phone',$txtphone,PDO::PARAM_STR);
$query->bindparam (':Nationality',$nationality,PDO::PARAM_STR);
$query->bindparam (':Url',$txturl,PDO::PARAM_STR);
$query->bindparam (':Comments',$txtcomments,PDO::PARAM_STR);
$query->bindparam (':firsttime',$firsttime,PDO::PARAM_STR);
$query->bindparam (':gender',$gender,PDO::PARAM_STR);
//--------------------------------------
//5.execution of the query
$query->execute();
//--------------------------------------------------------

//8. determining that the set of information will be back as an object
$results = $query -> fetchAll(PDO::FETCH_OBJ);
//--------------------------------------------------
//11.closing the database
//------------------------------------
$connection = null;

Header ("location: registerjs.php");
 
	

function test_input($data)
	{
		//get rid of unneccassary characters
			$data=trim($data);
		//remove unneccassary backslashes
			$data=stripslashes($data);
		//change the characters against hacking
			$data=htmlspecialchars($data);
		
		return $data;
		
	}
?>
