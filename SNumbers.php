<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    </head>
    <body>
        
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
                    <td><button type="."'button'"." class="."'btn btn-info btn-lg'"." data-toggle="."'modal'"." data-target="."'#myModal'"." id=".$row[0].">".$row[0]."</button></td>
                    <td>$row[1]</td>
                </tr>";
        }
        echo "  </tbody>
            </table>";
        ?>
        
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
