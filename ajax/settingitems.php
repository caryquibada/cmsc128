<?php
include 'conn.php';
$computerquery="SELECT charge_computer from settings";
$confirm="SELECT confirm_timeout from settings";
$computerresult=mysqli_query($connect,$computerquery);
$confirmresult=mysqli_query($connect,$confirm);
$computerrow=mysqli_fetch_array($computerresult);
$confirmrow=mysqli_fetch_array($confirmresult);

if($computerrow[0]==0){
    echo '<div class="col-sm-12">
    <input type="checkbox" id="chargeComputer">Charge students remaining time when using computer?</input>
    </div>';
}else{
    echo '<div class="col-sm-12">
    <input type="checkbox" id="chargeComputer" checked>Charge students remaining time when using computer?</input>
    </div>';
}
if($confirmrow[0]==0){
    echo '<div class="col-sm-12">
    <input type="checkbox" id="confirmTimeouts">Confirm on time-outs?</input>
    </div>';
}else{
    echo '<div class="col-sm-12">
    <input type="checkbox" id="confirmTimeouts" checked>Confirm on time-outs?</input>
    </div>';
}

?>