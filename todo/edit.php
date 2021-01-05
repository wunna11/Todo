<?php
    require 'config.php';
    if($_POST) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
        $result = $pdostatement->execute();
        if($result) {
            echo "<script>alert('New todo is updated');window.location.href='index.php';</script>";
        }

    } else {
        $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Edit Todo</h2>
            <form class="" action="" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $result[0]['id']; ?>">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $result[0]['description']; ?></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-info mt-4" name="" value="UPDATE">
                    <a href="index.php" type="button" class="btn btn-warning mt-4">Back</a>
                </div>
            </form>    
        </div>
    </div>
</body>
</html>

