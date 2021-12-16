<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>

<?php
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM php_user WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();

 if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

    if($name == '' || $email == '' || $skill == ''){
        $error = "field must not be empty";
    }else{
        $query = "UPDATE php_user
        SET
        name = '$name',
        email = '$email',
        skill = '$skill'
         WHERE id = $id";
        $update = $db->update($query);
    }


  }


?>

<?php
  if(isset($_POST['delete'])){
      $query = "DELETE FROM php_user WHERE id=$id";
      $delete = $db->delete($query);
  }

?>







<form action="update.php?id=<?php echo $id ?>" method="POST">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $getData['name'] ?>">
        </tr>

        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?php echo $getData['email'] ?>">
        </tr>

        <tr>
            <td>Skill</td>
            <td><input type="text" name="skill" value="<?php echo $getData['skill'] ?>">
        </tr>

        <tr>
    
            <td> <input type="submit" name="submit" value="Submit"> </td>
            <td> <input type="reset" value="Cancel"> </td>
            <td> <input type="submit" name="delete" value="Delete"> </td>

        </tr>
    </table>

</form>

<a href="index.php">Go Back </a> 
    






<?php include "inc/footer.php"; ?>