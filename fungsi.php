<?php
$conn = mysqli_connect("localhost", "root", "", "pmk");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];;
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    // $query1 = mysqli_query($conn, "SELECT * FROM school WHERE nip = '$pengguna'");
    // $setbaris = mysqli_fetch_array($query1);
    $nosd = htmlspecialchars($data["nosd"]);
	$tglsd = $data["tglsd"];
	$nosmp = htmlspecialchars($data["nosmp"]);
    $tglsmp = $data["tglsmp"];
    $nosma = htmlspecialchars($data["nosma"]);
    $tglsma = $data["tglsma"];
    $nos1 = htmlspecialchars($data["nos1"]);
    $tgls1 = $data["tgls1"];
    
    $query = "UPDATE school SET nosd='$nosd', tglsd='$tglsd', nosmp='$nosmp', tglsmp='$tglsmp', nosma='$nosma', tglsma='$tglsma',nos1='$nos1', tgls1='$tgls1'
            WHERE nip = '".$_SESSION['nip']."'";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
    $pecahkan = explode('-', $tanggal);
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
    if ($pecahkan[0] == "0000") {
        echo "";
    } else {
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}
