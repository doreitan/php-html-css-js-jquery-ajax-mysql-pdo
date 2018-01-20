<?php

//first print on screen what the user has entered
echo "<h2> Thanks for joining us </h2>";
	
	
//-connecting to the database again------------------------------------------------------
 try {   
   $connection = new PDO('mysql:host=localhost;dbname=ovbdbs','root','',
   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  
   } 
   catch (PDOException $e) {
   print "Error!: " . $e->getMessage();
   die();
 } 

	
//creating select displayquery
$displayquery = "SELECT customerid, firstname, lastname, age, email, phone, nationality, url, comments, firsttime, gender FROM customers_TBL ";
echo $displayquery."<hr>";;
//-------------------------------------------------
//2. preparing the displayquery
$displayquery = $connection->prepare($displayquery);
//------------------------------------------------
//3.kshira
$displayquery->bindparam(':firstname',$txtfirstname,PDO::PARAM_STR);
$displayquery->bindparam(':lastname',$txtlastname,PDO::PARAM_STR);
$displayquery->bindparam (':age',$age,PDO::PARAM_INT);
$displayquery->bindparam (':txtemail',$txtemail,PDO::PARAM_INT);
$displayquery->bindparam (':txtphone',$txtphone,PDO::PARAM_INT);
$displayquery->bindparam (':Nationality',$Nationality,PDO::PARAM_INT);
$displayquery->bindparam (':txturl',$txturl,PDO::PARAM_INT);
$displayquery->bindparam (':txtcomments',$txtcomments,PDO::PARAM_INT);
$displayquery->bindparam (':firsttime',$firsttime,PDO::PARAM_INT);
$displayquery->bindparam (':gender',$genderfemale,PDO::PARAM_INT);


//-----------------------------------------------
//5.execution of the displayquery
$displayquery->execute();
//--------------------------------------------------------
//8. determining that the set of information will be back as an object
$resultsdisplay= $displayquery -> fetchAll(PDO::FETCH_OBJ);
//--------------------------------------------------


echo "<table border='8'>";

echo "<tr>"
					. "<th>"
					. " Id"
					. " </th>"
					
					. " <th>"
					. " First Name"
					. "</th>"
					
					. " <th>"
					. " Last Name"
					. "</th>"
					
					
					. " <th>"
					. " Age"
					. "</th>"
					
					. " <th>"
					. " Email"
					. "</th>"
					
					. " <th>"
					. " Phone"
					. "</th>"
					
					. " <th>"
					. " Nationality"
					. "</th>"
					
					. " <th>"
					. " Url"
					. "</th>"
					
					. " <th>"
					. " Comments"
					. "</th>"
					
					. " <th>"
					. " First time"
					. "</th>"
					
					. " <th>"
					. " Gender"
					. "</th>"
										
					. "</tr>";

foreach ($resultsdisplay as $resultshow )
		{
			echo "<tr>";
			echo "<td>" . $resultshow -> customerid . "</td>";	
			echo "<td>" . $resultshow -> firstname . "</td>";
			echo "<td>" . $resultshow -> lastname . "</td>";
			echo "<td>" . $resultshow -> age . "</td>";	
			echo "<td>" . $resultshow-> email . "</td>";	
			echo "<td>" . $resultshow -> phone. "</td>";	
			echo "<td>" . $resultshow -> nationality . "</td>";	
			echo "<td>" . $resultshow -> url . "</td>";	
			echo "<td>" . $resultshow -> comments . "</td>";	
			echo "<td>" . $resultshow -> firsttime . "</td>";	
			echo "<td>" . $resultshow -> gender . "</td>";	
					
			
			echo "</tr>";
				
		}

 "</table>";
		
//11.closing the database
//------------------------------------
$connection = null;
	
?>

