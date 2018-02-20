<!DOCTYPE html>
<html lang="en">
    <head>
    <title>UPB Library</title>
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css">
    <link rel="stylesheet" type="text/css" href="js/mdb.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="material/material.min.css">
<script src="material/material.min.js"></script>
    <script src="js/mdb.min.js"></script>
   <script src="js/jquery.min.js"></script>
    <script defer src="js/fa.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #8E1538;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html" style="color:#FFFFFF;"><img src="uplogo.png" width="60" height="60" alt="">  UPB Library</img></a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="SNumbers.php" style="color:white;"> Students <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php" style="color:white;"> Report <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <span class="navbar-text">
            Navbar text with an inline element
        </span>
    </div>
    </nav>
    <br/><br/>
    <div>
        <button class='btn btn-unique btn-md' data-toggle='modal' data-target='#myModal2'>New Student</button>
    </div>
        <div class="container">
        <?php
        include 'ajax/conn.php';
    
        $sql="SELECT * FROM student";
        $result=mysqli_query($connect,$sql);
        echo "<table id="."'tableHolder'"." class="."table table-sm".">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Degree Program</th>
                        <th>Time Remaining</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        while($row=mysqli_fetch_row($result)){
            echo "<tr>
                    <td><button type="."'button'"." class="."'btn btn-unique btn-md'"." data-toggle="."'modal'"." data-target="."'#myModal'"." id=".$row[0].">".$row[0]."</button></td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>";
                    $timerem=$row[5]/3600;
                    if(!function_exists('ceiling')){
                        function ceiling($number, $significance = 1){
                        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
                        }
                    }
                    $timerem=ceiling($timerem,0.005);   //ID 7
                    echo "$timerem hours</td>
                    <td><button type='button' class='btn btn-unique btn-md' data-toggle='modal' data-target='#myModal1' id=".$row[0].">UPDATE</button>
                    <input type='hidden' value=$row[0] class='hideme'/>
                    <button type='button' class='btn btn-unique btn-md delete' id=".$row[0].">DELETE</button>
                    <button type='button' class='btn btn-unique btn-md reset' id=".$row[0].">RESET</button>
                    
                    </td>
                </tr>";
        }
        echo "  </tbody>
            </table>";
        ?>
        </div>
        <div class="row" id="reset">
            <button id="resetall" data-toggle="confirmation" class="btn btn-unique" onclick="resetall();">RESET ALL</button>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table id="tableHolder1">
                            <thead>
                                <tr>
                                    <th>Transaction Number</th>
                                    <th>Time-in</th>
                                    <th>Time-out</th>
                                </tr>
                            </thead>
                            <tbody id="display">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="ajax/submitupdate.php" method="post" class="ajax1">
                            <div id="update">
                                
                            </div>
                            <button type="submit" class="btn btn-unique" id="test">UPDATE</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-unique" data-dismiss="modal" onclick="location.reload();" >Close</button>
                    </div>
                </div>
            </div>    
        </div>
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>New Student</b>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="ajax/newstudent.php" method="post" class="ajax1">
                            <label>Student Number:</label>
                                <input type="text" name="sn"></input>
                            <label>Name:</label>
                                <input type="text" name="name"></input>
                            <label>Academic Program:</label>
                                <input type="text" name="ap"></input>
                            <label>Tuition Discount:</label>
                                <input type="text" name="td"></input>
                            <label>Tuition Bracket:</label>
                                <input type="text" name="tb"></input>
                                <button type="submit" class="btn btn-unique" id="test" onclick="success();">SUBMIT</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="delete">
        </div>
        <div id="reset1">

        </div>
    </body>
</html>
<script src="sweetalert2.all.js"></script>
<script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap-confirmation.js"></script>

<script>
    $(document).ready(function(){
        load();
    });
    function load(){
    
            
        $("#tableHolder").on('click','.btn',function(){
             // get the current row
  
             $('#tableHolder1').DataTable();
             $('#tableHolder1').DataTable().destroy();
             var that=$(this);
             var data=that.attr('id');
             $('#display').load("ajax/students.php",{student:data},function(){
                $('#tableHolder1').DataTable();
             });
            
           
        });
    }
    
</script>
<script type="text/javascript">
   $('#tableHolder').on('click','.delete', function(){
        swal({
  title: 'Are you sure you want to delete?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, DELETE!'
}).then((result) => {
  if (result.value) {
    swal(
      'DELETE Complete',
      'Reloading page, please wait',
      'success'
    )
    var that=$(this);
    
    var data=that.attr('id');
    $('#delete').load("ajax/delete.php",{student:data},function(){
        location.reload();        
    });
    }
    })   
        
    });

</script>
<script>
    $(document).ready(function(){
        $("#tableHolder").on('click','.btn',function(){
             var that=$(this);
             var data=that.attr('id');
             $('#update').load("ajax/update.php",{student:data},function(){
             });
             
        });
        
        
        
    });
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tableHolder').DataTable();
        
    });
</script>

<script type="text/javascript">
    function resetall(){
        swal({
  title: 'Are you sure you want to reset all time remaining?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, RESET ALL!'
}).then((result) => {
  if (result.value) {
    swal(
      'Reset Complete',
      'Reloading page, please wait',
      'success'
    )
    $('#reset').load("ajax/resetall.php",function(){
        location.reload();
    });
    }
    })   
    } 
 
</script>
<script>
    function success(){
        swal(
            'Student Entered!',
            'Please wait, the page is reloading',
            'success'
        )
        setTimeout(function(){
            location.reload();
        }, 1000);
    }
</script>
<script>
   $('#tableHolder').on('click','.reset',function(){
        swal({
  title: 'Are you sure you want to reset this students time remaining?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, RESET!'
}).then((result) => {
  if (result.value) {
    swal(
      'Reset Complete',
      'Reloading page, please wait',
      'success'
    )
    var that=$(this);
    var data=that.attr('id');
    $('#reset1').load("ajax/resetstudent.php",{student:data},function(){
        location.reload();        
    });
    }
    })
    });
</script>
<script>
    $("form.ajax1").on("submit",function(){
    var that= $(this),
        url=that.attr('action'),
        type=that.attr('method'),
        data={};
        
    that.find('[name]').each(function(index, value) {
        var that=$(this),
            name=that.attr('name'),
            value=that.val();
            data[name]=value;
    });
            
            
    $.ajax({
        url:url,
        type:type,
        data:data,
        success: function(response){
            console.log(response);
        }
    });
        return false;;
});</script>
