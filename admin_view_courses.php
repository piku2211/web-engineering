<?php
session_start();
error_reporting(0);

     if(!isset($_SESSION['username']))
     {

        header("location:login.php");


     }
     elseif($_SESSION['usertype']=='student')
     {
        header("location:login.php");
     }

     $host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data = mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM courses";
$result=mysqli_query($data,$sql);

if($_GET['courses_id'])
{
    $t_id=$_GET['courses_id'];
    $sql2="DELETE FROM courses WHERE id='$t_id' ";
    $result2=mysqli_query($data,$sql2);
    if($result2)
    {
        header('location:admin_view_courses.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>

        <?php
        
        include 'admin_css.php'
        ?>

        <style type="text/css">
            .table_th
            {

            padding: 20px;
            font-size: 20px;

            }
              .table_td
            {

            padding: 20px;
            background-color:skyblue;
            font-size: 20px;

            }
            .btn.btn-danger {
            background-color: red; 
            border: none; 
            color: white; 
            padding: 10px 20px; 
            font-size: 16px; 
            border-radius: 10px; 
            cursor: pointer;
            transition: background-color 0.3s ease; 
            }

           .btn.btn-danger:hover {
            background-color: darkblue; 
            }
        </style>

       

</head>
<body>
         <?php
         include 'admin_sidebar.php';
         ?>

         <div class= "content">
            <center>
            <h1>View All Courses Data</h1>

            <table border="1px">
                <tr>
                    <th class="table_th">Courses Name</th>
                    <th class="table_th">About Courses</th>
                    <th class="table_th">Image</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php
                
                while($info=$result->fetch_assoc())
                {
                ?>

                <tr>
                    <td class="table_td"><?php echo "{$info['name']}" ?></td>
                    <td class="table_td"><?php echo "{$info['description']}" ?></td>
                    <td class="table_td"><image height="100px" width="100px" src="<?php echo "{$info['image']}" ?>"></td>
                    <td class="table_td"><?php echo"<a onClick=\"javascript:return confirm('Are You Sure To Delete this');\" class='btn btn-danger'
                     href='admin_view_courses.php?courses_id={$info['id']}'>Delete</a>"; ?></td>
                      <td class="table_td">
                       <?php echo "<a href='update_student.php?student_id={$info['id']}' style='background-color: #1e90ff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 14px; display: inline-block; text-align: center;'>Update</a>"; ?>
                   </td>
                </tr>
                <?php 
                } 
            ?>
                
            </table>
        </center>
         </div>
</body>
</html>