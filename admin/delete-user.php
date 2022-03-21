<?php
    include 'config.php';
    if($_SESSION['role'] == '0'){
        header("Location: http://localhost/news-site/admin/post.php");
    }
    $userid = $_GET['id'];
    $sql = "DELETE  FROM user WHERE user_id={$userid}";
    
    if(mysqli_query($conn, $sql)){
        header("Location: {$host_name}/admin/users.php");
    }else{
        echo "Can't delete user record";
    }

    mysqli_close($conn);
?>