<?php 
    static $number = 1;
    $hoTen = $_POST["hoTen"];
    $thang = $_POST["thang"];
    $nam = $_POST["nam"];
    $chiSoDau = $_POST["chiSoDau"];
    $chiSoCuoi = $_POST["chiSoCuoi"];

    if(file_exists("electric.txt")) {
        $fh = fopen("electric.txt", "a");
    } else {
        $fh = fopen("electric.txt", "w");
    }

    $filePath = "electric.txt";
    $index = count(file($filePath));


    if(isset($_POST["createElectric"])) {
        fwrite($fh, ++$index."\t".$hoTen."\t".$thang."\t".$nam."\t".$chiSoDau."\t".$chiSoCuoi."\n");
    }
    fclose($fh);

    header('Location: '."http://localhost/NVV/electric.php");
?>