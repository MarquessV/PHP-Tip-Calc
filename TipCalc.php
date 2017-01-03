<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="main.css">

<title>Tip Calculator</title>
<body>
    <section class="center">
        <h1>Tip Calculator</h1>
                <!-- Load previous values and error check or enter defaults --!>
                <?php
                if(isset($_POST['subtotal'])) {
                    $subtotal=$_POST['subtotal'];
                    $tipperc=$_POST['tipperc'];
                    if($subtotal <= 0)
                            $suberror=True;
                } else {
                    $subtotal='';
                    $tipperc=.20;
                }
                ?>
                <!-- Generate form  --!>
                <form action="" method="post">
                    <span <?php if($suberror==True) echo "class=\"error\""?>>Bill subtotal: $ <input type="text" name="subtotal" value="<?php echo $subtotal; ?>"> </span> <br>
                    Tip percentage:
                    <?php
                    for($i=10; $i <= 20; $i+=5) {
                        if($tipperc==".$i") {
                            echo "<input type=\"radio\" name=\"tipperc\" value=\".$i\" checked>  $i%\n";
                        } else {
                            echo "<input type=\"radio\" name=\"tipperc\" value=\".$i\">  $i%\n";
                        }
                    }
                    ?>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                <!-- Validate, then perform calculations and display them --!>
                <?php
                if(isset($_POST['subtotal'])){
                    $subtotal=$_POST['subtotal'];
                    if($subtotal <= 0)
                            exit("Enter a subtotal greater than 0");
                $tipperc=$_POST['tipperc'];
                $tipamt=$subtotal*$tipperc;
                $total=$subtotal+$tipamt;
                echo "Tip: \$$tipamt<br>";
                echo "Total: \$$total";
                }
                ?>
    </section>
</body>
