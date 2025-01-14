<?php

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
     $message=$_SESSION['message'];
     echo "<script type= 'text/javascript'>
     
      alert('$message');

     </script>";
}


$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM teacher";
$result=mysqli_query($data,$sql);



?>






<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Management System</title>
        <link rel="stylesheet" type="text/css"href="style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
     
           <nav>
               <label class="logo">X-School</label>
               <ul>
                   <li><a href="index.php">Home</a></li>
                   <li><a href="contact.php">Contact</a></li>
                   <li><a href="admission.php">Admission</a></li>
                   <li><a href="login.php" class="btn btn-success">Login</a></li>
               </ul>
           </nav>


       <div class="section1">
           <label class="img_text">We Teach Students With Care</label>
           <img class="main_img" src="pic-1.jpg">
       </div>

       <div class="container">
        <div class="row">
            <div class="col-md-4">

               <img class ="welcome_img" src="piic-2.jpg">

            </div>

            <div class="col-md-8">

                 <h1>welcome to x-school</h1>
                 <p>MEMS has been committed to global learning long before it became 
                    an indispensable feature of contemporary education,Established in 1997,
                    we proudly stand as the 1st english medium school in Bangladesh to adopt
                    both pearson edexcel and cambridge curriculum (in 0 and A levels),
                    drawing together students in a vibrant, academically where manifold viewpoints
                    are prized and celebrated,MEMS has been committed to global learing 
                    long before it became an indispensable feature of contemporary education.
                    Established in 1997,we proudly stand as the English medium school in bangladesh
                    to adopt both person Edexcel and cambridge curriculum (in 0 and A levels),
                    drawing together students in a vibrant, academically where manifold viewpoints
                    are prized and celebrated.</p>

            </div>

        </div>

        <center>
            <h1>Our Teachers</h1>
        </center>

       </div>

       <div class="container">
         
            <div class="row">

            <?php
              while($info=$result->fetch_assoc())
              {

              
            ?>

               <div class="col-md-4">

                    <img class="teacher" src="<?php echo "{$info['image']}" ?>">
                    <h3><?php echo "{$info['name']}" ?></h3>
                    <h5><?php echo "{$info['description']}" ?></h5>

               </div>

               <?php

                }
                
                ?>
               
              
            </div>

       </div>





       <center>
            <h1>Our Course</h1>
        </center>

       </div>

       <div class="container">
         
            <div class="row">

               <div class="col-md-4">

                    <img class="course" src="pic-cw-1.jpg">
                    <h3>Web developer</h3>

               </div>
               
               <div class="col-md-4">

                       <img class="course" src="pic-cg-2.jpg">
                       <h3>Graphics Designer</h3>

               </div>   

               <div class="col-md-4">

                       <img class="course" src="pic-cd-3.jpg">
                       <h3>Degital Marketing</h3>

               </div>

            </div>

       </div>

       <center>
           <h1 class="adm">Admission</h1>
       </center>

       <div align ="center" class="admission_form">

            <form action="data_check.php" method="POST">

                <div class="adm_int">
                     <label class="label_text">Name</label>
                     <input class="input_deg" type="text" name="name">
                </div>

                <div class="adm_int">
                     <label class="label_text">Email</label>
                     <input class="input_deg" type="text" name="email">
                </div>

                <div class="adm_int">
                     <label class="label_text">Phone</label>
                     <input class="input_deg" type="text" name="phone">
                </div>

                <div class="adm_int">
                     <label class="label_text">Message</label>
                     <textarea class="input_txt" name="message"></textarea>
                     
                </div>

                <div class="adm_int">
                     
                     <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
                </div>

            </form>  

       </div>

       <footer>
          <h4 class="footer_text">All @copyright reservrd by web tech knowlwdge</h4>
       </footer>


     </body>
</html>
