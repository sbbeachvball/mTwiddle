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

<?php
$bcolors = array( 
    ''   => 'none',
    'r'  => '#f00',
    'y'  => '#ff0',
    'b'  => '#46f',
    'br' => '#c0f',
    'by' => '#0f0',
    'ry' => '#f60',
    );
$lcolors = array(
    ''   => 'none',
    'r'  => '#fac',
    'y'  => '#ffa',
    'b'  => '#bdf',
    'br' => '#caf',
    'by' => '#cfc',
    'ry' => '#fca',
    );

foreach( $lcolors as $k => $v){
    print ".bg-" . $k . "{\n";
    print "    background-color: $v;\n";
    print "}\n";
}
///.bg- {
///    background-color: none;
///}
///.bg-r {
///    /*
///    background-color: #fac;
///    background-color: #ffa;
///    background-color: #bdf;
///    background-color: #caf;
///    background-color: #cfc;
///    background-color: #fca;
///    */
///    background-color: #f00;
///}
///.bg-y {
///    background-color: #ff0;
///}
///.bg-b {
///    background-color: #46f;
///}
///.bg-br {
///    background-color: #c0f;
///}
///.bg-by {
///    background-color: #0f0;
///}
///.bg-ry {
///    background-color: #f60;
///}
?>
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
