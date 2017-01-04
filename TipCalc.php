<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="main.css">

<title>Tip Calculator</title>
<body>
    <section class="center">
        <h1>Tip Calculator</h1>
                <?php
                if(isset($_POST['subtotal'])){
                    $subtotal=$_POST['subtotal'];
                    if($subtotal <= 0) {
                        $suberror=True;
                    }
                    $customtip=$_POST['customtip'];
                    if(isset($_POST['usecustom'])){
                        if($customtip <= 0) {
                            $tiperror=True;
                        } 
                    }
                    $tipperc=$_POST['tipperc'];
                    if(isset($_POST['splitnum'])){
                        $splitnum=$_POST['splitnum'];
                        if($splitnum <= 0) {
                            $spliterror=True; 
                        }
                    } else {
                        $splitnum=1; 
                    }
                } 
                else {
                    $subtotal='';
                    $tipperc=20; 
                    $customtip='';
                    $splitnum=1;
                }
                ?>
                <form action="" method="post">
                    <span <?php if($suberror==True) echo "class=\"error\""?>>Bill subtotal: $ <input type="text" name="subtotal" value="<?php echo $subtotal ?>"> </span> <br>
                    Tip percentage:
                    <?php
                    for($i=10; $i <= 20; $i+=5) {
                        if($tipperc=="$i" && !isset($_POST['usecustom'])) {
                            echo "<input type=\"radio\" name=\"tipperc\" value=\"$i\" checked>  $i%\n";
                        } else {
                            echo "<input type=\"radio\" name=\"tipperc\" value=\"$i\">  $i%\n";
                        }
                    }
                    ?>
                    <br>
                    <span class="<?php if($tiperror==True) echo "error"?>">
                    Custom: <input type="checkbox" name="usecustom" value="" <?php if(isset($_POST['usecustom'])) echo "checked" ?>> 
                    </span>
                    <input type="text" name="customtip" value="<?php echo $customtip ?>" style="width:25px" >% <br>
                    <span class="<?php if($spliterror==True) echo "error" ?>">
                    Split: <input type="text" name="splitnum" value="<?php echo $splitnum ?>" style="width:25px" > person(s) <br>
                    </span>
                    <input type="submit" value="Submit">
                </form>
                <?php
                if(isset($_POST['subtotal'])){
                    $subtotal=$_POST['subtotal'];
                    if($subtotal <= 0) {
                        exit("Enter a subtotal greater than 0");
                    }
                    $customtip=$_POST['customtip']; 
                    if(isset($_POST['usecustom'])){
                        $usecustom=True;
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
                    $splitnum=$_POST['splitnum'];
                    if($splitnum > 1) {
                            $splittipamt = $tipamt/$splitnum;
                            $splittotal = $total/$splitnum;
                            echo "Tip each: \$", number_format((float)$splittipamt, 2, '.', ''), "<br>";
                            echo "Total each: \$", number_format((float)$splittotal, 2, '.', ''), "<br>";
                    }
                    echo "Tip: \$", number_format((float)$tipamt, 2, '.', ''), "<br>";
                    echo "Total: \$", number_format((float)$total, 2, '.', '');
                }
                ?>
    </section>
</body>
