<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>

<?php
$db = new Database();
 if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

    if($name == '' || $email == '' || $skill == ''){
        $error = "field must not be empty";
    }else{
        $query = "INSERT INTO php_user(name,email,skill) Values('$name','$email','$skill')";
        $create = $db->insert($query);
    }


  }


?>



<form action="create.php" method="POST">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="please enter your name">
        </tr>

        <tr>
            <td>Email</td>
            <td><input type="email" name="email" placeholder="please enter your email">
        </tr>

        <tr>
            <td>Skill</td>
            <td><input type="text" name="skill" placeholder="please enter your skill">
        </tr>

        <tr>
    
            <td><input type="submit" name="submit" value="submit">
            <td><input type="reset" value="cancel">
        </tr>
    </table>

</form>

<a href="index.php">Go Back </a> 
    






<?php include "inc/footer.php"; ?>