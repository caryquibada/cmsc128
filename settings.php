<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UPB Library</title>
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css">
    <link rel="stylesheet" href="sweetalert2.css">

    <script src="sweetalert2.all.js"></script>
    <script src="js/jquery.min.js"></script>
    <script defer src="js/fa.js"></script>
    <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <style>
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
            <li class="nav-item active">
                <a class="nav-link" href="paidusage.html" style="color:white;"> Paid Services <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="outsiders.html" style="color:white;"> Visitor Services <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="passwordstudents.html" style="color:white;"> Students <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="passwordreport.html" style="color:white;"> Report <span class="sr-only">(current)</span></a>
                </li>
        </ul>
        <div style="color:white">
            <a style="color:white" href="settings.php"><i class="fas fa-cog fa-2x"></i></a>
        </div>
    </div>
    </nav>
    <br/>
    <form class="ajax1" action="ajax/changesettings.php" method="POST">
        <div class="container">
            <div id="items">
    
            </div>
            
            <input type="submit" class="btn btn-danger" value="Apply Changes" onclick="success();"></input>
        </div>
    </form>
    </body>
</html>

<script>
$(document).ready(function(){
    var data={};
    setTimeout(function(){
        $('#items').load('ajax/settingitems.php',function(){
             
        });
    });
    $('#confirmTimeouts').prop('indeterminate', true)
    $('#chargeComputer').prop('indeterminate', true)
    

    
    $("form.ajax1").on("submit",function(){
    
        if ($('#chargeComputer').is(":checked")) {
                data['computer']=1;
                
            }else{
                data['computer']=0;
            }
            if ($('#confirmTimeouts').is(":checked")) {
                data['confirm']=1;
            }else{
                data['confirm']=0;
            }    
        var that= $(this),
        url=that.attr('action'),
        type=that.attr('method');
            
    $.ajax({
        url:url,
        type:type,
        data:data,
        success: function(response){
        }
    });
        return false;
    });
});
</script>
<script>
    function success(){
        swal({
  type: 'success',
  title: 'Your settings have been saved',
  showConfirmButton: false,
  timer: 1000
})
    }
</script>