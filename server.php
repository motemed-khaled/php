<?php

require_once("config.php");

/// to insert catogry

if(isset($_POST["name"]) && $_POST["flagg"] == "i"){
    $name = $_POST["name"];
    $notes = $_POST["notes"];
  
    $statment = "INSERT INTO `add_catogry`( `catogry_name`, `catogry_notes`) VALUES ('$name','$notes')";
    mysqli_query($con , $statment) ;
   $error = mysqli_error($con);

   if($error){
    $result = ["msg"=>"error" , "name"=>"$error" , "flagg"=>"true" ];
    echo json_encode($result);
   }
   else{

   $result = ["msg"=>"done insert" , "name"=>"hello $name " ];
   echo json_encode($result);
}

}


///end insert
// start selectall

if($_POST["flagg"]=="s"){

$statment = "SELECT * FROM `add_catogry`";
 $result = mysqli_query($con , $statment);
$error = mysqli_error($con);

if($error){

    $data = ["error"=>"$error"];
    echo json_encode($data);

}

else{
    $data = [];
    while( $row = mysqli_fetch_assoc($result)){
   
       array_push($data,$row);
   
    }
   
    echo json_encode($data);
}



}

// end select 

// start delete

if(isset($_GET["id"]) && $_GET["flagg"]=="d" ){

  $id = $_GET["id"];
  $statment = "DELETE FROM `add_catogry` WHERE catogry_id=$id";
  mysqli_query($con , $statment);
  $error = mysqli_error($con);
  if($error){
    echo ($error);
  }
  
  else{
    
    header("location:catogry.php");
}}


// end delete

// start update
if(isset($_POST["name"]) && $_POST["flagg"]=="u" ){

    $name = $_POST["name"];
    $notes = $_POST["notes"];
    $id = $_POST["id"];
    $statment = "UPDATE `add_catogry` SET `catogry_name`='$name',`catogry_notes`='$notes' WHERE `catogry_id`='$id'";
    mysqli_query($con , $statment);
    $error = mysqli_error($con);
    if($error){
        $result  = ["msg"=>"$error"];
        echo json_encode($result);
    }
    
    else{

      
      $result  = ["msg"=>"done update"];
      echo json_encode($result);
  }}

?>