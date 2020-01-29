$(document).ready(function(){
	$(".paperButton").click(function(event){
		event.preventDefault();
		console.log("Button Clicked");
	});

	

	$(".anchor").click(function(event){
		event.preventDefault();
	});
});

function getTags(str){
	$(".molViewer").addClass("hidden");
	if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
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

        xmlhttp.open("POST", "tags.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("tags="+str);
    }
}