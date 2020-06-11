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
    $pengguna = $_SESSION["nip"];
    $nosd = htmlspecialchars($data["nosd"]);
	$tglsd = $data["tglsd"];
	$nosmp = htmlspecialchars($data["nosmp"]);
    $tglsmp = $data["tglsmp"];
    $nosma = htmlspecialchars($data["nosma"]);
    $tglsma = $data["tglsma"];
    $nos1 = htmlspecialchars($data["nos1"]);
    $tgls1 = $data["tgls1"];
    
    $query = "INSERT INTO school VALUES ('', '', '$nosd', '$tglsd')
                WHERE nip = '$username'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}