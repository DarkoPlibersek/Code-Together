<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 urnik ❤</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/urnik.css">
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

    <div class="frameTable">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "easistent");
        $sql = "SELECT * FROM urnik";
        if (!mysqli_query($conn, $sql)) {
            echo "ERROR";
        } else {
            $info = mysqli_query($conn, $sql);
            $stVrstic = mysqli_num_rows($info);
            $x = 1;
            $y = 10;

            echo "
            <table style='width:100%'>
                <tr>
                    <th>Ure</th>
                    <th>Ponedeljek</th>
                    <th>Torek</th>
                    <th>Sreda</th>
                    <th>Četrtek</th>
                    <th>Petek</th>
                </tr>
                ";
            do {
                $o = 1;
                echo "
                <tr>
                    <td>Ura " . $x . "</td>
                    ";
                    do{
                        $r = 0;
                        do{
                            $rand = rand(1, 9);
                            $idSame = "SELECT * FROM urnik WHERE id = '$rand'";
                            $rowTrue = mysqli_fetch_assoc(mysqli_query($conn, $idSame));
                            if ($rowTrue['id'] == 1){
                                echo "<td></td>";
                            }else {
                                $color = $rowTrue['id'];
                                switch ($color) {
                                    case 1:
                                        break;
                                    case 2:
                                        echo "<td class='ena'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 3:
                                        echo "<td class='dva'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 4:
                                        echo "<td class='tri'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 5:
                                        echo "<td class='štiri'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 6:
                                        echo "<td class='pet'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 7:
                                        echo "<td class='šest'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 8:
                                        echo "<td class='sedem'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 9:
                                        echo "<td class='osem'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    case 10:
                                        echo "<td class='devet'><div class ='uraID'> " .$rowTrue['ura']. "</div>".$rowTrue['profesor']."<br> ".$rowTrue['razred']."</td>";
                                        break;
                                    
                                }
                            }
                            $r++;
                        }while($r <= 0);
                        $o++;
                    }while ($o <= 5);
                    echo "
                </tr>
                ";
                $x++;
            } while ($x <= $y);
            echo "</table>";
        }
        ?>
    </div>
</body>

</html>