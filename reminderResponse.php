<?php
include 'config/config.php';
// print_r($_GET);
if(isset($_GET['id']) && $_GET['id'] != ''){
    $data['id'] = $_GET['id'];
    $data['action'] = $_GET['action'];


    $response = updateReminderForShipper($data);
    // print_r($response);
}
   
?>
<script>
    alert("Quote has been <?php echo $_GET['action'] ?> successfully");
    window.location.href = "https://stretchxlfreight.com/vendor";
</script>