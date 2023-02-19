<?php 

function getSetting($conn){
   $sql = "SELECT * FROM setting";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() == 1) {
     $settings = $stmt->fetch();
     return $settings;
   }else {
    return 0;
   }
}

