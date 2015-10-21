<!DOCTYPE html>
<html lang="en">
<head>
<style>
table {
    border: 2px solid blue;
    border-collapse: collapse;
}
td {
    border: 1px solid blue;
    font-weight: bold;
    font-size: 2em;
    font-family: helvetica, arial, sans-serif;
    width: 60px;
    text-align: center;
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
</head>
<body>

<?php
require_once('colorClassGen.php');
$choices = array('','r','','b','','y');
$ccg = new colorClassGen($choices,$choices);
$ccg->setPrefix("bg-");

///print $ccg->get(0,1 ) . "<br>\n";
///print $ccg->get(1,0 ) . "<br>\n";
///print $ccg->get(2,1 ) . "<br>\n";
///print $ccg->get(0,2 ) . "<br>\n";
///print $ccg->get(8,3 ) . "<br>\n";
///print $ccg->get(0,5 ) . "<br>\n";
///print $ccg->get(0,5 ) . "<br>\n";
///print $ccg->get(0,5 ) . "<br>\n";
///print $ccg->get(5,5 ) . "<br>\n";
///print $ccg->get(7,5 ) . "<br>\n";
///print $ccg->get(9,5 ) . "<br>\n";
///print $ccg->get(7,9 ) . "<br>\n";
///print $ccg->get(11,9) . "<br>\n";

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

</body>
</html>