<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

   
    if (!empty($name) && !empty($email) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Thank you, $name. Your message has been sent successfully.');</script>";
        } else {
            echo "<script>alert('Invalid email address. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('All fields are required. Please complete the form.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style typr="text/css">

label{
    display:inline-block;
    text-align:right;
    width:100px;
    padding-top:10px;
    padding-bottom: 10px; 
}
.div_deg{
    background-color:skyblue;
    width:500px;
    padding-top:70px;
    padding-bottom: 70px; 

}
.btn.btn-primary {
background-color: blue; 
border: none; 
color: white; 
padding: 10px 20px; 
font-size: 15px; 
border-radius: 10px; 
cursor: pointer;
transition: background-color 0.3s ease; 
}

.btn.btn-primary:hover {
background-color: darkblue; 
}

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <center>
    <h1>Contact Us</h1>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>

        <button type="submit" class= "btn btn-primary">Send Message</button>
    </form>
</center>
</body>
</html>
