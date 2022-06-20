<?php
$ocena = $_POST["ocena"];
$predmet = $_POST["predmet"];
$conn = mysqli_connect("localhost", "root", "", "easistent");
$sql = "SELECT * FROM ocene";
$result = mysqli_query($conn, $sql) or exit(mysqli_error($conn));
echo $ocena;
if ($ocena <= 5) {
    if (mysqli_query($conn, $sql)) {
        $sql = "
        INSERT INTO ocene (ocena, predmet)
        VALUES ('$ocena','$predmet');
        ";
        mysqli_query($conn, $sql);
        echo "<script>location.href='../tabelaOcene.php'</script>";
        mysqli_close($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 urnik ❤</title>
    <style>
        .ERROR{
            display: block;
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            background-color: red;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
        .ERROR div{
            margin-top: 400px;
            font-size: 100px;
            font-weight: bold;
            font-family: 'Courier New', Courier, monospace;
        }

    </style>
</head>

<body>
    <div class="ERROR">
        <div> <sctn style="font-size: 150px;">ERROR</sctn><br>Ocena mora bit med 1-5<br><a href="../tabelaOcene.php">BACK</a></div>
    </div>

</body>

</html>