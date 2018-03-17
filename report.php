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
    <script src="js/mdb.min.js"></script>
    <script defer src="js/fa.js"></script>
    <link rel="stylesheet" href="material/material.min.css">
    <script src="material/material.min.js"></script>

    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.flash.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>


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
                <a class="nav-link" href="SNumbers.php" style="color:white;"> Students <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="report.php" style="color:white;"> Report <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    </nav>
    <br/>
    <form id="timeout">
    <div class="col-sm-12">
        <div class="row">
        
        <label>From:</label>
            <div class="col-sm-4">
                <input type="text" id="fromtime" placeholder="YEAR-MONTH-DAY HOUR:MINUTE:SECOND"></input>
            </div>
        
            <label>To:</label>
            <div class="col-sm-4">
                <input type="text" id="totime" placeholder="YEAR-MONTH-DAY HOUR:MINUTE:SECOND"></input>
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
              </ul>
              
            <div class="tab-content">
                <div class="tab-pane active in" id="home" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerHour"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane active in" id="course" role="tabpanel">
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
            </div>
        
    </div>
    </form>
    <button id="report" onclick="load()" class="btn btn-unique">GENERATE</button>
    <div class="table-responsive col-lg-12">
                <table class="table table-lg table-bordered table-hover " id="tableHolder" > 
                </table>
            </div>
    </body>
</html>
<script src="sweetalert2.all.js"></script>
<script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


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
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                

            });
        }
    
</script>

