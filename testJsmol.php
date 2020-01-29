<html>
<head>
<script type="text/javascript" src="includes/jsmol/JSmol.min.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmoljQueryExt.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolCore.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolApplet.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolApi.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolControls.js"></script>
<script type="text/javascript" src="includes/jsmol/js/j2sjmol.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmol.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolConsole.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolMenu.js"></script>

<script>
Jmol._isAsync = false;

// last update 2/18/2014 2:10:06 PM

var jmolApplet0; // set up in HTML table, below

// logic is set by indicating order of USE -- default is HTML5 for this test page, though

var s = document.location.search;

// Developers: The _debugCode flag is checked in j2s/core/core.z.js, 
// and, if TRUE, skips loading the core methods, forcing those
// to be read from their individual directories. Set this
// true if you want to do some code debugging by inserting
// System.out.println, document.title, or alert commands
// anywhere in the Java or Jmol code.

Jmol._debugCode = (s.indexOf("debugcode") >= 0);

jmol_isReady = function(applet) {
	document.title = (applet._id + " - Jmol " + Jmol.___JmolVersion)
	Jmol._getElement(applet, "appletdiv").style.border="1px solid blue"
}		

var Info = {
	width: 600,
	height: 400,
	debug: false,
	color: "0xFFFFFF",
	addSelectionOptions: false,
	use: "HTML5",   // JAVA HTML5 WEBGL are all options
	j2sPath: "includes/jsmol/j2s", // this needs to point to where the j2s directory is.
	jarPath: "includes/jsmol/java",// this needs to point to where the java directory is.
	jarFile: "JmolAppletSigned.jar",
	isSigned: true,
	script: "set zoomlarge false;set antialiasDisplay;load includes/waterCoordinates/water-7-CA1.xyz; calculate hbonds",
	serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/php/jsmol.php",
	readyFunction: jmol_isReady,
	disableJ2SLoadMonitor: true,
  disableInitialConsole: true,
  allowJavaScript: true
	//defaultModel: "$dopamine",
	//console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
}

$(document).ready(function() {
  $("#appdiv").html(Jmol.getAppletHtml("jmolApplet0", Info))
})
var lastPrompt=0;
</script>
</head>
<body>
<div id="appdiv"></div>


</body>
