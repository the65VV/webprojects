var xhr = createRequest();

function booking(dataSource, divID, Aname, Aphone, Adestination, Adate, Atime, AunitNum, AstreetName, Asuburb){


    	var params = {
		'name': Aname,
		'phone': Aphone,
		'destination': Adestination,
		'date': Adate,
        'time': Atime,
        'unitNum': AunitNum,
        'streetNum': AstreetName,
        'suburb': Asuburb

    };
    	
	console.log(params);

    if(xhr){

        var obj = document.getElementById(divID);
        var requestbody = "customerName="+encodeURIComponent(Aname)+"&phone="+encodeURIComponent(Aphone)+"&destination="+encodeURIComponent(Adestination)+"&date="+encodeURIComponent(Adate)+"&time="+encodeURIComponent(Atime)+"&unitNum="+encodeURIComponent(AunitNum)+"&streetName="+encodeURIComponent(AstreetName)+"&suburb="+encodeURIComponent(Asuburb);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function(){

            if(xhr.readyState == 4 && xhr.status == 200){
                obj.innerHTML = xhr.responseText;
                
               //document.getElementById("confirm").innerHTML.xhr.responseText;
               //console.log(xhr.responseText);
            }
        }
        xhr.send(requestbody);



    }

}