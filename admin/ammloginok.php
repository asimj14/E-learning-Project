


<html>
<head>
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.styled-select select {
   background: transparent;
   width: 268px;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }
.styled-select {
   width: 240px;
   height: 34px;
   overflow: hidden;
   background: url(new_arrow.jpg) no-repeat right #ddd;
   border: 1px solid #ccc;
   }


table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:{ 
  background: #eee; 
}
th { 
  background: #1ab188; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}



table:hover {
  box-shadow: 0px 0px 40px 16px white;
  }
.sinistro{float:left;}
.destro{float:right;} 
h1 {
  text-align: center;
  color: white;
  font-weight: 300;
  margin: 0 0 40px;
}

a:link {
    color: white;
}

/* visited link */
a:visited {
    color: white;
}

/* mouse over link */
a:hover {
    color: black;
}

/* selected link */
a:active {
    color: white;
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
  #sucdel,#sucupdate,#sucins{text-align:center;margin-top: 50px; background-color: white}  
  #sucdel{color:red;}
  #sucupdate{color:green;}
  #sucins{color: black};
</style>
</head>
<body>

<h1>Welcome Admin </h1>
<h2><p align="right"><a class="a1" href="/elearning/logsign/logout.php">Logout</a></p></h2>

<?php 
 include('server.php');
$mysqli = new mysqli($host,$username,$pass,$db_nome);
if(isset($_POST['update'])){
  $idutente = ($_POST['idutente']);
  $cognome = ($_POST['cognome']);
  $nome = ($_POST['nome']);
  $cf = ($_POST['cf']);
  $datanascita = ($_POST['datanascita']);
  $email = ($_POST['email']);
  $password = (md5($_POST['password']));
  $username = ($_POST['username']);
  $usertype = ($_POST['usertype']);
  
 echo "<script> console.log('".$cognome."');</script>";

  $sql3="UPDATE utenti 
    SET idutente=$idutente, 
        cognome='$cognome', 
        nome='$nome', 
        cf='$cf',
        datanascita='$datanascita',
        email='$email',
        password='$password', 
        tipoutente='$usertype', 
        username='$username' 
        WHERE idutente=$idutente";
  if ($mysqli->query($sql3) == TRUE) {
    //$_SESSION['msg'] = " User updated successfully";
    //echo"<center><p class='msg'>User updated successfully</p></center>";
  header('location: ammloginok.php?success=User updated successfully');

}else {
    echo "Error: " . $sql3 . "<br>" . $mysqli->error;
}
}



//delete records
if(isset($_GET['del'])){

  $idutente=$_GET['del'];
  $cognome=$_GET["cognome"];
  $nome=$_POST["nome"];
  $cf=$_POST["cf"];
  $datanascita=$_POST["datanascita"];
  $email=$_POST["email"];
  $password=($_POST["password"]);
  $username=$_POST["username"];
  $usertype=$_POST["usertype"];



  $sql2="DELETE FROM `utenti` 
     WHERE `idutente`=$idutente";

 if ($mysqli->query($sql2) == TRUE) {
   //$_SESSION['msg'] = " User deleted successfully";
     //echo "<center><p class='msg'>User deleted successfully</p></center>"; 
    header('location: ammloginok.php?sucdel=User deleted successfully');
} else {
    echo "Error: " . $sql2 . "<br>" . $mysqli->error;
}


  }



//update
if(isset($_GET['edit'])){
  $idutente = $_GET['edit'];
  $edit_state = true;
  echo "<script> console.log('".$_GET['edit']."');</script>";
  $rec = mysqli_query($mysqli,"SELECT * FROM utenti WHERE idutente=$idutente");
  $record =mysqli_fetch_array($rec);
  $cognome = $record['cognome'];
  $nome = $record['nome'];
  echo "<script> console.log('".$nome."');</script>";
  $datanascita = $record['datanascita'];
  $cf = $record['cf'];
  $usertype = $record['tipoutente'];
  $email = $record['email'];
  $username = $record['username'];
  $password = $record['password'];
  $idutente = $record['idutente'];

}
?>
<div class="sucins" id="sucins">
  <?php
  if(isset($_GET["sucins"])){
    echo $_GET["sucins"];
  }
  ?>
</div>
<div class="sucdel" id="sucdel">
  <?php
  if(isset($_GET["sucdel"])){
    echo $_GET["sucdel"];
  }
  ?>
  </div>
  <div class="sucupdate" id="sucupdate">
  <?php
  if(isset($_GET["success"])){
    echo $_GET["success"];
  }
  ?>
  </div>



<table>
  <thead>
    <tr>
           <th>User's ID</th> 
           <th>Surname</th>
            <th>Name</th>
              <th>Date of birth</th>
             <th> CF </th>
              <th>User Type</th>
             <th>Email </th>
            <th>Username</th>
            <th>Password</th>
                               
             <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php echo "<script> console.log('$nome');</script>";
    while ($row = mysqli_fetch_array($result)) { ?>
    
    
    <tr>
      <td><?php echo $row["idutente"]; ?></td>
      <td><?php echo $row["cognome"]; ?></td>
      <td><?php echo $row["nome"]; ?></td>
      <td><?php echo $row['datanascita']; ?></td>
      <td><?php echo $row['cf']; ?></td>
      <td><?php echo $row['tipoutente']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo md5($row['password']); ?></td>
      <td>
        <a name="edit" class="edit_btn" href="ammloginok.php?edit=<?php echo $row['idutente']; ?>">Edit</a>
      </td>
      <td>
        <a name="del" class="del_btn" href="ammloginok.php?del=<?php echo $row['idutente']; ?>" >Delete</a>
      </td>
    </tr>
  
     <?php } ?>
    

  </tbody>
 </table>
 <center>
 <form method="post" action="ammloginok.php" >
 <input type="hidden" name="idutente" value="<?php echo $idutente; ?>">

          
          
            <div class="input-group">
              <label>
               Last Name<span class="req">*</span>
              </label>
              <input type='text' name='cognome' value='<?php echo $cognome; ?>' required autocomplete='off' />
            </div>
        
            <div class="input-group">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="nome" value="<?php echo $nome; ?>"  required autocomplete="off"/>
            </div>
          
          <div class="input-group">
              <label>
                Data of birth<span class="req">*</span>
              </label>
              <input type="text" name="datanascita" value="<?php echo $datanascita; ?>" required autocomplete="off"/>
            </div>
            <div class="input-group">
              <label>
                C.F<span class="req">*</span>
              </label>
              <input type="text" name="cf" value="<?php echo $cf; ?>" required autocomplete="off"/>
            </div>
          <div class="input-group">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" value="<?php echo $email; ?>" required autocomplete="off"/>
          </div>
          <div class="input-group">
            <label>
              Set your username<span class="req">*</span>
            </label>
            <input type="text" name="username" value="<?php echo $username; ?>" required autocomplete="off"/>
          </div>
          
          <div class="input-group">
            <label>
              Set a Password<span class="req">*</span>
            </label>
             <input type="password" name="password" value="<?php echo $password; ?>" required autocomplete="off"/>
           
          </div>
          <center>
          <div class="input-group">
            <label for="usertype">User Type<span class="req">*</span></label>
            <br>    <br>

          <select class="styled-select"  name="usertype" value="<?php echo $usertype; ?>">
          <option value="Student" name="usertype ">Student</option>
          <option value="Teacher" name="usertype">Teacher</option>
          
          </select>
          </div>
            </center>

          <div class="input-group">
          <?php if ($edit_state == false): ?>  
          
              <button name="save" class="btn" type="submit" name="save" >Save</button>

          <?php else: ?>
         
              <button name="update" class="btn" type="submit" name="update" >Update</button>
          <?php endif ?>
          </div>
         </form>
</center>
</body>
</html>






