<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 2px solid black;
    padding: 3px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php echo "Today is " . date("d/m/Y/l") . "<br>"; ?>
<br>

<?php
if($_GET['submit']=='ok'){
include('config.php');
$q = intval($_GET['q']);
$d=date('j');
$sql="SELECT * FROM students WHERE sid= '".$q."'";
$result = mysql_query($sql);
echo "<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>Contact</th>
<th>Class</th>
<th>RoomNo</th>
</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['sid'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['contact'] . "</td>";
    echo "<td>" . $row['class'] . "</td>";
    echo "<td>" . $row['room'] . "</td>";
    echo "</tr>";
}
echo "</table>";
$sql2="SELECT `".$d."` FROM attend WHERE sid= '".$q."'";
$result2 = mysql_query($sql2);

while($row = mysql_fetch_array($result2)) {
    
 $status=$row[$d];
}
mysql_close($bd);
}
?>
 <body>
        <center>
        <h1>::Please Update Mess Info::</h1>
        <form action="final.php" method="get">
    

   <b>status :</b>
   <select name="status">
  <option value="1">BreakFast</option>
  <option value="2">Lunch</option>
  <option value="4">Dinner</option>
  </select>
  <input type="hidden" name="sid" value="<?php echo $q ?>"</input>
   <button type=""submit" name="submit" value="ok">Sign</button>


 


   
        </form></center>
        
       
    <h1>BreakFast : <?php switch($status){
        case 1:
        case 3: 
        case 5: 
        case 7:
            echo "Attended";
            break;
        default :
            echo "No";
            break;
         }
        
        ?></h1>
        <h1>Lunch : <?php switch($status){
        case 1:
                 echo "No";
                 break;
        case 2:
        case 3:
        case 6:
        case 7:
                  echo "Attended";
                  break;
        default :
                 echo "No";
                 break;
         }
        
        ?></h1>
        <h1>Dinner : <?php switch($status){
        case 1:
        case 3:
             echo "No";
             break;
        case 4: 
        case 5:
        case 6:
        case 7:
            echo "Attended";
            break;
        default :
            echo "No";
            break;
         }
        
        ?></h1>
    
    
    
    
</body>
</html>