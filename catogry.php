<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- for data table   -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

</head>
<body>



 
<div class="data1"></div>
<h1>all catogry</h1>
<a href="addgatogry.php"  class="btn btn-danger">new catogry</a>

 <!-- <button class="btn btn-danger" id="button">load data</button> -->

<div class="container">
<div class="row">

<table  class="table" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>notes</th>
                <th>update</th>
                <th>delete</th>
                
            </tr>
        </thead>
        <tbody class="data">

            
            
        </tbody>
       
    </table>

</div>
</div>


<script>

var text = "";

// for select all
//$("#button").click(function(){
    var data1 = {
            flagg : "s"
        }
$.ajax({

    url:"server.php",
    dataType:"JSON",
    data :data1,
    type:"post",
    success:function(resp){

        
        for (let post of resp) {
 
            text += `<tr>
                <td>${post.catogry_name}</td>
                <td>${post.catogry_notes}</td>
                
        <td> <a class="btn btn-dark" href="update.php?id=${post.catogry_id}&flagg=u" onclick=" return confirm('are you sure to update this item')"> update</a></td>
      <td>
      <a class="btn btn-danger" href="server.php?id=${post.catogry_id}&flagg=d" onclick=" return confirm('are you sure to delete this item')" > delete</a> </td>
            </tr>`
            
        }

        $(".data").html(text);
    },
    error : function(resp){
        
                

                text += `<div class="alert alert-dark" role="alert">
                          <h6>${resp.error}</h6>
                          
                              </div>`
            
                              $(".data1").html(text);

    }

    
})
//return false;
//})


// end select all




// start delete

$(".delete").click(function(){
    
   alert("hello");
})

// end delete


</script>





    
</body>
</html>