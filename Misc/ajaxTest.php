<html>
<head>
<script type="text/javascript" src="includes/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/js/ajaxTest.js"></script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form> 
First name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="ttHint"></span></p>
<div id="txtHint">
</div>
</body>
</html>

 <script src="http://3Dmol.csb.pitt.edu/build/3Dmol-min.js"></script> </head>    
         <div style="height: 400px; width: 400px; position: relative;" class='viewer_3Dmoljs' data-pdb='2POR' data-backgroundcolor='0xffffff' data-style='stick'></div>