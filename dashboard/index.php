<?php 
    include_once('../head.php');
    require_once "../assets/libs/Carbon/autoload.php";
    require_once("../PHPMailer/src/PHPMailer.php");
    require_once("../PHPMailer/src/SMTP.php");

    //Untuk ngambil data emali dari database (dibentuk dalam array)
    $result = mysqli_query($con, "SELECT email FROM user");
    $targetMail = [];
    while ($email = mysqli_fetch_row($result)){
        $targetMail[] = $email[0];
    };
    use Carbon\Carbon;
    // use PHPMailer\PHPMailer;

    $tanggal_waktu_daftar = Carbon::now()->toDateTimeString();

    // if($_COOKIE['statusPH'] == "true" || $_COOKIE['statusSuhu'] == "true" || $_COOKIE['statusGaram'] == "true"){
    //     // notificatio message dari javascript

    //     //Perulangan untuk ngirim email ke semua user
    //     for($i=0; $i< mysqli_num_rows($result); $i++){
    //         $mail[$i] = new PHPMailer\PHPMailer\PHPMailer();
    //         $mail[$i]->isSMTP();
    //         $mail[$i]->SMTPAuth = true;
    //         $mail[$i]->SMTPSecure = 'ssl';
    //         $mail[$i]->Host = 'smtp.gmail.com';
    //         $mail[$i]->Port = '465';
    //         $mail[$i]->isHTML();
    //         $mail[$i]->Username = 'isnaenim05@gmail.com';
    //         $mail[$i]->Password = 'promild16';
    //         $mail[$i]->SetFrom('no-reply@howcode.org');
    //         $mail[$i]->Subject = 'Peringatan';
    //         $mail[$i]->Body = $_COOKIE['message'];
    //         $mail[$i]->AddAddress($targetMail[$i]);
    //         $mail[$i]->send();
    //     }
    // }

    // Untuk input
    if(isset($_POST['update'])){
        $phAir = $_POST['phAir'];
        $suhuAir = $_POST['suhuAir'];
        $tGaram = $_POST['tGaram'];
        $now = date('Y-m-d', time());
        $now1 = date("'Y-m-d'",time());
        $result = mysqli_query($con, "SELECT waktu FROM record WHERE waktu = $now1 LIMIT 1");
        if(mysqli_num_rows($result) == 0){
            mysqli_query($con, "INSERT INTO record VALUES ('', '$now', '$phAir', '$suhuAir', '$tGaram')");
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
            </script>
            ";
        }else {
            echo "
            <script>
                alert('Data keadaan air hari ini telah diinput');
            </script>
            ";
        }
    }

?>

<!-- <script src="indexdash.js"></script> -->

<body id="dasboard">
    <div class="wrapper ">

        <?php include_once('../nav.php'); ?>

        <div class="panel-header panel-header-sm" style="padding-bottom: 10%">
            <div class="header text-center">
                <h6 class="title" style="color: rgb(45,45,45); font-weight: bold;">Halaman Utama</h6>

            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height:750px">
                        <div class="card-header">
                            <h4 class="card-title">Data Realtime</h4>
                        </div>

                        <div class="card-body" style="margin-bottom: 30px">
                            <style>
                                .circle {
                                    height: 200px;
                                    width: 200px;
                                    background-color: green;
                                    border-radius: 50%;
                                    margin-left: 40px;
                                }

                                .circle1 {
                                    margin-top: -185px;
                                    margin-left: 55px;
                                    height: 170px;
                                    width: 170px;
                                    background-color: white;
                                    border-radius: 50%;
                                    text-align: center;
                                    vertical-align: middle;
                                    line-height: 170px;
                                    font-size: 40px;
                                }
                            </style>
                            <div class="row text-center" style="padding-top: 25px;">
                                <div class="col-md-4">
                                    <label style="font-size:30px; color:black; font-weight: normal">PH Air </label>
                                    <div class="circle mx-auto"></div>
                                    <div class="circle1 mx-auto" id="phAir">0</div>
                                    <h3 id="ph"></h3>
                                </div>
                                <div class="col-md-4">
                                    <label style="font-size:30px; color:black; font-weight: normal">Suhu Air </label>
                                    <div class="circle mx-auto"></div>
                                    <div class="circle1 mx-auto" id="suhuAir">0</div>
                                    <h3 id="suhu"></h3>
                                </div>
                                <div class="col-md-4">
                                    <label style="font-size:30px; color:black; font-weight: normal">Tingkat Garam
                                    </label>
                                    <div class="circle mx-auto"></div>
                                    <div class="circle1 mx-auto" id="garam">0</div>
                                    <h3 id="tds"></h3>
                                </div>
                            </div>
                            <div class="mx-0" id="inputDatabase">
                                <form action="" method="post">
                                    <input type="text" id="phAir1" name="phAir" hidden>
                                    <input type="text" id="suhuAir1" name="suhuAir" hidden>
                                    <input type="text" id="tGaram" name="tGaram" hidden>
                                    <div class="mx-auto">
                                        <button type="submit" name="update" class="btn btn-primary">Update
                                            today!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase.js"></script>


            <script src="indexdash.js"></script>

            <!-- Awal dari script ngambil nilai firebase -->
            <script>
                var mainApp = {};
                $(document).ready(function () {
                    var ph = document.getElementById('ph');
                    var a = document.getElementById('phAir1');
                    var phSensor = firebase.database().ref().child('ph');
                    phSensor.on('value', snap => a.value = snap.val());

                    var tds = document.getElementById('tds');
                    var b = document.getElementById('tGaram');
                    var garamSensor = firebase.database().ref().child('tds');
                    garamSensor.on('value', snap => b.value = snap.val());

                    var suhu = document.getElementById('suhu');
                    var c = document.getElementById('suhuAir1');
                    var suhuSensor = firebase.database().ref().child('suhu');
                    suhuSensor.on('value', snap => c.value = snap.val());
                    // Awal bagian ini yang diganti !!!

                    // Akhir bagian yang diganti !!!
                });
            </script>
            <!-- Akhir dari script-->


            <!-- The core Firebase JS SDK is always required and must be listed first -->


            <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

            <script>
                // Your web app's Firebase configuration
                var mainApp = {};

                // var phAir = document.getElementById("phAir");
                // var suhuAir = document.getElementById("suhuAir");
                // var garam = document.getElementById("garam");

                // PH
                $(document).ready(function () {

                    var firebaseRefPh = firebase.database().ref("ph");
                    firebaseRefPh.on('value', snap => {
                        $("#phAir").html(snap.val());
                        if (snap.val() >= 6.9 && snap.val() <= 8) {
                            message += 'Ph Air = ' + snap.val() + ' (Status Normal) <br>';
                            document.cookie = "statusPH = false";
                        } else {
                            message = +'PH Air = ' + snap.val() + ' (Status Tidak Normal !) <br>';
                            document.cookie = "statusPH = true";
                        }
                        document.cookie = "message = " + message;
                    });

                    var firebaseRefSuhu = firebase.database().ref("suhu");
                    firebaseRefSuhu.on('value', snap => {
                        $("#suhuAir").html(snap.val());
                        $(this).suhuAir = snap.val();
                        if (snap.val() >= 27 && snap.val() <= 30) {
                            message += 'Suhu Air = ' + snap.val() + ' (Status Normal) <br>';
                            document.cookie = "statusSuhu = false";
                        } else {
                            message += 'Suhu Air = ' + snap.val() + ' (Status Tidak Normal !) <br>';
                            document.cookie = "statusSuhu = true";
                        }
                        document.cookie = "message = " + message;
                    });

                    var firebaseRefGaram = firebase.database().ref("tds");
                    firebaseRefGaram.on('value', snap => {
                        $("#garam").html(snap.val());
                        $(this).tingkatGaram = snap.val();
                        if (snap.val() >= 0.15 && snap.val() <= 0.20) {
                            message += 'Tingkat Garam Air = ' + snap.val() +
                                ' (Status Normal) <br>';
                            document.cookie = "statusGaram = false";
                        } else {
                            message += 'Tingkat Garam Air = ' + snap.val() +
                                ' (Status Tidak Normal !) <br>';
                            document.cookie = "statusGaram = true";
                        }
                        document.cookie = "message = " + message;
                    });


                    // =====================================================================

                    firebaseRefPh.on("value_changed", snap => {
                        $('#phAir').html(snap.val());
                        $(this).phAir = snap.val();
                    });

                    firebaseRefSuhu.on("value_changed", snap => {
                        $('#suhuAir').html(snap.val());
                        $(this).suhuAir = snap.val();
                    });
                    firebaseRefGaram.on("value_changed", snap => {
                        $('#garam').html(snap.val());
                        $(this).tingkatGaram = snap.val();
                    });

                });
            </script>