<?php
include 'config.php';

// Read POST data
$postData = json_decode(file_get_contents("php://input"));
$request = "";
if(isset($postData->request)){
   $request = $postData->request;
}

// Get states
if($request == 'getSec'){
   $courseN = 0;
   $result = array();$data = array();

   if(isset($postData->courseN)){
      $courseN = $postData->courseN;

      $sql = "SELECT * from course_list WHERE COURSE_CODE=?";
      $stmt = $conn->prepare($sql); 
      $stmt->bind_param("s", $courseN);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($row = $result->fetch_assoc()){

       
         $name = $row['name'];

         $data[] = array(
            "name" => $name
         );

      }

   }

   echo json_encode($data);
   die;

}