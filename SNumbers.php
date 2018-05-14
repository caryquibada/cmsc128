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
    <link rel="stylesheet" type="text/css" href="css/dataTables.checkboxes.css">

    <script src="js/mdb.min.js"></script>
   <script src="js/jquery.min.js"></script>
    <script defer src="js/fa.js"></script>
    <script src="material/material.min.js"></script>
    <style>
    .btn-danger,.btn-danger:active{
    background-color:#8E1538;
    outline:#8E1538;
}
.btn-danger:hover{
    background-color:white;
    color:grey;
}
.btn{
    border: 0;
}
    </style>
    </head>
    <body>
    <nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #8E1538;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html" style="color:#FFFFFF;"><img src="uplogo.png" width="60" height="60" alt="">  UPB Library</img></a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="paidusage.html" style="color:white;"> Paid Services <span class="sr-only">(current)</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="outsiders.html" style="color:white;"> Staff/Visitor Services <span class="sr-only">(current)</span></a>
            </li>		
            <li class="nav-item active">
                <a class="nav-link" href="#" style="color:white;"><b> Students </b><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php" style="color:white;"> Report <span class="sr-only">(current)</span></a>
            </li>
        </ul><div style="margin-right:20px;margin-top:5px"><b id="currTime" style="color:white"></b></div>
        <div style="color:white">
            <a style="color:white" href="settings.php"><i class="fas fa-cog fa-2x"></i></a>
        </div>
    </div>
    </nav>
    <br/><br/>
    <div id="unlock_div" class="form-inline offset-md-2"><br/><label>Enter password: </label><input class="form-control col-sm-6" type="password" id="pswd"></input><input type="button" class="btn btn-unique col-sm-2" value="Unlock" id="unlock"></input>
    </div>
<div id="lock">
    <div>
        <button class='btn btn-unique btn-md' data-toggle='modal' data-target='#myModal2'>New Student</button>
    </div>
       <div id="loadstudents">
        </div>
        <div class="row" id="reset">
            <button id="resetall" data-toggle="confirmation" class="btn btn-unique" onclick="resetall();">RESET ALL</button>
            <button class="btn btn-unique" id="delSelect">DELETE SELECTED</button>
            <button class="btn btn-unique" onclick="help();">NEW STUDENT INSERTION HELP</button>
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
                                    <th>Tag Number</th>
                                    <th>Type</th>
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
                            
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-unique" id="test">UPDATE</button>
                        </form>
                        <button type="button" class="btn btn-unique" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>    
        </div>
        <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>Update time remaining</b>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="ajax/changetimerem.php" method="post" class="ajax3">
                            <div id="changetime">
                                
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-unique" id="timestudent">Update Time</button>
                        </form>
                        <button type="button" class="btn btn-unique" data-dismiss="modal">Close</button>
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
                        <form action="ajax/newstudent.php" method="post" class="ajax2">
                            <label>Student Number:</label>
                                <input type="text" name="sn" required pattern="[1-2](0|9)([1-9]{2,2})(-)?[0-9]{5,5}" maxlength='10'></input>
                            <label>Name:</label>
                                <input type="text" name="name" required placeholder="LASTNAME, Firstname M." maxlength='100'></input>
                            <label>Academic Program:</label>
                                <input type="text" name="ap" required pattern="[A-Z]{2,10}" maxlength='10'></input>
                            <label>Tuition Discount:</label>
                                <input type="text" name="td" maxlength='10'></input>
                            <label>Tuition Bracket:</label>
                                <input type="text" name="tb" pattern="[A-E]{1}|[]" maxlength='1'></input>
                               
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-unique" id="test">SUBMIT</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="delete">
        </div>
        <div id="reset1">

        </div>
        <div id="password"></div>
    </div>
    </body>
</html>
<script src="sweetalert2.all.js"></script>
<script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap-confirmation.js"></script>
<script type="text/javascript" src="js/dataTables.checkboxes.min.js"></script>

<script>
    $(document).ready(function(){
        $("#lock").hide();
    });
    
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
        load();        
    });
    }
    })   
        
    });
    

</script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
        $('#password').load('ajax/loadpassword.php',function(){
             
        });
    });
        
        
        
    });
    
</script>
<script type="text/javascript">
function load(){
    $('#loadstudents').load("ajax/loadstudents.php",function(){
            $('#tableHolder').DataTable();
            $('#tableHolder').DataTable().destroy();
            
       tbl =$('#tableHolder').DataTable({
                    'columnDefs': [
      {
         'targets': 0,
         'data':1,
         'checkboxes': {
            'selectRow': true
         }
      }
   ],
   'select': {
      'style': 'multi'
   },'pageLength' : 100
                
        });
        $("#tableHolder").on('click','.btn',function(){
             // get the current row

             var that=$(this);
             var data=that.attr('id');
             $('#display').load("ajax/students.php",{student:data},function(){
                 $('#tableHolder1').DataTable();
             });
            
           
        });
        
        $("#tableHolder").on('click','.update',function(){
             var that=$(this);
             var data=that.attr('id');
             $('#update').load("ajax/update.php",{student:data},function(){
                 
             });
             
        });
        $('#tableHolder').on('click','.changetime', function(){
        
        var that=$(this);
        var data=that.attr('id');
        $('#changetime').load("ajax/changetimestudent.php",{student:data},function(){        
        });
    });
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
                    success();
                    load();        
                });
            }
        })
    });
        });
}
var tbl;
    $(document).ready(function(){
        var d = new Date();
        document.getElementById("currTime").innerHTML = d.toDateString();
        load();
        
    });
    $('#delSelect').on('click',function(){
        var selectedIds = tbl.columns().checkboxes.selected()[0];
        if(selectedIds!=''){
            swal({
                title: 'Are you sure you want to delete '+selectedIds.length+' student/s?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, DELETE!'
            }).then((result) => {
                if (result.value) {
                    console.log(selectedIds);
                $.ajax({
                    type: "POST",
                    data: {IDS:selectedIds},
                    url: "ajax/deleteSelected.php",
                    success: function(msg){
                        success();
                        load();
                    }
                });
                }
            });
        }
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
                success();
                load();
            });
        }
        })   
    } 
 
</script>
<script>
    function successA(){
        swal(
            'Student Entered!',
            'Please wait, the page is reloading',
            'success'
        )
    }
    function success(){
        swal({
            type: 'success',
            title: 'Changes Saved',
            showConfirmButton: false,
            timer: 500
        })
    }
</script>
<script>
    $("form.ajax2").on("submit",function(){
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
        success: function(data){
            if(data=='0'){
                studentE();
            }else{
                successA();
                load();
            }
            console.log(response);
        }
    });
        return false;;
});

 $("form.ajax3").on("submit",function(){
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
     data['student']=that.find('input').attr('id');    
    $.ajax({
        url:url,
        type:type,
        data:data,
        success: function(data){
            success();
            load();
        }
    });
        return false;;
});
</script>
<script>
    function studentE() {
        swal({
            position: 'Middle',
            title: 'STUDENT IS IN DATABASE ALREADY',
            text: 'STUDENT NUMBER IS ALREADY IN DATABASE'
        
        });
        }
    function help(){
        swal({
            imageUrl: 'cmschelp.jpg',
            width: '1366px',
            imageWidth: 1366,
            imageHeight: 10752,
            imageAlt: 'A tall image'
        })
    }
</script>
<script>
    var input = document.getElementById("pswd");
    input.addEventListener("keyup", function(event) {
  // Cancel the default action, if needed
  event.preventDefault();
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Trigger the button element with a click
    document.getElementById("unlock").click();
  }
}); 
$('#unlock').click(function() {
    if($('#pswd').val()==$('#loaded').val()){
        $('#unlock_div').fadeOut();
        $(this).closest('div').siblings().fadeIn();
    }else{
        swal({
  type: 'error',
  title: 'Password Incorrect',
  showConfirmButton: false,
  timer: 1000
    });
        }
});
</script>
