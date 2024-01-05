function validation()
{
	var fname=document.getElementById('first_name').value;
	var lname=document.getElementById('last_name').value;
	var email=document.getElementById('email').value;
	var phone=document.getElementById('phone_number').value;
	var password=document.getElementById('password').value;

	if(fname==""  || lname=="" || email=="" || phone=="" || password=="")
	{
		if (fname=="") 
		{
			document.getElementById("first_name").style.borderColor = "red";
		}
		else
		{
			document.getElementById("first_name").style.borderColor ="#80bdff";
		}
		if (lname=="") 
		{	
			document.getElementById("last_name").style.borderColor = "red";
		}
		else
		{
			document.getElementById("last_name").style.borderColor ="#80bdff";
		}
		if (email=="") 
		{
			document.getElementById("email").style.borderColor = "red";
		}
		else
		{
			document.getElementById("email").style.borderColor ="#80bdff";
		}
		if (phone=="") 
		{
			document.getElementById("phone_number").style.borderColor = "red";
		}
		else
		{
			document.getElementById("phone_number").style.borderColor ="#80bdff";
		}
		if (password=="") 
		{
			document.getElementById("password").style.borderColor = "red";
		}
		else
		{
			document.getElementById("password").style.borderColor ="#80bdff";
		}
		
		return false;
	}
	else
	{
		return true;
	}
}