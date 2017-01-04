<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="main.css">

<title>Tip Calculator</title>
<body>
    <section class="center">
        <h1>Tip Calculator</h1>
                <?php
                if(isset($_POST['subtotal'])) {
                    $subtotal=$_POST['subtotal'];
                    if($subtotal <= 0) {
                        $suberror=True;
                    }
                    if(isset($_POST['usecustom'])){
                        $tipperc=0;
                        $customtip=$_POST['customtip'];
                        if($customtip <= 0) {
                            $tiperror=True;
                        } 
                        else {
                            $tipperc=$_POST['tipperc'];
                        }  
                    }
                } 
                else {
                    $subtotal='';
                    $tipperc=20; 
                    $customtip='';
                }
                ?>
                <form action="" method="post">
                    <span <?php if($suberror==True) echo "class=\"error\""?>>Bill subtotal: $ <input type="text" name="subtotal" value="<?php echo $subtotal ?>"> </span> <br>
                    Tip percentage:
                    <?php
                    for($i=10; $i <= 20; $i+=5) {
                        if($tipperc==".$i") {
                            echo "<input type=\"radio\" name=\"tipperc\" value=\"$i\" checked>  $i%\n";
                        } else {
                            echo "<input type=\"radio\" name=\"tipperc\" value=\"$i\">  $i%\n";
                        }
                    }
                    ?>
                    <br>
                    <span class="<?php if($tiperror==True) echo "error"?>">
                    Custom: <input type="radio" name="usecustom" value="" <?php if(isset($_POST['usecustom'])) echo "checked" ?>> 
                    </span>
                    <input type="text" name="customtip" value="<?php echo $customtip ?>" style="width:50px;" >% <br>
                    <input type="submit" value="Submit">
                </form>
                <?php
                if(isset($_POST['subtotal'])){
                    $subtotal=$_POST['subtotal'];
                    if($subtotal <= 0) {
                        exit("Enter a subtotal greater than 0");
                    }
                    if(isset($_POST['usecustom'])){
                        $customtip=$_POST['customtip'];
                        if($customtip <= 0) {
                            exit("Enter a tip percentage greater than 0");
                        }
                        $tipperc=$_POST['customtip'];
                    }
                    else {
                        $tipperc=$_POST['tipperc'];
                    }
                    $tipamt=$subtotal*($tipperc/100);
                    $total=$subtotal+$tipamt;
                    echo "Tip: \$$tipamt<br>";
                    echo "Total: \$$total";
                }
                ?>
    </section>
</body>
