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
   <script src="js/jquery.min.js"></script>
    <script defer src="js/fa.js"></script>
    <link rel="stylesheet" href="material/material.min.css">
<script src="material/material.min.js"></script>

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
        <span class="navbar-text">
            Navbar text with an inline element
        </span>
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
        <div class="row">
            <label>Per:</label>
            <div class="col-sm-2">
                <select class="custom-select" id="per">
                    <option></option>
                    <option value="hour">Hour</option>
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                </select>
            </div>
            <label>By:</label>
            <div class="col-sm-2">
                <select class="custom-select">
                    <option>College</option>
                    <option>Course</option>
                </select>
            </div>
            <label>OR by highest amount of users per:</label>
            <div class="col-sm-2">
                <select class="custom-select">
                    <option>Hour</option>
                    <option>Day</option>
                    <option>Week</option>
                    <option>Month</option>
                </select>
            </div>
            
            
        </div>
        
    </div>
    </form>
    <button id="report" onclick="load();" class="btn btn-unique">GENERATE</button>
    <div class="table-responsive col-lg-12">
                <table class="table table-lg table-bordered table-hover " id="tableHolder"> 
                </table>
            </div>
    </body>
</html>
<script src="sweetalert2.all.js"></script>
<script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
        
        load();
      });
    function load(){
            var data={};
             var from=$("#fromtime");
             var to=$("#totime");
             var per=$("#per");
             data["from"]=from.val();
             data["to"]=to.val();
             data["per"]=per.val();
             
             setTimeout(function(){
                $('#tableHolder').load("ajax/displayTimeOut.php",data,function(){
                    $('#tableHolder').DataTable().destroy();
                    $('#tableHolder').DataTable();
                    $('#tableHolder').DataTable().css();
             });
             }, 500);

             
             
        }
    
</script>

