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
                <a class="nav-link" href="SNumbers.php" style="color:white;"> Students <span class="sr-only">(current)</span></a>
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
    <br/>
    <form class="ajax1" action="ajax/changesettings.php" method="POST">
        <div class="container">
            <div id="items">
    
            </div>
            <input type="submit" class="btn btn-danger" value="Apply Changes" onclick="success();"></input>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger offset-md-5" data-toggle="modal" data-target="#exampleModalCenter">
                Change Password
            </button>

        </div>
    </form>
    <br>
    <button type="button" class="btn btn-danger offset-md-2" data-toggle="modal" data-target="#PCModal">
        Enable PC Tags
    </button>
    <button type="button" class="btn btn-danger offset-md-1" data-toggle="modal" data-target="#PowerModal">
        Enable Power Tags
    </button>


    <br/>
    <br/>
    <br/>
    <div id="password"></div>
    

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="ajax2" action="ajax/changepassword.php" method="POST">
      <label> Old Password: </label>
        <input type="password"  class="offset-sm-2" id="oldpassword" required></input>
        <br/>
        <label > New Password: </label>
        <input type="password" class="offset-md-2" name='password' id="newpassword" required></input>
        <br/>
        <label> Confirm New Password: </label>
        <input type="password" id="confirmpassword" required></input>
        <br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Change password</button>
    </form>  
    </div>
    </div>
  </div>
</div>
<!-- The Modal -->
<div class="modal" id="PCModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="ajax3" action="ajax/updatepctags.php" method="POST">
            <div id="tags">
            </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>

    </div>
  </div>
</div>
<div class="modal" id="PowerModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="ajax4" action="ajax/updatepowertags.php" method="POST">
            <div id="powertags">
            </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>

    </div>
  </div>
</div>
    </body>
</html>

<script>
$(document).ready(function(){
    var data={};
        var d = new Date();
        document.getElementById("currTime").innerHTML = d.toDateString();
    setTimeout(function(){
        $('#items').load('ajax/settingitems.php',function(){
             
        });
    });
    setTimeout(function(){
        $('#password').load('ajax/loadpassword.php',function(){
             
        });
    });
    $('#tags').load('ajax/enablecomputertags.php');
    $('#powertags').load('ajax/enablepowertags.php');
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
    $("form.ajax2").on("submit",function(){
        if((($('#loaded').val())==($('#oldpassword').val()))&&(($('#newpassword').val())==($('#confirmpassword').val()))){
            var that= $(this),
            url=that.attr('action'),
            type=that.attr('method');
            data['password']=$('#newpassword').val();
        $.ajax({
            url:url,
            type:type,
            data:data,
            success: function(response){
                pwsuccess()
            }
        });
        
        }else if(($('#newpassword').val())!=($('#confirmpassword').val())){
            pwfail2();
        }else{
            pwfail();
        }
            return false;
    });
    $("form.ajax3").on("submit",function(){
        var that= $(this),
            url=that.attr('action'),
            type=that.attr('method');
    var checkedtags = [];
        $('input.pc:checkbox:checked').each(function () {
            checkedtags.push($(this).val());
        });
    var uncheckedtags = [];
        $('input.pc:checkbox:not(:checked)').each(function () {
            uncheckedtags.push($(this).val());
        });
        data['checked']=checkedtags;
        data['unchecked']=uncheckedtags;
        $.ajax({
            url:url,
            type:type,
            data:data,
            success: function(response){
                success();
            }
        });
        return false;
    });
    $("form.ajax4").on("submit",function(){
        var that= $(this),
            url=that.attr('action'),
            type=that.attr('method');
    var checkedtags = [];
        $('input.power:checkbox:checked').each(function () {
            checkedtags.push($(this).val());
        });
    var uncheckedtags = [];
        $('input.power:checkbox:not(:checked)').each(function () {
            uncheckedtags.push($(this).val());
        });
        data['checked']=checkedtags;
        data['unchecked']=uncheckedtags;
        $.ajax({
            url:url,
            type:type,
            data:data,
            success: function(response){
                success();
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
    function pwsuccess(){
        swal({
  type: 'success',
  title: 'Your new password have been saved',
  showConfirmButton: false,
  timer: 1000
})
    }
    function pwfail(){
        swal({
  type: 'error',
  title: 'Old password incorrect',
  showConfirmButton: false,
  timer: 1000
})
    }
    function pwfail2(){
        swal({
  type: 'error',
  title: 'Unable to match new password and confirmation of new password',
  showConfirmButton: false,
  timer: 1000
})
    }
</script>