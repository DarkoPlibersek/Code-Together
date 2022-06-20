<?php 
    $ura = $_POST["ura"];
    $profesor = $_POST["profesor"];
    $razred = $_POST["razred"];
    $conn=mysqli_connect("localhost", "root", "", "easistent");
    $sql = "SELECT * FROM urnik";
    $result=mysqli_query($conn,$sql) or exit(mysqli_error($conn));
    
    if(mysqli_query($conn,$sql))
    {
        $sql= "
        INSERT INTO urnik (ura, profesor, razred)
        VALUES ('$ura','$profesor','$razred');
        ";
        mysqli_query($conn,$sql);
        echo "<script>location.href='../tabelaUrnik.php'</script>";
        mysqli_close($conn);
    }


?>