<html>
<head><link rel="stylesheet" type="text/css" href="css/style.css"> 
<style>
form {
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(219,237,233,0.6);
}

form:hover {
  box-shadow: 0px 0px 40px 16px white;
  }
.sinistro{float:left;}
.destro{float:right;} 
  a:link {
    color: #white;
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
    color: #1aba89;
}

/* selected link */
.a1:active {
    color: black;
}
#error,#success{text-align:center;margin-top: 50px;}  
#error{color:red;}
#success{color:green;}
  </style>
</head>
<body>
<center>

<h1>Create a course</h1> </br></center>
<h2>
<p class="sinistro" align="left"><a class="a" href="/elearning/logsign/teacher/docloginok.php">Back</a></p>
<p  class="destro" align="right"><a class="a1" href="/elearning/logsign/logout.php">Logout</a> </p></h2>
<?php if (isset($_SESSION['msg'])): ?>
          <div class="msg">
          <?php 
          echo $_SESSION['msg']; 
          unset($_SESSION['msg']);
           ?>
          </div>
  <?php endif ?>
<form method="post" action="course.php" >
 <input type="hidden" name="idcorso" value="<?php echo $idcorso; ?>">

          
         
            <div class="input-group">
              <label>
                <strong>Course Name </strong><span class="req">*</span>
              </label>
              <input type='text' name='nomecorso' value='<?php echo $nomecorso; ?>' required autocomplete='off' />
            </div>
        
            <div class="input-group">
              <label>
                <strong>Description</strong><span class="req">*</span>
              </label>
              <input type="text" name="descrizione" value="<?php echo $descrizione; ?>"  required autocomplete="off"/>
            </div>

            <div class="input-group">
              <label>
                <strong>Content</strong><span class="req">*</span>
              </label>
              <input type="text" name="contenuto" value="<?php echo $contenuto; ?>"  required autocomplete="off"/>
            </div>
          
            <center>
          <div class="input-group">
          <?php if ($edit_state == false): ?>  
          
              <button class="btn" type="submit" name="save" >Save</button>

          <?php else: ?>
         
              <button class="btn" type="submit" name="update" >Update</button>
          <?php endif ?>
          </div>
          </center>
          <div id="error">
    <?php
    if(isset($_GET["error"])){
      echo $_GET["error"];
    }
     ?>
   </div>

   <div id="success">
   <?php
   if(isset($_GET["success"])){
    echo $_GET["success"];
  }
  ?>
  </div>
  </div>
          
        
          
 </form>
</body>
</html>

