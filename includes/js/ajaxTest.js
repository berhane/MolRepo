
$(document).ready(function(){
	$(".anchor").click(function(event){
		event.preventDefault();
	});
	$(".paperButton").click(function(event){
		event.preventDefault();
	});
});


function getStructure(str,filename,dataID,setName) {
	$(".molViewer").removeClass("hidden");
	$(".tags").addClass("hidden");
	$(".mainviewer").addClass("normal");
	$(".mainviewer").removeClass("mainviewer");
	var name=filename+".xyz";
	console.log(name);
	var Info = {
    width: 600,
    height: 430,
    debug: false,
    color: "0xFFFFFF",
    addSelectionOptions: false,
    use: "HTML5",   // JAVA HTML5 WEBGL are all options
    j2sPath: "includes/jsmol/j2s", // this needs to point to where the j2s directory is.
    jarPath: "includes/jsmol/java",// this needs to point to where the java directory is.
    jarFile: "JmolAppletSigned.jar",
    isSigned: true,
    script: "set zoomlarge false;set antialiasDisplay;load Coordinates/"+setName+"/"+name+";calculate hbonds",
    serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/php/jsmol.php",
    readyFunction: jmol_isReady,
    disableJ2SLoadMonitor: true,
  disableInitialConsole: true,
  allowJavaScript: true
    //defaultModel: "$dopamine",
    //console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
}

	$("#appdiv").html(Jmol.getAppletHtml("jmolApplet0", Info))
	
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "getStruc.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("name="+str+"&filename="+filename+"&dataID="+dataID);
    }
}
