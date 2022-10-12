<?php

function tanggal($date)
{
    // array hari dan bulan
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $Bulan = array(
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    );

    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;
    return $result;
}

function tanggal_jam($date)
{

    // array hari dan bulan
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $Bulan = array(
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    );

    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $waktu = substr($date, 11, 5);
    $hari = date("w", strtotime($date));
    $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;
    return $result;
}

function bulan($date)
{
    $Bulan = array(
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    );

    // pemisahan tahun, bulan, hari, dan waktu
    $bulan = substr($date, 5, 2);
    $result = $Bulan[(int)$bulan - 1];
    return $result;
}

function jam($date)
{
    // pemisahan tahun, bulan, hari, dan waktu
    $waktu = substr($date, 11, 5);
    $result = $waktu;
    return $result;
}

function romawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

function terbilang($bilangan)
{

    $angka = array(
        '0', '0', '0', '0', '0', '0', '0', '0', '0', '0',
        '0', '0', '0', '0', '0', '0'
    );
    $kata = array(
        '', 'satu', 'dua', 'tiga', 'empat', 'lima',
        'enam', 'tujuh', 'delapan', 'sembilan'
    );
    $tingkat = array('', 'ribu', 'juta', 'milyar', 'triliun');

    $panjang_bilangan = strlen($bilangan);

    /* pengujian panjang bilangan */
    if ($panjang_bilangan > 15) {
        $kalimat = "Diluar Batas";
        return $kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan,
       dimasukkan ke dalam array */
    for ($i = 1; $i <= $panjang_bilangan; $i++) {
        $angka[$i] = substr($bilangan, - ($i), 1);
    }

    $i = 1;
    $j = 0;
    $kalimat = "";


    /* mulai proses iterasi terhadap array angka */
    while ($i <= $panjang_bilangan) {

        $subkalimat = "";
        $kata1 = "";
        $kata2 = "";
        $kata3 = "";

        /* untuk ratusan */
        if ($angka[$i + 2] != "0") {
            if ($angka[$i + 2] == "1") {
                $kata1 = "seratus";
            } else {
                $kata1 = $kata[$angka[$i + 2]] . " ratus";
            }
        }

        /* untuk puluhan atau belasan */
        if ($angka[$i + 1] != "0") {
            if ($angka[$i + 1] == "1") {
                if ($angka[$i] == "0") {
                    $kata2 = "sepuluh";
                } elseif ($angka[$i] == "1") {
                    $kata2 = "sebelas";
                } else {
                    $kata2 = $kata[$angka[$i]] . " belas";
                }
            } else {
                $kata2 = $kata[$angka[$i + 1]] . " puluh";
            }
        }

        /* untuk satuan */
        if ($angka[$i] != "0") {
            if ($angka[$i + 1] != "1") {
                $kata3 = $kata[$angka[$i]];
            }
        }

        /* pengujian angka apakah tidak nol semua,
         lalu ditambahkan tingkat */
        if (($angka[$i] != "0") or ($angka[$i + 1] != "0") or
            ($angka[$i + 2] != "0")
        ) {
            $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
        }

        /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
         ke variabel kalimat */
        $kalimat = $subkalimat . $kalimat;
        $i = $i + 3;
        $j = $j + 1;
    }

    /* mengganti satu ribu jadi seribu jika diperlukan */
    if (($angka[5] == "0") and ($angka[6] == "0")) {
        $kalimat = str_replace("satu ribu", "seribu", $kalimat);
    }

    return trim($kalimat);
}
