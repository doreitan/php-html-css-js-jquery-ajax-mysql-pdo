		
		//  javascript validating that user has entered something in the fields
		
		/*
		
		avascript/Jquery
		Even before sending the form a check is being preformed on ovb.js to see weather all necessary fields are fully given.
		Firstname,lastname, Phone, Email
	
	2.1 The Javascript code:
		The return_validate_data Function checks to see if the above fields are not empty
		The form is invisible until these fields are correctly filled 
	2.2 function radio_select on Javascript - (Male /Female ) checks to see what has been selected)
   
	
	3. Jquery Code

	3.1 All Fields will change Color when in focus.Jquery + Ajax + php + Sql (PDO)
	3.2 All Fields will change Color when losing Focus
	3.3 Email Field - after the User has entered his Email
	3.3.1 Email loses Focus = Blur
	3.3.2 The Email address that the user gave is being sent to Emailcheck.php (PDO)($.get('Emailcheck.php')
	to see if this Emails exists on database (Ajax+MySql) 
		  if the Email is found - (if data==0) this means that there aren't any other Emails like this in our database
		  and the program could go on. however if (data>0) it means that there is at least one email address (or more) similar to 
		  what the user has given. therefore: A message to the user to give a different Email will be display
		  on the div section of the HTML. the email field will still remain in Focus until the user changes it, The send button 
          will also won't be allowed, and a Red color will circle the Text Box (Firefox).
		  */
		
		
		
		
		
		
		
		
		
			function validate_data()
			{
				
					var firstname = document.getElementById("firstname").value;
					if (document.my_Form.firstname.value=="")
					{	
						alert ("First Name is Required");
						document.my_Form.firstname.focus();
						 return false;
					}
					
					var lastname = document.getElementById("lastname").value;
					if (document.my_Form.lastname.value=="")
					{	
						alert ("Last Name is Required");
						document.my_Form.lastname.focus();
						return false;
					}
					
					var email = document.getElementById("email").value;
					if (document.my_Form.email.value=="")
					{	
						alert ("Email is Required");
						document.my_Form.email.focus();
						return false;
					}
					
					var phone = document.getElementById("phone").value;
					if (document.my_Form.phone.value=="")
					{	
						alert ("Phone is Required");
						document.my_Form.phone.focus();
						return false;
					}
					
					
					
			          return true;		
			}
								
					 
		//-----javascript radio buttons Male of Female--------------------------------------------	
			
			function radio_select(radio_buttons)
						{
							for (var i=0; i<radio_buttons.length; i++) 
								if (radio_buttons[i].checked) 
									{
										return radio_buttons[i].value;
									
									}
													
						}
       					
		// jquery Text boxes color changes when in focus
		var sendingok=false;
			$(document).ready(function(){
				///1.all text boxes when receiving focus//////////////////////////
				$ ('input').focus(function(){
					$(this).css("background-color", "#cccccc");
				});
				///2.text boxes color changes when losing focus///////////////////////
				$('input').blur(function(){
					$(this).css("background-color", "#ffffff");
				});
				///3. after typing the email address the event - email box loses its focus				
				$('#email').blur(function(){
				//4. move typed email to a variable
					var TempEmail = $('#email').val();
					
					/////if the email is not empty after cleanning it from unnecessary backspaces//////////
									if ($.trim(TempEmail)!='')
										{
											//4. move the s.tempmail to php/sql/query and the results put in data
											$.get('Emailcheck.php',{ s: TempEmail},function(data){
												//5.display the received data from php on the div
												$('div#display-results').text(data);
									
											
											if (data==0) 
											{	
												sendingok=true;
												$('#name-submit').show();
												data = "Hello"&& firstname;
												$('div#display-results').text(data);
												
											}	
												else sendingok=false;
											
											if(sendingok== false)
											{
												$('#email').focus();
												$('#email').css("background-color", "#dbbcc2");
												$('#name-submit').hide();
												data = "Your Email Already existst please give another";
												$('div#display-results').text(data);
											}
																							
											}); //closing the $get
										
									}	//closing for function
									
																							
				});//closing email blur
				
				console.log(data);
				
				
				
		});		
					
					
					
					
	//----------------------------------------------			
	
				
			
			
			
			
			
			
			
			
	