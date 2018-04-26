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
    <script src="sweetalert2.all.js"></script>
    <script src="js/jquery.min.js"></script>
    <script defer src="js/fa.js"></script>
    <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.flash.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>
    <style>
    #wrapper ul {
  text-align: center;
}

#wrapper ul li {
  display: inline-block;
  float: none;
}
    .nav-pills>li.nav-item>a.active, .nav-pills>li.nav-item>a.hover, .nav-pills>li.active>a:focus{
background-color:#8E1538;
color:#FFFFFF;
}
.nav-pills>li.nav-item>a{
    color:grey;
}
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
                <a class="nav-link" href="outsiders.html" style="color:white;"> Visitor Services <span class="sr-only">(current)</span></a>
            </li>		
            <li class="nav-item">
                <a class="nav-link" href="passwordstudents.html" style="color:white;"> Students <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="report.php" style="color:white;"> Report <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div style="color:white">
            <a style="color:white" href="settings.php"><i class="fas fa-cog fa-2x"></i></a>
        </div>
    </div>
    </nav>
    <br/>
    <form id="timeout">
    <div class="col-sm-12">
        <div class="row">
        
        <label>From:</label>
            <div class="col-sm-4">
                <input type="date" id="fromtime"></input>
            </div>
        
            <label>To:</label>
            <div class="col-sm-4">
                <input type="date" id="totime"></input>
            </div>
        </div>
    </div>
    <br/>
    <div class="col-sm-12">
        <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#home" role="tab" aria-controls="home">Hour</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Day</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Week</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-controls="settings">Month</a>
                </li>
                <br/>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#course" role="tab" aria-controls="settings">Course</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#college" role="tab" aria-controls="settings">College</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#paidservices" role="tab" aria-controls="settings">Paid Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#paidcomputer" role="tab" aria-controls="settings">Paid Computer Usage</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#peak" role="tab" aria-controls="settings">Peak Hours</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#lean" role="tab" aria-controls="settings">Lean Hours</a>
                </li>
              </ul>
              
            <div class="tab-content">
                <div class="tab-pane active in" id="home" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerHour"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="course" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tableCourse"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerDay"> 
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerWeek"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerMonth"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="college" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerCollege"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="paidservices" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePaidServices"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="paidcomputer" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePaidComputerUsage"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="peak" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePeak"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="lean" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tableLean"> 
                        </table>
                    </div>
                </div>
            </div>
        
    </div>
    </form>
    <button id="report" onclick="load()" class="btn btn-unique">GENERATE</button>
    
    <button id="delete" class="btn btn-unique">DELETE 1 YEAR</button>
    </body>
</html>
<script type="text/javascript">
    $('#delete').on('click',function(){
        swal({
  title: 'Are you sure you want to delete entries in a years interval? Print entries before doing so.',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, DELETE!'
}).then((result) => {
  if (result.value) {
    swal(
      'Reset Complete',
      'Reloading page, please wait',
      'success'
    )
    $('#delete').load("ajax/deleteyear.php",function(){
        location.reload();
    });
    }
    })   
    }); 
 
</script>

<script>
    function load(){
            var data={};
             var from=$("#fromtime");
             var to=$("#totime");
             var by=$('input[name=by]:checked');
             data["by"]=by.val();
             data["from"]=from.val();
             data["to"]=to.val();

            $('#tablePerHour').load("ajax/perhour.php",data,function(){
                $('#tablePerHour').DataTable();
                $('#tablePerHour').DataTable().destroy();
                $('#tablePerHour').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

            });
            $('#tablePerDay').load("ajax/perday.php",data,function(){
                $('#tablePerDay').DataTable();
                $('#tablePerDay').DataTable().destroy();
                $('#tablePerDay').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

            });
            $('#tablePerWeek').load("ajax/perweek.php",data,function(){
                $('#tablePerWeek').DataTable();
                $('#tablePerWeek').DataTable().destroy();
                $('#tablePerWeek').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

            });
            $('#tablePerMonth').load("ajax/permonth.php",data,function(){
                $('#tablePerMonth').DataTable();
                $('#tablePerMonth').DataTable().destroy();
                $('#tablePerMonth').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                

            });
            $('#tableCourse').load("ajax/bycourse.php",data,function(){
                $('#tableCourse').DataTable();
                $('#tableCourse').DataTable().destroy();
                $('#tableCourse').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            $('#tablePaidServices').load("ajax/paidservices.php",data,function(){
                $('#tablePaidServices').DataTable();
                $('#tablePaidServices').DataTable().destroy();
                $('#tablePaidServices').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            $('#tablePaidComputerUsage').load("ajax/paidcomputerusage.php",data,function(){
                $('#tablePaidComputerUsage').DataTable();
                $('#tablePaidComputerUsage').DataTable().destroy();
                $('#tablePaidComputerUsage').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            $('#tablePerCollege').load("ajax/bycollege.php",data,function(){
                $('#tablePerCollege').DataTable();
                $('#tablePerCollege').DataTable().destroy();
                $('#tablePerCollege').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            $('#tablePeak').load("ajax/peakhours.php",data,function(){
                $('#tablePeak').DataTable();
                $('#tablePeak').DataTable().destroy();
                $('#tablePeak').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            $('#tableLean').load("ajax/leanhours.php",data,function(){
                $('#tableLean').DataTable();
                $('#tableLean').DataTable().destroy();
                $('#tableLean').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        }
    
</script>

    