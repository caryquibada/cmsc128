$(document).ready(function(){
    
        $(".tdbutton").on('click',function(){
             // get the current row
             var that=$(this);
             var data=that.attr('id');
             $.ajax({
                url:'ajax/timeout.php',
                method:'POST',
                data:{tranNum:data},
                success: function(response){
                    $("#result").html(response);
                }
             });
             
        });
        
    });