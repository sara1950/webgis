<?php

include 'login.php';


if (!$conn) {
    echo  "Error in connection: " . pg_last_error();
    }else{
        echo "";
    }




$id =$_POST["id"];

$upit = "SELECT zre_sap.id_arh_objekta, zre_sap.naziv_arh_objekta, zre_sap.posjednik, zre_sap.kat_cestica, zre_sap.kat_opc, zre_sap.grad, zre_sap.zk_cestica, zre_sap.procijena_pov, zre_vlasnici.vlasnici FROM zre_sap LEFT JOIN zre_vlasnici ON zre_sap.id_arh_objekta=zre_vlasnici.id_arh_objekta WHERE zre_sap.id_arh_objekta ='$id'";
$result= pg_query($conn, $upit);

while($rows = pg_fetch_assoc($result)) {
$id_objekta =$rows['id_arh_objekta'];
$naziv_objekta =$rows['naziv_arh_objekta'];
$posjednik =$rows['posjednik'];
$kat_cestica =$rows['kat_cestica'];
$kat_opc = $rows['kat_opc'];
$grad = $rows['grad'];
$zkc = $rows['zk_cestica'];
$povrsina = $rows['procijena_pov'];
$vlasnici = $rows['vlasnici'];


$rec[]=array(
    "id_objekta"=>$id_objekta,
    "naziv_objekta"=>$naziv_objekta,
    "posjednik"=>$posjednik,
    "kat_cestica"=>$kat_cestica,
    "kat_opcina"=>$kat_opc,
    "grad"=>$grad,
    "zkcestica"=>$zkc ,
    "povrsina"=>$povrsina,
    "vlasnici"=>$vlasnici
);

}


$response = json_encode($rec);
echo '{"result":'.$response.'}';

die;
