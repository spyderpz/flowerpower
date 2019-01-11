<?php

class product{

    function getproducts(){
        global $pdo;
        $productarray = [];
        $productquery = $pdo->prepare("SELECT * FROM producten");
        $productquery->execute(['persoonid' => $_SESSION['loggedin']]);
        $friendstring = $productquery->fetch();
        if($friendstring){
            $friendarray = explode(", ",$friendstring['friendId']);
            array_splice($friendarray,0,1);
            for($i=0;$i<sizeof($friendarray);$i++){
                $friendnamequery = $pdo->prepare("SELECT username,starttime,endtime FROM personen WHERE ID = :persoonid ");
                $friendnamequery->execute(['persoonid' => $friendarray[$i]]);
                $friendnameres = $friendnamequery->fetch();
                $friendnamearray[$friendarray[$i]] = $friendnameres['username'];
                $_SESSION['friendtimes'][$friendarray[$i]] = [];
                $_SESSION['friendtimes'][$friendarray[$i]][0] = $friendnameres['starttime'];
                $_SESSION['friendtimes'][$friendarray[$i]][1] = $friendnameres['endtime'];
            }
            return  $friendnamearray;
        }else{
            return false;
        }
    }

}