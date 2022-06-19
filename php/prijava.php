<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $mail = $_POST["mail"];
        $geslo = $_POST["geslo"];

        $conn = mysqli_connect("localhost","root","","uporabniki");
        $sql= "SELECT *FROM uporabniki WHERE mail='$mail' AND geslo='$geslo'";
        $result=mysqli_query($conn,$sql) or exit(mysqli_error($conn));
        if(mysqli_num_rows($result))
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["prijavljen"]=true; // session - spremenljivka vedno shranjena ni važno od spletne strani
            $_SESSION["idUporabnika"]=$row["id"];
            mysqli_close($conn);
            echo "<script>location.href='urnik.php'</script>";
        }
        else
        {
            echo
            '<form action="prijava.php" method="POST">        
                <table>
                    <tr>
                        <td><label for="mail">E-mail: </label></td>
                        <td><input type="text" name="mail" id="mail" value="'.$mail.'" style="border: 2px solid red"><br></td>
                    </tr>
                    <tr>
                        <td><label for="geslo">Geslo: </label></td>
                        <td><input type="password" name="geslo" id="geslo" style="border: 2px solid red"><br></td>
                    </tr>
                </table>Nepravilni E-mail ali Geslo!<br>
                <input type="submit" value="Potrdi">
            </form>
            <form action="../Registracija.html" method="POST"><input type="submit" value="Registracija"></form>';
            mysqli_close($conn);  
        }           
    ?>
</body>
</html>