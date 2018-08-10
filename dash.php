<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>KankaDurga Mess</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title1 {
  color: grey;
  font-size: 18px;
}

.button1 {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.a1 {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: center;
    padding: 16px;
}

th:first-child, td:first-child {
    text-align: left;
}

tr:nth-child(odd) {
    background-color: grey;
}

tr:nth-child(even) {
    background-color: darkgrey;
}

.fa-check {
    color: green;
}

.fa-remove {
    color: red;
}

</style>
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
      color: black;
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
$sid="0";
$name="null";
$contact="null";
$classs="null";
$room="null";
$sql="SELECT * FROM students WHERE sid= '".$q."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
    
    $sid=$row['sid'];
    $name=$row['name'];
    $contact=$row['contact'];
    $classs=$row['class'];
    $room=$row['room'];
   
}
$sql2="SELECT `".$d."` FROM attend WHERE sid= '".$q."'";
$result2 = mysql_query($sql2);

while($row = mysql_fetch_array($result2)) {
    
 $status=$row[$d];
}
mysql_close($bd);
}
?>
 <!--Profile Contact card-->   
    <h2 style="text-align:center">User Profile Card</h2>

<div class="card bg-3">
  <img src="images/img_avatar.png" alt="pic" style="width:100%">
  <h1><?php echo $name ?></h1>
  <p class="title1"><?php echo $classs ?></p>
  <p>Room No: <?php echo $room ?></p>
  <div style="margin: 24px 0;">
    <a  href="#"><i class="fa fa-dribbble a1"></i></a> 
    <a  href="#"><i class="fa fa-twitter a1"></i></a>  
    <a  href="#"><i class="fa fa-linkedin a1"></i></a>  
    <a  href="#"><i class="fa fa-facebook a1"></i></a> 
 </div>
 <p><button class="button1" ><a href="tel:<?php echo $contact ?>">Contact:  <?php echo  $contact ?></a></button></p>
</div>
</div>
<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">:: Please Update Mess Info ::</h3>
  
      
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



<h2>Today'<sup>s</sup> Attendance Table</h2>

<table>
  <tr style="background-color:#FFC300;">
    <th style="width:50%;">Food Event</th>
    <th>Attendence</th>
  </tr>
  <tr>
    <td>BreakFast</td>
     <?php switch($status){
        case 1:
        case 3: 
        case 5: 
        case 7:
            echo "<td><i class='fa fa-check'></i></td>";
            break;
        default :
            echo "<td><i class='fa fa-remove'></i></td>";
            break;
         }
        
        ?>
  </tr>
  <tr>      
      <td>Lunch </td> <?php switch($status){
        case 1:
                 echo "<td><i class='fa fa-remove'></i></td>";
                 break;
        case 2:
        case 3:
        case 6:
        case 7:
                  echo "<td><i class='fa fa-check'></i></td>";
                  break;
        default :
                 echo "<td><i class='fa fa-remove'></i></td>";
                 break;
         }
        
        ?>
  </tr>
  <tr>
        <td>Dinner</td><?php switch($status){
        case 1:
        case 3:
             echo "<td><i class='fa fa-remove'></i></td>";
             break;
        case 4: 
        case 5:
        case 6:
        case 7:
            echo "<td><i class='fa fa-check'></i></td>";
            break;
        default :
            echo "<td><i class='fa fa-remove'></i></td>";
            break;
         } 
        
        ?>
  </tr>
</table>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>KankaDurga Boys Hostal By <a href="https://github.com/praveen64">pravee64</a></p> 
</footer>

</body>
</html>
