<?php
require_once("../../model/php/core.php");

class medewerker extends user {
    function SetOrderStatus($userid,$orderid,$status){
        global $pdo;
        $newpersquery = $pdo->prepare("UPDATE bestellingen SET Status = :status,madeBy = :userid WHERE id = :orderid");
        $correct = $newpersquery->execute(['status' => $status, 'userid' => $userid, 'orderid' => $orderid]);
        return $correct;
    }

}