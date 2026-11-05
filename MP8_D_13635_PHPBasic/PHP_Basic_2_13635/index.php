<?php

if ($_POST) {
    $bayaran = $_POST['bayaran'] ?? '';
    $kode = $_POST['kode'] ?? '';
    $harga = 50000;
    $message = array();
    $message2 = "";
    $bayarankembali = 0;

    if(empty($bayaran) || empty($kode)) {
        $message[] = "Harap lengkapi semua data.";
    }

    if(!preg_match("/^[0-9]*$/", $bayaran)) {
        $message[] = "jumlah bayaran hanya boleh mengandung angka.";
    }

    if(!preg_match("/^[a-zA-Z ]*$/", $kode)) {
        $message[] = "jumlah bayaran hanya boleh mengandung huruf.";
    }
    
    if(!empty($message)) {
        foreach($message as $msg) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($msg) . " !!</p>";
        }
    }else{

        function kodeDiskon($kode){
            switch(strtolower($kode)) {
                case 'p';
                    $diskon= 0.05;
                    break;
                    case 'w':
                        $diskon = 0.02;
                        break;
                    case 'd':
                        $diskon = 0.10;
                        break;
                    default:
                        $diskon = 0;
            }
            return $diskon;
        }

        $diskon = kodeDiskon($kode);

        function totalBayar($harga, $diskon){
            return $harga - ($harga * $diskon);
        }

        $totalBayar = totalBayar($harga, $diskon);

        function pembayaran($bayaran, $totalBayar){
            if($bayaran < $totalBayar) {
                return null;
            } else {
                $bayarankembali = $bayaran - $totalBayar;
                return $bayarankembali;
            }
        }

        $bayarankembali = pembayaran($bayaran, $totalBayar);

        if($bayarankembali === null) {
            $message2 = "Jumlah yang dibayar kurang dari total pembayaran. Silakan bayar sesuai jumlah yang ditentukan.";
            $bayarankembali = 0;
        }

        if(!empty($message2)) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($message2) . " !!</p>";
        }else{
            echo "<h2>Informasi pembayaran</h2>";
            echo "<p><strong>Jumlah yang  dibayar: </strong> Rp" . htmlspecialchars($bayaran) . "</p>";
            echo "<p><strong>kode diskon: </strong> " . htmlspecialchars($kode) . "</p>";

            if($diskon == 0) {
                echo "<p>Maaf kode diskon tidak valid. tidak ada diskon yang diberikan. </p>";
            }else {
                echo "<p>selamat! Anda mendapatkan diskon " . (htmlspecialchars($diskon * 100)) . "% berkat nomor kode diskon anda.</p>"
            }
            echo '<p style="font-weight: bold; bold; font-size: 18px;">Total pembayaran : Rp' . htmlspecialchars($totalbayar) . '</p>';
            echo '<p style="font-weight: bold; bold; font-size: 18px;">kembalian : Rp' . htmlspecialchars($bayarankembali) . '</p>';
        }
    }    
}else{
    echo "Silahkan isi formulir untuk melakukan pembayaran.";
}