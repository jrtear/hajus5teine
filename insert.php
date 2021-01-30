<?php
include 'includes/db.php';

if(isset($_POST['insert']))
{
    $title         = clean($_POST['title']);
    $description        = clean($_POST['description']);
    $genre        = clean($_POST['genre']);
    $grade        = clean($_POST['grade']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;


    move_uploaded_file($image, $location);


    $query = "INSERT INTO film (title,description,genre,grade,image) VALUES ('".escape($title)."', '".escape($description)."','".escape($genre)."' ,'".escape($grade)."', '$image_name')";

    $result = mysqli_query($conn,$query);

    if($result == true)
    {
        header("Location:index.php");
    }
    else
    {
        die('error' . mysqli_error($conn));
    }

}


?>
<div class="container">

    <div class="jumbotron text-center">
        <h2>Add films</h2>
    </div>
    <br>
<div class="row">
<div class="col-md-12">
    
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Title:</label>
        <input type="text" name="title" class="form-control" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="name">Description:</label>
        <input type="text" name="description" class="form-control" placeholder="Enter description">
    </div>
    <div class="form-group">
        <label for="name">Genre:</label>
        <input type="text" name="genre" class="form-control" placeholder="Enter genre">
    </div>
    <div class="form-group">
        <label for="name">Grade:</label>
        <input type="number" name="grade" min="1" max="5" class="form-control" placeholder="Enter Grade">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <input type="file" class="btn btn-primary" name="image" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Insert data" name="insert">
    </div>
</form>
</div>
</div>

</div>
