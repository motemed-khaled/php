<?php 

require_once("config.php");
if(isset($_GET["id"])){

    $id = $_GET["id"];

    $statemant = "SELECT  `catogry_id`,`catogry_name`, `catogry_notes` FROM `add_catogry` WHERE catogry_id =$id";
   $result = mysqli_query($con,$statemant);
    $row = mysqli_fetch_assoc($result);
    

}


/* if(isset($_POST["name"])  ){
echo "hello";
    $name = $_POST["name"];
    $notes = $_POST["notes"];
    $id = $_POST["id"];
    $statment = "UPDATE `add_catogry` SET `catogry_name`='$name',`catogry_notes`='$notes' WHERE `catogry_id`='$id'";
    mysqli_query($con , $statment);
    $error = mysqli_error($con);
    if($error){
        $result  = ["msg"=>"$error"];
        echo ($result["msg"]);
    }
    
    else{

      
      $result  = ["msg"=>"done update"];
      echo ($result["msg"]);
      header("location:catogry.php");
  }}
*/


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="catogry.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>
<body>

<div class="data">

</div>

<div class="container">
    <div class="row">

    <form class=" myform col-6" method="POST">
    
    <input type="text" hidden id="id" name="id" value="<?=$row["catogry_id"]?>">
  
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">name</label>
    <input type="text" value="<?=$row["catogry_name"]?>" class="form-control" name="name" id="name">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">notes</label>
    <input type="text" value="<?=$row["catogry_notes"]?> " class="form-control" name="notes" id="notes">
  </div>
 
  <button type="submit" class="btn btn-primary" id="update" >update</button>
  <a href="catogry.php" class="btn btn-primary   " >back</a>
</form>

    </div>
</div>


<script>


$("#update").click(function(){

 var id = $("#id").val();
 var name = $("#name").val();
 var notes = $("#notes").val();

 data = {
    id :id ,
    name : name , 
    notes : notes , 
    flagg : "u"
 }
 $.ajax({
     url:"server.php",
     dataType : "JSON" ,
     type : "post" , 
     data : data ,
     success : function(resp){
        var text = "";
                
                text += `<div class="alert alert-dark" role="alert">
                          <h6> ${resp.msg}</h6>
                          
                              </div>`
            
                              $(".data").html(text);
                              window.location.replace("../aj/catogry.php");
                              
                             
     },
     error : function(){
        var text = "";
                
                text += `<div class="alert alert-dark" role="alert">
                          <h6> ${resp.msg}</h6>
                          
                              </div>`
            
                              $(".data").html(text);
     }



 })

return false ;


})



</script>








    
</body>
</html>