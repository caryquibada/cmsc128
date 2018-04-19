<?php
include 'conn.php';
$computerquery="SELECT charge_computer from settings";
$confirm="SELECT confirm_timeout from settings";
$computerresult=mysqli_query($connect,$computerquery);
$confirmresult=mysqli_query($connect,$confirm);
$computerrow=mysqli_fetch_array($computerresult);
$confirmrow=mysqli_fetch_array($confirmresult);

if($computerrow[0]==0){
    echo '<div class="col-sm-12"><div class="custom-control custom-checkbox">
    <input type="checkbox" id="chargeComputer"></input><label class="custom-control-label" for="customCheck1">Charge students remaining time when using computer?</label>
    </div></div>';
}else{
    echo '<div class="col-sm-12"><div class="custom-control custom-checkbox">
    <input type="checkbox" id="chargeComputer" checked></input><label class="custom-control-label" for="customCheck1">Charge students remaining time when using computer?</label>
    </div></div>';
}
if($confirmrow[0]==0){
    echo '<div class="col-sm-12"><div class="custom-control custom-checkbox">
    <input type="checkbox" id="confirmTimeouts"></input><label class="custom-control-label" for="customCheck1">Confirm on time-outs?</label>
    </div></div>';
}else{
    echo '<div class="col-sm-12"><div class="custom-control custom-checkbox">
    <input type="checkbox" id="confirmTimeouts" checked></input><label class="custom-control-label" for="customCheck1">Confirm on time-outs?</label>
    </div></div>';
}

?>