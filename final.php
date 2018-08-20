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

<?php
if($_GET['submit']=='ok'){
include('config.php');
$sid= intval($_GET['sid']);
$status=intval($_GET['status']);
$d=date('d');


$sql3="SELECT `".$d."` FROM attend WHERE sid= '".$sid."'";
$result3 = mysql_query($sql3);

while($row = mysql_fetch_array($result3)) {
    
 $statusold=$row[$d];
}
$status=$status+$statusold;
if($status>7){
$status=7;
}
$sql="UPDATE attend set `".$d."`='$status' WHERE sid= '".$sid."'";
$result = mysql_query($sql);

$sql2="SELECT `".$d."` FROM attend WHERE sid= '".$sid."'";
$result2 = mysql_query($sql2);

while($row = mysql_fetch_array($result2)) {
    
 $status=$row[$d];
}
mysql_close($bd);
}
?>
 <body>
        <center>
    
<?php echo "Today is " . date("d/m/Y/l") . "<br>"; ?>
    <h1>BreakFast : <?php switch($status){
        case 1:
        case 3: 
        case 5: 
        case 7:
            echo "Attended";
            break;
        default :{
            echo "No";
            break;
        }
         }
        
        ?></h1>
        <h1>Lunch : <?php switch($status){
        case 1: {
            echo "No";
            break;
        }
        case 2:
        case 3:
        case 6:
        case 7:
            echo "Attended";
            break;
        default :{
            echo "No";
            break;
        }
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
        default :{
            echo "No";
            break;
        }
         }
        
        ?></h1>
    
    ::::::::::: <a href="index.html" >Home</a> ::::::::::::::::::
    
    
    
</body>
</html>