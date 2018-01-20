
<?php
//echo 'Hello ' . htmlspecialchars($_GET["s"]) . ' !';
$temp = $_GET["s"];
//echo $temp;

// this is how you connect to an sql database with PDO

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

$qryHowManyEmails = "SELECT customerID FROM customers_tbl where email ='$temp'";
//---------------------------------------------------------------
//2. preparing the $qryHowManyEmails
$qryHowManyEmails = $connection->prepare($qryHowManyEmails);
//---------------------------------------------------------------
//5.execution of the $qryHowManyEmails
$qryHowManyEmails->execute();
//--------------------------------------------------------
//8. determining that the set of information will be back as an object
$resultsquery = $qryHowManyEmails -> fetchAll(PDO::FETCH_OBJ);
//--------------------------------------------------
$connection = null;			

//echo count($resultsquery);

if (count($resultsquery)> 0) 
		{ echo 1; }




else { echo 0; }




?>