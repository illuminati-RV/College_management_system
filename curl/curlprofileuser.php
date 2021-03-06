<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style_gen.css">
<link rel="stylesheet" type="text/css" href="../assets/css/navigation-bar.css">
<script src="../assets/js/script.js"> </script>
<script src="../assets/js/jquery-3.1.1.min.js"> </script>

<body  id="top">

<?php

session_start();
$post = $_SESSION['tid'];
$prev = $_SESSION['prev'];
require 'navbar.php';
require '../db.php';
$sql = "SELECT * FROM student WHERE email ='".$_SESSION['user']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$adm = $row['adm'];
if($prev==1)
{
    header("location:http://localhost/Project/Student's Card/curl/curlprofilestaff.php");
}

?>

<div class="w3-main w3-content w3-padding " style="max-width:100%;margin-top: 3%; background-color: rgba(0, 0, 0, 0.55)">
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="text-center"><br><br><br>
                    <h1 class="section-heading" style="font-family: 'URW Gothic';color: rgba(81,191,152,0.89)">
                        <p>-------------------------------</p>
                        Curl / Book Menu
                        <p>-------------------------------</p>
                        <h5 class="text-muted">Online Library Management System
                        </h5>
                    </h1>
                    <br>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container w3-animate-opacity"><br>
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <h2 style="font-family:'Pacifico.ttf';"><u><a href="curlprofileuser.php#renew" style="color: white;"
                                                                      id="srenew">Renew Book</a></u></h2>
                        <h5 class="w3-center text-muted"
                            style="font-family: arial, helvetica, sans-serif;color: rgba(184,181,178,0.68)">Update the
                            return date for a book
                            already taken by the user. Can be done twice for a book</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">

                    </div>
                </div>
            </div>


        <!-- RENEW BOOKS -->


        <br> <br  id="renew"><br>
        <div id="brenew">
                <div class="container">
                    <div class="row">
                        <div class="text-center"><br>
                            <h1 class="section-heading" style="font-family: 'URW Gothic';color: rgba(81,191,152,0.89)">
                                <p>-------------------------------</p><a href="curlprofileuser.php#top" id="closem" onclick="closem()"
                                                                         style="float: right;color: teal">X</a>
                                Curl / Renew Book
                                <p>-------------------------------</p>
                                <h5 class="text-muted">Online Library Management System
                                </h5>
                            </h1>
                            <hr class="primary">
                        </div>
                    </div>
                </div>


                <div class="container"><br>
                    <form action="actions/renewbu1.php" method="post">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <h3 style="font-family: 'Comfortaa Regular'">Book id</h3>
                                <br><input type="text" name="b1" class="textInput2" value ="<?php echo $row['b1']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <h3 style="font-family: 'Comfortaa Regular'">
                                    <?php
                                    $d=strtotime("+2 Weeks ");
                                    $de = date("d-m-Y", $d);
                                    $today = date("d-m-Y");
                                    $now = time();
                                    $your_date = strtotime($row['fd1']);
                                    $datediff = $now - $your_date;
                                    $sum = floor($datediff/(60*60*24));

                                    if($sum<=0)
                                    {
                                        echo 'Extended date</h3><br><input type="text" name="d1" class="textInput2" value ="'.$de.'" readonly>';
                                    }
                                    if($sum>0)
                                    {
                                        echo '<h3 style="font-family: \'Comfortaa Regular\';color: tomato;">';
                                        //echo 'hi';
                                        echo 'Return date expired on</h3><br>
                                                <input type="text" name="d1" class="textInput2" value ="'.$row['d1'].'" readonly>';
                                        echo '<input type="hidden" name="s1" class="textInput2" value="'. $sum.'" readonly>';
                                    }
                                    ?>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <input type="hidden" name="adm" class="textInput2" value ="<?php echo $adm ?> " readonly>
                                <?php
                                $d=strtotime("+2 Weeks ");
                                $de = date("d-m-Y", $d);
                                if($sum<=0)
                                {
                                    echo '<input type="submit" class="renewbutn" value="Renew" id="hrenew">';
                                }
                                ?>
                                <?php
                                if($sum>0)
                                {
                                    echo '<input type="submit" class="renewbutn" value="Renew" id="hrenew"
                                                style="background-color: #929292" disabled>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    </form>

                    <form action="actions/renewbu2.php" method="post">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <h3 style="font-family: 'Comfortaa Regular'">Book id</h3>
                                <br><input type="text" name="b2" class="textInput2" value ="<?php echo $row['b2']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <h3 style="font-family: 'Comfortaa Regular'">
                                    <?php
                                    $d=strtotime("+2 Weeks ");
                                    $de = date("d-m-Y", $d);
                                    $today = date("d-m-Y");
                                    $now = time();
                                    $your_date = strtotime($row['fd2']);
                                    $datediff = $now - $your_date;
                                    $sum = floor($datediff/(60*60*24));
                                    if($sum<=0)
                                    {
                                        echo 'Extended date</h3><br><input type="text" name="d2" class="textInput2" value ="'.$de.'" readonly>';
                                    }
                                    if($sum>0)
                                    {
                                        echo '<h3 style="font-family: \'Comfortaa Regular\';color: tomato;">';
                                        //echo 'hi';
                                        echo 'Return date expired on</h3><br>
                                                <input type="text" name="d2" class="textInput2" value ="'.$row['d2'].'" readonly>';
                                        echo '<input type="hidden" name="s2" class="textInput2" value="'. $sum.'" readonly>';
                                    }
                                    ?>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="service-box">
                                <input type="hidden" name="adm" class="textInput2" value ="<?php echo $adm ?> " readonly>
                                <?php
                                if($sum<0)
                                {
                                    echo '<input type="submit" class="renewbutn" value="Renew" id="hrenew">';
                                }
                                ?>
                                <?php
                                if($sum>=0)
                                {
                                    echo '<input type="submit" class="renewbutn" value="Renew" id="hrenew"
                                                style="background-color: #929292" disabled>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    </form>
                    <hr>
        </div>
</div>


<br><br><br>
</section>
</div>



<footer class="my-footer" id="footer1">
    <div class="container">
        <div class="row row-pb-md">
            <!--            <a href="bookmenu.php#top" style="color: whitesmoke;float: right" id="topbut">[↑]</a> -->
            <div class="col-md-12 text-center">
                <br><br>
                <h3><u style="color: rgba(229,212,67,0.84);">Get In Touch</u></h3>
                <div class="contact">
                    <br>
                    <span style="color: rgba(214,210,209,0.80)">Call us on :<b style="color: white;margin-right: 20px"> +91 8281 7567 33</b></span>
                    <span style="margin-right:10px;"> | </span>
                    <span style="color: rgba(214,210,209,0.80)">Mail us at :<b style="color: white"> info@studentscard.org</b></span><br><br><br>
                </div> </div>
        </div>

        <div class="col-md-12 text-center copyright">
            <p><small class="block">&copy; 2017. All Rights Reserved.</small>
                <small class="block">College of Engineering, Kidangoor</small></p>
        </div>

    </div>
</footer>


</body>

<script>
    $(document).ready(function(){
        $("#bissue, #brenew, #breturn").hide();
        $("#top").animate({scrollTop:0}, 500);
        $("#sissue").click(function(){
            $("#bissue").fadeIn(1500);
        });
        $("#srenew").click(function(){
            $("#brenew").fadeIn(1500);
        });
        $("#sreturn").click(function(){
            $("#breturn").fadeIn(1500);
        });
        $("#hinfo").click(function(){
            $("#top").animate({scrollTop:0}, 1400);
            return false;
        });
        $("#closem").click(function(){
            $("#brenew").fadeOut(1000);
            $("#top").animate({scrollTop:0}, 1600);
            return false;
        });
        $("#closen").click(function(){
            $("#breturn").fadeOut(1000);
            $("#top").animate({scrollTop:0}, 1600);
            return false;
        });
    });
</script>