<?php
if(isset($_GET['ref'])){
    $ref = $_GET['ref'];
    $cookieSet = setcookie(
        "ref_id", 
        $ref, 
        [
            'expires' => time() + (86400),
            'path' => '/',
        
        ]
    );
    header("Location: create-account.php");
    exit();
}else{
   echo '<script>
   alert("No refferals found found");
   window.location.href = "./create-account.php";
</script>';
}
?>
    
