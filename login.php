<?php

$jelszo = fopen('password.txt', 'r');
$kodok = array(5, -14, 31, -9, 3);
$adat = '';
$sor = '';
$j = 0;
$index = 0;
while(!feof($jelszo))
{
    $sor = fgets($jelszo);
    $hossz = strlen($sor);
    for ($i = 0; $i < $hossz - 1; $i++) 
    { 
        $karakter = $sor[$i];
        if($karakter != 13)
        {
            $kod = ord($karakter);

            $betu = chr($kod - $kodok[$index]);

            $index++;

            if($index == 5)
            {
                $index = 0;
            }
            $adat = $adat.$betu;
        }				
    }

    $index = 0;
    $darabok = explode("*", $adat);
    $nevek[$j] = $darabok[0];
    $jelszavak[$darabok[0]] = $darabok[1];
    $j++;
    $adat = '';
}
fclose($jelszo);

if (isset($_POST['uname']) && isset($_POST['password']))
{
    $nev = $_POST['uname'];
    $pass = $_POST['password'];

    if (empty($nev)) {
		header("Location: index.php?error=Email kötelezo!");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Jelszó Kötelezo!");
	    exit();
    }

    foreach ($nevek as $i)
    {
        if(strcmp($i, $nev) == 0)
        {
            $van2 = true;
            if(strcmp($pass, $jelszavak[$i]) == 0)
            {
                $van = true;
                break;
            }
            else
            {
                header("Location: index.php?error=Hibas-jelszo!");
                sleep(3);
                header("Location: https://www.police.hu");  
                break;
            }
            if($van2 == false)
            {
                header("Location: index.php?error=Hibas-email!");
                break;
            }
        }
    }
    if($van == true)
    {
        $sname = "cpanel18";
        $unmae = "tromoshe_teszt2";
        $password = "TesztPass12";
        //$password = "n0DGIkVVNE";
        $db_name = "tromoshe_login_gedeon";

        $conn = mysqli_connect($sname, $unmae, $password, $db_name);

        $eredmeny = mysqli_query($conn, "SELECT Titkos FROM tabla WHERE Username = '$nev' ");
        // $nev = mysqli_query($conn, "SELECT Username FROM tabla WHERE Username = '$nev' ");
        $row = mysqli_fetch_array($eredmeny, MYSQLI_ASSOC);
        //$new = $row['Username'];
        $szin = $row['Titkos'];
        //header("Location: index.php"."$nev belépett!");
        //$kep = "$szin.png";
        print("<img src="."$szin.png".">");
        $conn->close();
    }
	
}
else
{
	header("Location: index.php");
	exit();
}
?>