<?php
mysql_connect("sql7.cpt3.host-h.net","mcsaawaays_2_r","yNqWJZR8");
mysql_select_db("mcsa_pms");
$fullurl=$_SERVER['QUERY_STRING'];
$sname=substr($fullurl,1+strpos($fullurl,'='));
$sel="SELECT * from pms_pers where surname like '" . substr($sname,0,2) . "%' and name like '" . substr($sname,2,2) . "%' and pfnum='" . substr($sname,4) . "'";
$sql=mysql_query($sel);
while ($res=mysql_fetch_array($sql,MYSQL_ASSOC)){
    print "<h3>" . $res['SURNAME'] . ", " . $res['NAME'];
    if (strlen($res['REASONEXIT'])>1){
         if ($res['SURNAME']<>"MBONANE"){
         print " [" . $res['REASONEXIT'] . "]";
         }
    }
    print  "</h3>";
    if (strlen($res['PERCLASS'])>1){
        print $res['PERCLASS'] . "<br>";
    }
    if ((strlen($res['PERSTATUS'])>1) and  (strlen($res['REASONEXIT'])<1)){
        print $res['PERSTATUS'] . "<br>";
    }
    if (strlen($res['DEGREES'])>1){
        print "Academic qualification: " . $res['DEGREES'] . "<br>";
    }
    $ddccsss=$res['DDCCSSS'];
    $ppf=$res['PFNUM'];
    $vvvid=taxonomy_vocabulary_machine_name_load('circuits')->vid;
    if (strlen($ddccsss)==7){
        $circ=substr($ddccsss,0,4);
    } else {
        $circ="0" . substr($ddccsss,0,3);
    }
    if ($vterms = taxonomy_get_tree($vvvid)) {
        foreach ($vterms as $vterm) {
            if (substr($vterm->name,0,4)==$circ){
                $vlink=str_replace(" ","-",strtolower($vterm->name));
                $vlink=str_replace("/","",$vlink);
                $currentstation="<a href=\"/circuit/$vlink\">" . $vterm->name . "</a>";
            }
         }
     }
    if ($circ=="0100"){
        $currentstation="<a href=\"/districts/cape-of-good-hope\">0100 CAPE OF GOOD HOPE DISTRICT</a>";
    } elseif ($circ=="0200"){
        $currentstation="<a href=\"/districts/grahamstown\">0200 GRAHAMSTOWN DISTRICT</a>";
    } elseif ($circ=="0300"){
        $currentstation="<a href=\"/districts/queenstown\">0300 QUEENSTOWN DISTRICT</a>";
    } elseif ($circ=="0500"){
        $currentstation="<a href=\"/districts/kimberley-namibia-and-bloemfontein\">0500 KNB DISTRICT</a>";
    } elseif ($circ=="0600"){
        $currentstation="<a href=\"/districts/northern-freestate-and-lesotho\">0600 NORTHERN FREE STATE AND LESOTHO DISTRICT</a>";
    } elseif ($circ=="0700"){
        $currentstation="<a href=\"/districts/natal-coastal\">0700 NATAL COASTAL DISTRICT</a>";
    } elseif ($circ=="0800"){
        $currentstation="<a href=\"/districts/natal-west\">0800 NATAL WEST DISTRICT</a>";
    } elseif ($circ=="0900"){
        $currentstation="<a href=\"/districts/central\">0900 CENTRAL DISTRICT</a>";
    } elseif ($circ=="1000"){
        $currentstation="<a href=\"/districts/highveld-and-swaziland\">1000 HIGHVELD AND SWAZILAND DISTRICT</a>";
    } elseif ($circ=="1100"){
        $currentstation="<a href=\"/districts/limpopo\">1100 LIMPOPO DISTRICT</a>";
    } elseif ($circ=="1200"){
        $currentstation="<a href=\"/districts/mocambique\">1200 MOCAMBIQUE DISTRICT</a>";
    } elseif ($circ=="1300"){
        $currentstation="<a href=\"/districts/clarkebury\">1300 CLARKEBURY DISTRICT</a>";
    } 
}
if ($currentstation<>""){
    print "Current circuit: " . $currentstation . "<br>";
}
$selad="SELECT statname, phoneoffice from pms_addr where DDCCSSS='$ddccsss'";
$sqlad=mysql_query($selad);
while ($resad=mysql_fetch_array($sqlad,MYSQL_ASSOC)){
    if ($resad['statname']<>"DECEASED"){
        print "Station name: <u>" . $resad['statname'] . "</u><br>";
    }
    if (strlen($resad['phoneoffice'])>1){
        print "[Office telephone number: " . $resad['phoneoffice'] . "]<br>";
    }
}
$sel2="SELECT pms_history.DDCCSSS,pms_history.YEAR as yy from pms_history,pms_pers where pfno=pfnum and pfno='" . $ppf . "' and pms_history.DDCCSSS<>0 order by yy DESC";
$sql2=mysql_query($sel2);
$enyr="";
$styr="";
$curcirc="";
$history="";
while ($res2=mysql_fetch_array($sql2,MYSQL_ASSOC)){
    $ddccsss2=$res2['DDCCSSS'];
    if (strlen($ddccsss2)==7){
         $circ2=substr($ddccsss2,0,4);
     } else {
        $circ2="0" . substr($ddccsss2,0,3);
     }
     if ($vterms2 = taxonomy_get_tree($vvvid)) {
        foreach ($vterms2 as $vterm2) {
            if (substr($vterm2->name,0,4)==$circ2){
                $vlink2=str_replace(" ","-",strtolower($vterm2->name));
                $vlink2=str_replace("/","",$vlink2);
                $neatlink="<a href=\"/circuit/$vlink2\">" . $vterm2->name . "</a>";
                //print $res2['yy'] . " " . $neatlink . "<br>";
            }
       }
    }
    if ($circ2=="0100"){
        $neatlink="<a href=\"/districts/cape-of-good-hope\">0100 CAPE OF GOOD HOPE DISTRICT</a>";
    } elseif ($circ2=="0200"){
        $neatlink="<a href=\"/districts/grahamstown\">0200 GRAHAMSTOWN DISTRICT</a>";
    } elseif ($circ2=="0300"){
        $neatlink="<a href=\"/districts/queenstown\">0300 QUEENSTOWN DISTRICT</a>";
    } elseif ($circ2=="0500"){
        $neatlink="<a href=\"/districts/kimberley-namibia-and-bloemfontein\">0500 KNB DISTRICT</a>";
    } elseif ($circ2=="0600"){
        $neatlink="<a href=\"/districts/northern-freestate-and-lesotho\">0600 NORTHERN FREE STATE AND LESOTHO DISTRICT</a>";
    } elseif ($circ2=="0700"){
        $neatlink="<a href=\"/districts/natal-coastal\">0700 NATAL COASTAL DISTRICT</a>";
    } elseif ($circ2=="0800"){
        $neatlink="<a href=\"/districts/natal-west\">0800 NATAL WEST DISTRICT</a>";
    } elseif ($circ2=="0900"){
        $neatlink="<a href=\"/districts/central\">0900 CENTRAL DISTRICT</a>";
    } elseif ($circ2=="1000"){
        $neatlink="<a href=\"/districts/highveld-and-swaziland\">1000 HIGHVELD AND SWAZILAND DISTRICT</a>";
    } elseif ($circ2=="1100"){
        $neatlink="<a href=\"/districts/limpopo\">1100 LIMPOPO DISTRICT</a>";
    } elseif ($circ2=="1200"){
        $neatlink="<a href=\"/districts/mocambique\">1200 MOCAMBIQUE DISTRICT</a>";
    } elseif ($circ2=="1300"){
        $neatlink="<a href=\"/districts/clarkebury\">1300 CLARKEBURY DISTRICT</a>";
    } 
    if ($enyr==""){
        $enyr=$res2['yy'];
        $curcirc=$neatlink;
        $styr=$res2['yy'];
    } else {
        if ($curcirc<>$neatlink){
            $history.="<br>" . $styr . " - " . $enyr . " " . $curcirc;
            $enyr=$res2['yy'];
            $curcirc=$neatlink;
            $vlasty=$styr-1;
        } else {
            $styr=$res2['yy'];
            $vlasty=$styr;
        }
    }
}
print "<br><u>Stationing history</u>" . $history . "<br>" . $vlasty . " - " . $enyr . " " . $curcirc;
?>