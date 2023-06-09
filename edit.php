<?php
include("db.php");

$tittle = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $tittle = $row['tittle'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $tittle= $_POST['tittle'];
  $description = $_POST['description'];

  $query = "UPDATE task set tittle = '$tittle', description = '$description' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: dashboard.php');
}

?>
<?php include('includes/header.php'); ?>

<body style="background-color: #e3d3c9;">

  <div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input name="tittle" type="text" class="form-control" value="<?php echo $tittle; ?>" placeholder="Update Title" style="margin-bottom: 10px;">
          </div>
          <div class="form-group">
            <textarea name="description" class="form-control" cols="30" rows="10" style="margin-bottom: 10px;"><?php echo $description;?></textarea>
          </div>
          <button class="btn btn-success" name="update" style="background-color: #8c5442;">Update</button>

          
        </form>
        </div>
      </div>
    </div>
  </div>
<?php include('includes/footer.php'); ?>