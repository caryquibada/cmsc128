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
    <link type="text/css" href="css/dataTables.checkboxes.css" rel="stylesheet" />
    <script type="text/javascript" src="js/dataTables.checkboxes.min.js"></script>
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
    <script type="text/javascript" src="js/stringMonthYear.js"></script>
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
                <a class="nav-link" href="SNumbers.php" style="color:white;"> Students <span class="sr-only">(current)</span></a>
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
    <br/><br/>
    <div id="unlock_div" class="form-inline offset-md-2"><br/><label>Enter password: </label><input class="form-control col-sm-6" type="password" id="pswd"></input><input type="button" class="btn btn-unique col-sm-2" value="Unlock" id="unlock"></input>
    </div>
<div id="lock">
    <form id="timeout">
    <div class="col-sm-12">
        <div class="row">
            <label>From:</label>
            <div class="col-sm-3">
                <input type="date" id="fromtime"></input>
            </div>
        
            <label>To:</label>
            <div class="col-sm-3">
                <input type="date" id="totime"></input>
            </div>
            <label>By:</label>
            <div class="col-sm-3">
                <select id="by" class='custom-select'>
                    <option value="all">ALL</option>
                    <optgroup label="Transactions">
                    <option value="Computer_Usage">Computer Usage</option>
                    <option value="Power_Usage">Power Usage</option>
                    <option value="iPad_Usage">iPad Usage</option>
                    <option value="E-Resources">E-Resources</option>
                    </optgroup>
                    <optgroup label="Paid Services">
                    <option value="Printing">Printing</option>
                    <option value="Scanning">Scanning</option>
                    <option value="pComputer_Usage">Paid Computer Usage</option>
                    </optgroup>
                    <optgroup label="Visitor Services">
                    <option value="vComputer_Usage">Computer Usage</option>
                    <option value="vPower_Usage">Charging</option>
                    <option value="viPad_Usage">iPad Usage</option>
                    </optgroup>
                </select>
            </div>
            <button id="report" onclick="load()" class="col-sm-2 btn btn-unique">GENERATE</button>
            
        </div>
    </div>
    <br/>
    <div class="col-sm-12">
        <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#transactions" role="tab" aria-controls="home">Transaction</a>
                </li>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#home" role="tab" aria-controls="home">Hour</a>
                </li>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Day</a>
                </li>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Week</a>
                </li>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-controls="settings">Month</a>
                </li>
                <br/>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#course" role="tab" aria-controls="settings">Course</a>
                </li>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#college" role="tab" aria-controls="settings">College</a>
                </li>
                <li class="nav-item payment" >
                  <a class="nav-link" data-toggle="tab" href="#paidservices" role="tab" aria-controls="settings">Paid Services</a>
                </li>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#peak" role="tab" aria-controls="settings">Peak Hours</a>
                </li>
                <li class="nav-item transaction" >
                  <a class="nav-link" data-toggle="tab" href="#lean" role="tab" aria-controls="settings">Lean Hours</a>
                </li>
                <li class="nav-item payment" >
                  <a class="nav-link" data-toggle="tab" href="#permonthpaid" role="tab" aria-controls="settings">Month (Paid)</a>
                </li>
                <li class="nav-item visitor" >
                  <a class="nav-link" data-toggle="tab" href="#permonthvis" role="tab" aria-controls="settings">Month (Visitor)</a>
                </li>
                <li class="nav-item visitor" >
                  <a class="nav-link" data-toggle="tab" href="#vis" role="tab" aria-controls="settings">Visitor Transactions</a>
                </li>
              </ul>
              
            <div class="tab-content">
                <div class="tab-pane" id="transactions" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tableTransactions"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane active-in" id="home" role="tabpanel">
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
                <div class="tab-pane" id="permonthpaid" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerMonthPaid"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="permonthvis" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePerMonthVis"> 
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="vis" role="tabpanel">
                    <div class="table-responsive col-lg-12"><br/>
                        <table class="table" id="tablePaidVis"> 
                        </table>
                    </div>
                </div>
            </div>
        
    </div>
    
    <div id="password"></div>
    
    
    <button class='btn btn-unique btn-md' data-toggle='modal' data-target='#myModal2'>DELETE TRANSACTIONS</button>
    <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>Delete Transaction</b>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="ajax/deleteyear.php" method="post" class="ajax1">
                            <label>From:</label>
                                <input type="date" name="from" required></input>
                            <label>To:</label>
                                <input type="date" name="to" required></input>
                            
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-unique" id="test">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>


<script>
    $(document).ready(function(){
        
        $('#password').load('ajax/loadpassword.php',function(){
             
        });
        $('.transaction').hide();
        $('.payment').hide();
        $('.visitor').hide();
        $('#lock').hide();
    });
    function load(){
            var data={};
             var from=$("#fromtime");
             var to=$("#totime");
             var by=$("#by");
             if(by.val()=='Computer_Usage'||by.val()=='iPad_Usage'||by.val()=='E-Resources'||by.val()=='Power_Usage'){
                $('.transaction').show();
                $('.payment').hide();
                $('.visitor').hide();
             }else if(by.val()=='all'){
                 $('.transaction').show();
                 $('.payment').show();
                 
                $('.visitor').show();
             }else if(by.val()=='pComputer_Usage'||by.val()=='Scanning'||by.val()=='Printing'){
                if(by.val()=='pComputer_Usage'){
                    by.val('Computer_Usage');
                }
                $('.transaction').hide();
                 $('.payment').show();
                $('.visitor').hide();
             }else{
                if(by.val()=='vComputer_Usage'){
                    by.val('Computer_Usage');
                }else if(by.val()=='vPower_Usage'){
                    by.val('Power_Usage');
                }else if(by.val()=='viPad_Usage'){
                    by.val('iPad_Usage');
                }
                $('.visitor').show();
                $('.transaction').hide();
                 $('.payment').hide();
             }
             
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
                    ],
                    "columnDefs": [
                        { "type": "stringMonthYear", targets: 0 }
                    ]
                });

            });
            $('#tablePerMonthPaid').load("ajax/permonthpaid.php",data,function(){
                $('#tablePerMonthPaid').DataTable();
                $('#tablePerMonthPaid').DataTable().destroy();
                $('#tablePerMonthPaid').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "columnDefs": [
                        { "type": "stringMonthYear", targets: 0 }
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
                    ],
                    "columnDefs": [
                        { "type": "stringMonthYear", targets: 0 }
                    ]
                });

            });
            $('#tableTransactions').load("ajax/displaytransactions.php",data,function(){
                $('#tableTransactions').DataTable();
                $('#tableTransactions').DataTable().destroy();
                $('#tableTransactions').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "columnDefs": [
                        { "type": "stringMonthYear", targets: 0 }
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
            $('#tablePaidVis').load("ajax/displaypaidvisreport.php",data,function(){
                $('#tablePaidVis').DataTable();
                $('#tablePaidVis').DataTable().destroy();
                $('#tablePaidVis').DataTable({
                    "pageLength": 50,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            $('#tablePerMonthVis').load("ajax/permonthvis.php",data,function(){
                $('#tablePerMonthVis').DataTable();
                $('#tablePerMonthVis').DataTable().destroy();
                $('#tablePerMonthVis').DataTable({
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
        $("#test").on("click",function(){
            swal({
                title: 'Are you sure you want to delete entries in a specified interval? Print entries before doing so.',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, DELETE!'
            }).then((result) => {
                if (result.value) {
                    var that= $('.ajax1'),
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
            
            swal(
        'Deletion Complete',
        'Reloading page, please wait',
        'success'
            )
        }
    });
    
    }
    })  
        
});
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
    