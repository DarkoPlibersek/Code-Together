<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 urnik ❤</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tabele.css">
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

    <div class="frameADMIN">

        <div>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "easistent");
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $delete = mysqli_query($conn, "DELETE FROM ocene WHERE id = $id");
            }

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
                do {
                    $row = mysqli_fetch_assoc($info);
                    echo "<td> " . $row['ocena'] . " </td>";
                    echo "<td> " . $row['predmet'] . " </td>";
                    echo "<td> <a href='?id=" . $row['id'] . "' class='btn'>DELETE</a> </td></tr>";
                    $x++;
                } while ($x <= $stVrstic);
            
                echo "<form action='./backEnd/addOcena.php' method='POST'>";
                echo "<td><div><label>Ocena</label><br><input type='text' name='ocena'><div></td>";
                echo "<td><div><label>Ime predmeta</label><br><input type='text' name='predmet'><div></td>";
                echo "<td><input class='btn' type='submit' value='Add'></td>";
                echo "</form>";
                echo "</table>";
            }
            ?>
        </div>
    </div>
</body>

</html>