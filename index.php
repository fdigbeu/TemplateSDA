<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="uploadfile.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="jquery.uploadfile.min.js"></script>
</head>
<body>

SDA : Chargez le fichier texte:
<div style="padding: 10px;">
<a id="resultat-tableau" target="_blank" href="resultat-tableau.php">TRANCHE SDA</a> - <a id="resultat-attendu" target="_blank" href="resultat-attendu.php">RESULTAT SDA</a>
</div>
<div id="mulitplefileuploader">Parcourir</div>

<div id="status"></div>
<script>
$(document).ready(function()
{
var settings = {
    url: "upload.php",
    dragDrop:true,
    fileName: "myfile",
    allowedTypes:"txt",
    returnType:"json",
	 onSuccess:function(files,data,xhr)
    {
       //alert((data));
    	//$("a#resultat-tableau").trigger("click");
    	//$("a#resultat-attendu").trigger("click");
    },
    showDelete:true,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++)
    {
        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {
            //Show Message  
            $("#status").append("<div>Fichier supprimé</div>");      
        });
     }      
    pd.statusbar.hide(); //You choice to hide/not.

}
}
var uploadObj = $("#mulitplefileuploader").uploadFile(settings);

});
</script>
</body>

