<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    table {
        border-collapse: collapse;
        margin-top: 10px;
        text-align: end;
    }
    th, td {
        border: 1px solid;
        padding: 10px;
    }  
</style>
<body>
    <a href="./add-electric.html">
        <button>
        Thêm
        </button>
    </a>
    <table>
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Số điện tiêu thụ</th>
            <th>Thành tiền</th>
            <th>Thuế VAT(10%)</th>
            <th>Tổng tiền</th>
        </tr>
        <?php 
            if(file_exists("electric.txt")) {
                $fh = fopen("electric.txt", "r");
                while(!feof($fh)) {
                    $line = fgets($fh);
                    if(!empty($line)) {
                        $temp = explode("\t", $line);
                        $soDienTieuThu =  $temp[5] - $temp[4];
                        $thanhTien =  totalMoney($soDienTieuThu);
                        $vat = $thanhTien * 10 / 100;
                        $tongTien = $thanhTien + $vat;
                        ?>
                        <tr>
                            <td><?= $temp[0] ?></td>
                            <td><?= $temp[1] ?></td>
                            <td><?= $temp[2] ?></td>
                            <td><?= $temp[3] ?></td>
                            <td><?= $soDienTieuThu ?></td>
                            <td><?= $thanhTien ?></td>
                            <td><?= $vat ?></td>
                            <td><?= $tongTien ?></td>
                        </tr>
                        <?php
                    }
                }
                fclose($fh);
            }
        ?>
    </table>
</body>
</html>

<?php 
    function totalMoney($soDien) {
        if($soDien > 0 && $soDien <= 50) {
            return $soDien * 1678;
        } else if($soDien > 50 && $soDien <= 100) {
            return $soDien * 1734;
        } else if($soDien > 100 && $soDien <= 200) {
            return $soDien * 2014;
        } else if($soDien > 200 && $soDien <= 300) {
            return $soDien * 2536;
        } else if($soDien > 300 && $soDien <= 400) {
            return $soDien * 2834;
        } else {
            return $soDien * 2927;
        }
    }
?>