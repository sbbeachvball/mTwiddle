<html><head><style>
hr { padding: 0; margin: 6px; margin-bottom: 30px; border: 1px solid black; }
br { display: block; line-height: 40px; }
body { font-family: helvetica, arial, sans-serif; font-size: 1.5em; padding: 30px; }
.family { width: 400px; }
td, th { 
   width: 70px; 
   font-size: 75%;
   border: 1px solid black;
}
tr {
   line-height: 23px;
   border: 2px solid black; 
}
table { 
   width: 100%;
   border: 2px solid black; 
   border-collapse: collapse;
}
h1 {
   font-size: 150%;
}

@media print {
   h1 {
       font-size: 120%;
   }
   body { 
       font-family: helvetica, arial, sans-serif; 
       font-size: 1em; 
       padding: 30px; 
   }
}
</style></head></body>
<?php  
   function headerLine($game){
       print "$game";
       print "<br>\n";
       print "<table>\n";
       print "<tr>";
       print "<th class=\"family\">Family</th>";
       print "<th># Adults</th>";
       print "<th># Kids</th>";
       print "<th>Cost @$3</th>";
       print "<th>Amt. Coll.</th>";
       print "</tr>";
       for($j=0;$j<11;$j++){
           print "<tr>";
           print "<td class=\"family\"></td>";
           print "<td>&nbsp;</td>";
           print "<td></td>";
           print "<td></td>";
           print "<td></td>";
           print "</tr>";
       }
       print "</table>\n";

   }
   print "<h1>UCSB Womens Volleyball Game Signup Sheet</h1>";
   print headerLine('Friday, October 16, 7PM - UCSB vs. UC Riverside');  
   print "<br>";
   print headerLine('Saturday, October 17, 7PM - UCSB vs. Cal State Fullerton');  
?>
</body></html>
