<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 urnik ❤</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ocene.css">
</head>

<body>
    <nav class="nav">
        <div class="logo"><img src="../image/eAsistent.png" alt="" id="eAsistentLogo"></div>
        <div class="navButtons">
            <div><a href="./urnik.php">URNIK</a></div>
            <div><a href="./ocene.php">OCENE</a></div>
            <div><a href="./ADMIN.php">ADMIN</a></div>
        </div>
        <div class="profile"><img src="../image/profile.png" alt="profile Picture" id="ProfilePicture"></div>
    </nav>

    <div class="frameOcene">
        <?php 
        $conn = mysqli_connect("localhost", "root", "", "easistent");
        $sql = "SELECT * FROM ocene";
        $info = mysqli_query($conn, $sql);
        $stVrstic = mysqli_num_rows($info);
        $x = 1;
        if (!mysqli_query($conn, $sql)) {
            echo "ERROR";
        } else {

            echo "
            <table>
                <tr style = 'color: red;'>
                    <th>Ocena</th>
                    <th>Predmet</th>
                </tr>
                <tr>
                ";
            do{
                $row = mysqli_fetch_assoc($info);
                echo "<td> " .$row['ocena']. " </td>";
                echo "<td> ".$row['predmet']." </td></tr>";
                $x++;
            }while($x <= $stVrstic);
            echo "</table>";
        }
        ?>
    </div>
</body>

</html>