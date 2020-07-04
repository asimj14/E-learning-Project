

<html>
<head><link rel="stylesheet" type="text/css" href="css/style.css"> 
<head>
<style>
form {
  padding: 40px;
  width:90%;
 
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(219,237,233,0.6);
}

form:hover {
  box-shadow: 0px 0px 40px 16px white;
  }
/*#A89493*/
input.MyButton {
width: 400px;
padding: 20px 15px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
color: black;
background: #1AB188;
border: 1px solid #3D2D47;
border-radius: 10px;
}
input.MyButton:hover {
background: black;
color: white;
border: 1px solid #fff;
}
h1 {
  text-align: center;
  color: white;
  font-weight: 300;
  margin: 0 0 40px;
}
h2{
  text-align: center;
  color: white;
  font-weight: 300;
  margin: 0 0 40px;
}
h3{
  text-align: center;
  color: white;
  font-weight: 300;
  margin: 0 0 40px;
}
a:link {
    color: #3D2D47;;
}

/* visited link */
a:visited {
    color: #3D2D47;;
}

/* mouse over link */
a:hover {
    color: black;
}

/* selected link */
a:active {
    color: black;
}


.a1:link {
    color: white;
}

/* visited link */
.a1:visited {
    color: white;
}

/* mouse over link */
.a1:hover {
    color: #1ab189;
}

/* selected link */
.a1:active {
    color: black;
}

</style>
</head>
</head>
<body>
<center>
<center><h1> Welcome in MY E-LEARNING</h1></center>
<h2><p align="right"><a class="a1" href="/elearning/logsign/logout.php">Logout</a> </p></h2>
<?php

session_start();
echo"<center><h2>Teacher : ". $_SESSION['username']."</h1></center>";
session_start();
echo"<center><h3>Teacher ID : ". $_SESSION['idutente']."</h1></center>";
?>


<center>
<form class="from">
  <center>
<input class="MyButton" type="button" value="View all courses" onclick="window.location.href='viewcorses.php'"/>
<input class="MyButton" type="button" value="View my courses" onclick="window.location.href='tcourses.php'"/>
<input class="MyButton" type="button" value="Create a course" onclick="window.location.href='createcourse.php'"/>
</center>
</form>
</center>
</body>
</html>

</body>
</html>