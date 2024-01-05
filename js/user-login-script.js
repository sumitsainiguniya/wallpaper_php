function validation()
{
	var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;
	if(email=="" || password=="")
	{
		
		if (email=="") 
		{
			document.getElementById("email").style.borderColor = "red";
		}
		else
		{
			document.getElementById("email").style.borderColor ="#80bdff";
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