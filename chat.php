<?php

    require 'inc/db.php';

    session_start();

    $pid = $_SESSION['pid'];
    $id = $_SESSION['cid'];
    $jid = $_SESSION['jid'];
    if(isset($_SESSION['backid'])){
        $backid = $_SESSION['backid'];
    }
    $sql = "SELECT * from chat where pid=$pid and jid=$jid ORDER BY id ASC";
    $res = mysqli_query($con,$sql);

    if(mysqli_num_rows($res)){
        while($rows=mysqli_fetch_assoc($res)){
            ?>
            <div class="w3-small">
                <?php if($id==$rows['userid']){
                    ?>
                    <p class="w3-green w3-right w3-padding w3-round-large">You : <?php echo $rows['msg']; ?> &nbsp; &nbsp; <br> <span class="w3-tiny w3-padding"> <?php echo date("d.m.Y g:i A", strtotime($rows['created'])); ?> </span></p>
                    <?php
                }else{
                    ?>
                    <p class="w3-red w3-left w3-padding w3-round-large"><?php echo $rows['name']; ?> : <?php echo $rows['msg']; ?> &nbsp; &nbsp; <br> <span class="w3-tiny w3-padding"> <?php echo date("d.m.Y g:i A", strtotime($rows['created'])); ?> </span></>
                    <?php
                }  ?> 
            </div>
            <?php
        }
    }
       
    ?>
