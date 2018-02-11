<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UPB Library</title>
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   
   <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


    </head>
    <body>
    <nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #8E1538;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" style="color:#FFFFFF;"><img src="uplogo.png" width="60" height="60" alt="">  UPB Library</img></a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="SNumbers.php" style="color:white;"> Students <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <span class="navbar-text">
            Navbar text with an inline element
        </span>
    </div>
    </nav>
    <br/>
    <div class="col-lg-12">
    <div class="row">
        <div class="col-sm-4">
                <form action="ajax/input.php" method="post" class="ajax">
                    <div class="input-group">
                        <input type="text" name="studentNumber" id="sn" class="form-control" placeholder="Charging" pattern="[1-2](0|9)([1-9]{2,2})-[0-9]{5,5}">
                        </input>
                        <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                        </span>
                    </div>
                </form>
        </div>
        <div class="col-sm-4">
                <form action="ajax/input.php" method="post" class="ajax">
                    <div class="input-group">
                        <input type="text" name="studentNumber" id="sn" class="form-control" placeholder="iPad Usage" pattern="[1-2](0|9)([1-9]{2,2})-[0-9]{5,5}">
                        </input>
                        <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                        </span>
                    </div>
                </form>
                </div>
            <div class="col-sm-4">
                <form action="ajax/input.php" method="post" class="ajax">
                    <div class="input-group">
                        <input type="text" name="studentNumber" id="sn" class="form-control" placeholder="Yung isa pa di ko maalala" pattern="[1-2](0|9)([1-9]{2,2})-[0-9]{5,5}">
                        </input>
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Go!</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <br/>
        <div class="row"> <!--table for time-in>-->
            <div class="table-responsive col-lg-6">
                <table class="table table-sm table-striped table-hover " id="tableHolder"> 
                    <thead>
                        <tr>
                            <th>Transaction Number</th>
                            <th>Student Number</th>
                            <th>Time-in</th>
                            <th>Time-out</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
            </div>      <!--table for time-out-->
            <div class="table-responsive col-lg-6">
                <table class="table table-sm table-striped table-hover " id="tableHolder1"></table>
            </div>
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
        $('#tableBody').load('ajax/display.php', function(){
           setTimeout(refreshTable, 2500);
        });
        //ID 2
       
    }
</script>

<script>
    $(document).ready(function(){
      refreshTable1();
     
    });
    function refreshTable1(){
     $('#tableHolder1').load('ajax/displayTimeOut.php', function(){
           setTimeout(refreshTable1, 2500);
        });
        //ID 3
}

        
</script>
<script>
$(document).ready(function(){

        $("#tableBody").on('click','.btnSelect',function(){
             // get the current row
             var that=$(this);
             var data=that.attr('id');
             $.ajax({
                url:'ajax/timeout.php',
                method:'POST',
                data:{tranNum:data},
                success: function(response){
                    $("#result").html(response);
                }
             });
             
        });
        
    });//ID 1
</script>

    <script src="js/input.js"></script>