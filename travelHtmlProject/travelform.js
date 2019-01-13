
var xhr = createRequest();
function travelform(dataSource, divID, Aname, Alocation, Adestination, AselectP, Aoption){
	
	
	var params = {
		'custname': Aname,
		'location': Alocation,
        'to': Adestination,
        'selectpassengers': AselectP,
		'option': Aoption
		
	};
	
	console.log(params);
	
	if(xhr){
		var obj = document.getElementById(divID);
		var requestbody = "custName="+encodeURIComponent(Aname)+"&phone="+encodeURIComponent(Aphone)+"&address="+encodeURIComponent(Aaddress)+"&date="+encodeURIComponent(Adate)+"&time="+encodeURIComponent(Atime);
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		xhr.onreadystatechange = function(){
			
			if(xhr.readyState == 4 && xhr.status == 200){
				obj.innerHTML = xhr.responseText;
			}
			
		}
		
		xhr.send(requestbody);
	}
	
	
	
	

	
}