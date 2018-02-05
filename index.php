<html>
    <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jq-3.2.1/dt-1.10.16/r-2.2.1/rr-1.2.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.2.1/dt-1.10.16/r-2.2.1/rr-1.2.3/datatables.min.js"></script>
    
    </head>
    <body>
        <form action="ajax/input.php" method="post" class="ajax">
        <input type="text" name="studentNumber" id="sn">
        </input>
        <input type="submit" value="Enter">
        </input>
        </br>
        </form>
       
    </body>
</html>
<script  src="http://code.jquery.com/jquery-3.3.1.js"
			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		    crossorigin="anonymous"></script>
    <script src="js/input.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>