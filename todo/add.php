<?php
    require 'config.php';
    if($_POST) {
        $title = $_POST['title'];
        $desc = $_POST['description'];
       $sql = "INSERT INTO todo(title, description) VALUES (:title, :description)";
       $pdostatement = $pdo->prepare($sql);
       $result = $pdostatement->execute(
           array(
               ':title'=>$title,
               ':description'=>$desc,
           )
           );
       if($result) {
           echo "<script>alert('New todo is added');window.location.href='index.php';</script>";
       }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New Todo</h2>
            <form class="" action="add.php" method="post">
            <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" id="" value="" required>
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-info mt-4" name="" value="SUBMIT">
                    <a href="index.php" type="button" class="btn btn-warning mt-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>