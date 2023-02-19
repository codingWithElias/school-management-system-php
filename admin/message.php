<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/message.php";
       $messages = getAllMessages($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Messages</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($messages != 0) {
     ?>
     <div class="container mt-5" style="width: 90%; max-width: 700px;">
        <h4 class="text-center p-3">Inbox</h4>
        <div class="accordion accordion-flush" id="accordionFlushExample_<?=$message['message_id']?>">
          <?php foreach ($messages as $message) { ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading_<?=$message['message_id']?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_<?=$message['message_id']?>" aria-expanded="false" aria-controls="flush-collapse_<?=$message['message_id']?>">
                <?=$message['sender_full_name']?> 

              </button>
            </h2>
            <div id="flush-collapse_<?=$message['message_id']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading_<?=$message['message_id']?>" data-bs-parent="#accordionFlushExample_<?=$message['message_id']?>">
              <div class="accordion-body">

                <?=$message['message']?>

                <div class="d-flex mb-3">
                    <div class="p-2">Email: <b><?=$message['sender_email']?></b></div>
                    <div class="ms-auto p-2">Date: <?=$message['date_time']?></div>
                </div>

            </div>
            </div>
          </div>
          <?php } ?>
        </div>
        
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(9) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>