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
        $ime = $_POST["ime"];
        $priimek = $_POST["priimek"];
        $mail = $_POST["mail"];
        $geslo = $_POST["geslo"];
        $pgeslo = $_POST["pgeslo"];// potrdi geslo
        $robMail = ""; // border
        $robGeslo = ""; // border
        $error = "";
        
        $conn=mysqli_connect("localhost", "root", "", "uporabniki");
        $sql= "SELECT *FROM uporabniki WHERE mail='$mail'";
        $result=mysqli_query($conn,$sql) or exit(mysqli_error($conn));
        if(mysqli_num_rows($result) || $geslo != $pgeslo || strlen($geslo) < 8)
        {
            if(mysqli_num_rows($result))
            {
                $robMail = "style='border: 2px solid red'";
                $robGeslo = "";
                $error = "Uporabnik z tem E-mailom že obsaja!";
            }
            else
            {
                $robMail = "";
                $robGeslo = "style='border: 2px solid red'";
                if(strlen($geslo)<8) $error = "Geslo mora biti dolgo vsaj 8 znakov!";
                elseif($geslo!=$pgeslo) $error = "Gesli se ne ujemata!"; 
            }
            echo
            '<form action="registracija.php" method="POST">
                <table>
                    <tr>
                        <td><label for="ime">Ime: </label></td>
                        <td><input type="text" name="ime" id="ime" value="'.$ime.'"><br></td>
                    </tr>
                    <tr>
                        <td><label for="priimek">Priimek: </label></td>
                        <td><input type="text" name="priimek" id="priimek" value="'.$priimek.'"><br></td>
                    </tr>
                    <tr>
                        <td><label for="mail">E-mail: </label></td>
                        <td><input type="text" name="mail" id="mail" value="'.$mail.'" '.$robMail.'><br></td>
                    </tr>
                    <tr>
                        <td><label for="geslo">Geslo: </label></td>
                        <td><input type="password" name="geslo" id="geslo" '.$robGeslo.'><br></td>
                    </tr>
                    <tr>
                        <td><label for="pgeslo">Potrdi geslo:</label></td>
                        <td><input type="password" name="pgeslo" id="pgeslo" '.$robGeslo.'><br></td>
                    </tr>
                </table>'.$error.'<br>
                <input type="submit" value="Potrdi">        
            </form>
            <form action="prijava.html" method="POST"><input type="submit" value="Prijava"></form>';
            mysqli_close($conn);
        }
        else
        {
            $sql= "INSERT INTO uporabniki(mail, geslo, ime, priimek) VALUES('$mail', '$geslo', '$ime', '$priimek')";
            if(mysqli_query($conn,$sql))
            {
                mysqli_close($conn);
                echo "<script>location.href='../index.html'</script>";
            }
        }      
    ?>
</body>
</html>