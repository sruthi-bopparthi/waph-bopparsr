var shown=false;
function showOrHideEmail(){
			
			if(shown){
				document.getElementById('email').innerHTML="Show my email";
				shown=false;
			}else{
				var myemail="<a href='mailto:bopparsr"+"@"+"ucmail.uc.edu'>bopparsr"+"@"+"ucmail.uc.edu</a>";
				document.getElementById('email').innerHTML=myemail;
				shown=true;
			}
		}