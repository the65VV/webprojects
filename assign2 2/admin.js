
var xhr = createRequest();


//Function for Pick Up Request winthin 2 hours 
function getData(dataSource, divID){

	
	if(xhr){
		var obj = document.getElementById(divID)
		
		xhr.open("GET", dataSource, true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function(){
			
			if(xhr.readyState == 4 && xhr.status == 200){
				obj.innerHTML = xhr.responseText;
				console.log(xhr.responseText);
			}
			
		}
		
		xhr.send(null);
	}
}

//Function for Booking from unassigned to assigned

function getBooking(dataSource, AbookingNum){
	
	var getInput = document.getElementById('userInput').value;

	if(xhr){
		
		var requestbody = "bookingNumber="+encodeURIComponent(getInput);
		console.log(getInput);
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		xhr.onreadystatechange = function(){
			
			if(xhr.readyState == 4 && xhr.status == 200){
				var n = document.getElementById('confirmation');
				n.innerHTML = "";
				getData('admin.php','confirmation');
			}
			
		}
		
		xhr.send(requestbody);
	}
	
}
