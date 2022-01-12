
function checking() {
		var upper = false;
		var num = false;
		var spc = false;
		var len=false;
		var pass = document.getElementById('pass').value;
		for (var i = 0; i < pass.length; i++) {
			var check = pass.charCodeAt(i);
			if(check > 47 && check < 58)
				num = true;
				
			if(check > 64 && check < 91)
				upper = true;
				
			if(check == 33 || check == 36 || check == 37 || check == 38 || check == 42 || check == 64)
				spc  = true;
				
		}


		if(pass.length > 7 && pass.length < 21)
		{	
			len = true;
			document.getElementById('1st').style.color="green";
		}
		else{
			document.getElementById('1st').style.color="red";
		}

		if(num == true)
		{	
			document.getElementById('4th').style.color="green";
		}
		else{
			document.getElementById('4th').style.color="red";
		}
		if(upper == true)
		{	
			document.getElementById('2nd').style.color="green";
		}
		else{
			document.getElementById('2nd').style.color="red";
		}

		if(spc == true)
		{	
			document.getElementById('3rd').style.color="green";
		}
		else{
			document.getElementById('3rd').style.color="red";
		}


		if (len == true && num == true && upper == true && spc == true) {
			document.getElementById('check').type="submit";
		}
	}

	 function check() {

    var centre=document.getElementById('centre').value;
    var time=document.getElementById('time').value;
    if(centre=="" || centre=="--select vaccine centre--" || time=="" || time=="--select time--"){
    document.getElementById('alert').innerHTML="Fields must be fill out properly";

    }
    else{
      document.getElementById('btn').type="submit";
    }
  }
