<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    </head>
    <body>
        <form action="ajax/input.php" method="post" class="ajax">
        <input type="text" name="studentNumber" id="sn">
        </input>
        <input type="submit" value="Enter">
        </input>
        </br>
        </form>
        <div class="col-lg-12">
        <div class="col-lg-5"><table class="table table-striped table-hover table-sm" id="tableHolder"></table></div>
       <div class="col-lg-5"><table class="table table-striped table-hover table-sm" id="tableHolder1"></table></div>
       </div>
       
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
     
    });

    function refreshTable(){
        $('#tableHolder').load('ajax/display.php', function(){
           setTimeout(refreshTable, 3000);
        });
       
    }
</script>
<script>
$(document).ready(function(){
      refreshTable1();
     
    });
function refreshTable1(){
    $('#tableHolder1').load('ajax/displayTimeOut.php', function(){
           setTimeout(refreshTable, 3000);
        });
}

        
</script>
<script>
$(document).ready(function(){
    
        $("#tableHolder").on('click','.btnSelect',function(){
             // get the current row
             var that=$(this);
             var data=that.attr('id');
             var test='test';
             alert(data);
             $.ajax({
                url:'ajax/timeout.php',
                method:'POST',
                data:{tranNum:data},
                success: function(response){
                    $("#result").html(response);
                }
             });
             
        });
        
    });
</script>

    <script src="js/input.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#tableholder').DataTable();
    });
    </script>