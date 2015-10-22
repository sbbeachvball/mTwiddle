<html><head><style>
table {
    border: 2px solid blue;
    border-collapse: collapse;
}
tr { 
    padding: 0; 
    margin: 6px; 
    margin-bottom: 16px; 
    border: 1px solid black; 
}
td {
    border: 1px solid blue;
    font-weight: bold;
    font-size: 2em;
    font-family: helvetica, arial, sans-serif;
    width: 60px;
    text-align: center;
    margin: 2px; 
}
.bg- {
    background-color: none;
}
.bg-r {
    background-color: #fac;
}
.bg-y {
    background-color: #ffa;
}
.bg-b {
    background-color: #bdf;
}
.bg-br {
    background-color: #faf;
}
.bg-by {
    background-color: #cfc;
}
.bg-ry {
    background-color: #fca;
}
</style>
</head></body>
<table>
<?php  

require_once('colorClassGen.php');
$choices = array('','r','','b','','y');
$ccg = new colorClassGen($choices,$choices);
$ccg->setPrefix("bg-");

print "<table>\n";
for($i=0; $i < 12; $i++){
    print "<tr>\n";
    for($j=0; $j < 12; $j++){
        print "  <td class=\"" . $ccg->get($i,$j) . "\">";
        print ($i+1) * ($j+1);
        print "</td>";
    }
    print "<tr>\n";
}
print "</table>\n";
?>
</table>
</body></html>
