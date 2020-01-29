

//document.getElementById("setName").addEventListener("change", myFunction);

// function myFunction() {
//     var x = document.getElementById("setName");
//     x.value = x.value.toUpperCase();
// }


$(document).ready(function(){
	$("#setName").change(function(){
	var val=$("#setName").val();
	console.log(val);
	var xmlhttp;
        if (window.XMLHttpRequest) {
    		xmlhttp = new XMLHttpRequest();
    	} 
    	else {
    // code for IE6, IE5
   		 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}	
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };


        xmlhttp.open("POST", "includes/php/setName.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("testName="+val);
	
	});


	
	
	
});



function emptyVal() {
	
	console.log("Change");
}