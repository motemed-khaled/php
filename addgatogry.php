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

    <form class=" myform col-6">
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">notes</label>
    <input type="text" class="form-control" name="notes" id="notes">
  </div>
 
  <button type="button" class="btn btn-primary   btn-save" >Submit</button>
  <a href="catogry.php" class="btn btn-primary "> back</a>
</form>

    </div>
</div>







<script>

    $(".btn-save").click(function(){
      
        var name = $("#name").val();
        var notes = $("#notes").val();
      

        var data = {
            name : name , 
            notes : notes ,
            flagg : "i"
            
        }

        $.ajax({
            url:"server.php",
            dataType:"JSON",
            type:"post",
            data : data ,
            success:function(resp){  
                
                    window.location.replace("../aj/catogry.php");
                   
                
               
            },

            error : function(resp){
                var text = "";
                
                    text += `<div class="alert alert-dark" role="alert">
                              <h6> ${resp.name}</h6>
                              
                                  </div>`
                
                                  $(".data").html(text);

            }
             
            
        })



    })
</script>
    
</body>
</html>