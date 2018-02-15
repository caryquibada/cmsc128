<!DOCTYPE html>
<html lang="en">
    <head>
    <title>UPB Library</title>
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css">
    <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">


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
        </ul>
        <span class="navbar-text">
            Navbar text with an inline element
        </span>
    </div>
    </nav>
    <br/><br/>
        <div class="container">
        <?php
        include 'ajax/conn.php';
    
        $sql="SELECT * FROM student";
        $result=mysqli_query($connect,$sql);
        echo "<table id="."'tableHolder'"." class="."table table-sm".">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Time Remaining</th>
                    </tr>
                </thead>
                <tbody>";
        while($row=mysqli_fetch_row($result)){
            echo "<tr>
                    <td><button type="."'button'"." class="."'btn btn-unique btn-md'"." data-toggle="."'modal'"." data-target="."'#myModal'"." id=".$row[0].">".$row[0]."</button></td>
                    <td>";
                    $timerem=$row[1]/3600;
                    if(!function_exists('ceiling')){
                        function ceiling($number, $significance = 1){
                        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
                        }
                    }
                    $timerem=ceiling($timerem,0.005);   //ID 7
                    echo "$timerem hours</td>
                </tr>";
        }
        echo "  </tbody>
            </table>";
        ?>
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
    </body>
</html>
<script src="sweetalert2.all.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/mdb.min.js"></script>
<script defer src="js/fa.js"></script>
<script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
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
        
        
        
    });
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tableHolder').DataTable();
        
    });
</script>
