<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>KankaDurga Mess</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">KBH Mess</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Home</a></li>
        <li><a href="#">Students</a></li>
        <li><a href="#">Reports</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin"><?php echo "Today is " . date("d/m/Y/l") . "<br>"; ?></h3>

<?php
if($_GET['submit']=='ok'){
include('config.php');
$q = intval($_GET['q']);
$d=date('j');
$sql="SELECT * FROM students WHERE sid= '".$q."'";
$result = mysql_query($sql);
echo "<table class='table table-bordered'>
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Contact</th>
<th>Class</th>
<th>Room</th>
</tr><thead>";
while($row = mysql_fetch_array($result)) {
    echo "<tbody><tr>";
    echo "<td>" . $row['sid'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['contact'] . "</td>";
    echo "<td>" . $row['class'] . "</td>";
    echo "<td>" . $row['room'] . "</td>";
    echo "</tr></tbody>";
}
echo "</table></div>";
$sql2="SELECT `".$d."` FROM attend WHERE sid= '".$q."'";
$result2 = mysql_query($sql2);

while($row = mysql_fetch_array($result2)) {
    
 $status=$row[$d];
}
mysql_close($bd);
}
?>
    

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">::Please Update Mess Info::</h3>
  
      
<form action="final.php" method="get" class="form-inline">
    <div class="input-group">
    <input type="hidden" name="sid" value="<?php echo $q ?>"</input>
      <select name="status" class="form-control">
  <option value="1">BreakFast</option>
  <option value="2">Lunch</option>
  <option value="4">Dinner</option>
        </select>
      <div class="input-group-btn">
        <button name="submit"  value="ok" type="submit" class="btn btn-danger">Sign</button>
      </div>
    </div>
  </form>



  <h3 class='margin'>BreakFast : <?php switch($status){
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
        
        ?></h3>
        <h3 class='margin'>Lunch : <?php switch($status){
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
        
        ?></h3>
        <h3 class='margin'>Dinner : <?php switch($status){
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
        
        ?></h3>


</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>KankaDurga Boys Hostal By <a href="https://github.com/praveen64">pravee64</a></p> 
</footer>

</body>
</html>
