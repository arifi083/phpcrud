<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>

<?php
$db = new Database();
$query = "SELECT * FROM php_user";
$read = $db->select($query);

?>

<?php
 if(isset($_GET['msg'])){
   echo "<span style='color:green'>".$_GET['msg']."</span>";
 }

?>




<table class="tmain">
    <tr>

      <th>Sl</th>
      <th>Name</th>
      <th>Email</th>
      <th>Skill</th>
      <th>Action</th>
    </tr>

  <?php if($read) { ?>
   <?php 
    $sl=1;
    while($rows = $read->fetch_assoc()) {  ?>
 
    <tr>
      <td> <?php echo $sl++; ?> </td>
      <td> <?php echo $rows['name']; ?> </td>
      <td> <?php echo $rows['email']; ?> </td>
      <td> <?php echo $rows['skill']; ?> </td>
      <td><a href="update.php?id=<?php echo urlencode($rows['id']); ?>"> Edit</td>
    </tr>

    <?php } ?>
    <?php } else { ?>
      <P>There have no data </p>
  <?php } ?>

</table>

<a href="create.php">Create</a>




<?php include "inc/footer.php"; ?>