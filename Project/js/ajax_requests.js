function loadXML(url,func){
	
	var httpRequest;
	if (window.XMLHttpRequest)
	{
		httpRequest=new XMLHttpRequest;
	}
	httpRequest.onreadystatechange(func);
	httpRequest.open('GET',url,true);
	httpRequest.send();
}

function register(){
	loadXML('register_form.php',function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
  		  {
   			 document.getElementById("myDiv").innerHTML=httpRequest.responseText;
   		  }	
	});
}
