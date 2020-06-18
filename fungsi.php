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
    // $query1 = mysqli_query($conn, "SELECT * FROM school WHERE nip = '$pengguna'");
    // $setbaris = mysqli_fetch_array($query1);
    // $nosd = $_POST["nosd"];
    $nosd = htmlspecialchars($data["nosd"]);
	// $tglsd = $data["tglsd"];
	// $nosmp = htmlspecialchars($data["nosmp"]);
    // $tglsmp = $data["tglsmp"];
    // $nosma = htmlspecialchars($data["nosma"]);
    // $tglsma = $data["tglsma"];
    // $nos1 = htmlspecialchars($data["nos1"]);
    // $tgls1 = $data["tgls1"];
    
    // $query = "INSERT INTO school (id, nosd) VALUES ('', '$nosd') WHERE nip = '$pengguna'";
    $query = "UPDATE school SET nosd='$nosd' WHERE nip = '$pengguna'";
    mysqli_query($conn, $query);
    $_SESSION["nosd"] = $school["nosd"];
  // if( mysqli_affected_rows($conn) > 0 ){
  //   echo "<script>
  //         alert('Bapak/Ibu BERHASIL Absen !!! ... TERIMA KASIH');
  //         document.location.href='tabel.php'
  //       </script>";
  //     } else {
  //       echo "<script>
  //         alert('INPUT ABSEN GAGAL !!! ... SILAHKAN COBA LAGI');
  //         document.location.href='index.php'
  //       </script>";
  //       echo mysqli_error($conn);
  //     }
    return mysqli_affected_rows($conn);
}