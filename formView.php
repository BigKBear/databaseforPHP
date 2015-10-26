<?php
    include 'db_connection.php';
    include 'functions.php';
    
    //if form was submitted getLerntDetails
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($conn)) {
            try {
                $sql = "INSERT INTO lerntdetails (Screenname, Learned, Tumbsup, Thumbsdown)
                VALUES (:screenname, :learned, :tumbsup, :thumbsdown)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':screenname',$_POST['screenname']);
                $stmt->bindParam(':learned',$_POST['learned']);
                $stmt->bindParam(':tumbsup',$_POST['tumbsup']);
                $stmt->bindParam(':thumbsdown',$_POST['thumbsdown']);
                
                $learned_item_result = $stmt->execute();
            } catch(PDOException $e) {
                $learned_item_error = $e->getMessage();
            }
        }
    }
    $title = "Register";
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($learned_item_result) {
                    $type = 'success';
                    $msg = '<strong>Congrats!</strong> You\'ve lernt a new skill.';
                } else {
                    $type = 'danger';
                    $msg = '<strong>Oops!</strong> An error has occurred please add your skill later(1hr). <br/>';
                    $msg .= $learned_item_error;
                }
                
                echo '<div class="alert alert-'.$type.'" role="alert">'.$msg.'</div>';
                
                if ($learned_item_result) {
                    echo '<div class="alert text-center"><a href="/index.php" class="btn btn-success">Add Item</a></div>';
                }
            }
?>
    
<!--search forms to see the different type of synta can be used on the form
<form action ="form.php" method="post">
need a name so that we can store the name like a key so that they can be stored in the db
-->
<form role="form" method="POST" action="">
    <br>
    <input id="screenname" type="text" name:"screenname" placeholder="Enter Display name"></input>
    <?php
        echo '<br> <br>';
    ?>
    <textarea rows="4" cols="50"  placeholder="What did you Learn today?" type="text" id="learned" name="learned" required></textarea>
    <br>
    <br>
    <label>Did you learn this today also?</label>
    <br>
    <a href= "" > Tumbs Up </a>
    <br>
    <a href= ""> Thumbs Down </a>

    <div class="text-center">
        <br>
        <button> <a href="index.php">Home</a> </button>
        <button type="submit" id="save-skill">Save</button>
    </div>
</form>


<!--
MYSQL
Step 2 start the server using 
mysql-ctl install

 connect to the database using the 
 ip 127.0.0.1 and the default port 3306
 
 Step 3 See what databases you have
 to open MySQL Monitor use:
 mysql-ctl cli
 
 Step 4 See the databases
 show databases;



Database schema 
Key name learned ThumbUp ThumbDown

-->