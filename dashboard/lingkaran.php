<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
 <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.4.2/firebase.js"></script>
 <script>
     $(document).ready(function() {
    
    var firebaseConfig = {
        apiKey: "AIzaSyC0ljcjG_Qi_ayk9Tg06dxT6uAb-RXwXrI",
        authDomain: "monitoringpemancinganikan.firebaseapp.com",
        databaseURL: "https://monitoringpemancinganikan.firebaseio.com",
        projectId: "monitoringpemancinganikan",
        storageBucket: "",
        messagingSenderId: "198096329984",
        appId: "1:198096329984:web:1ee2b24931b5bd0b0367e5"
    };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  app_fireBase = firebase;
    

    var firebaseRefPh = firebase.database().ref("ph");
    firebaseRefPh.on('value', snap => {
        $("#phAir").html(snap.val());
        if(snap.val() >= 6.9 && snap.val() <= 8){
            message += 'Ph Air = '+snap.val()+' (Status Normal) <br>';
            document.cookie = "statusPH = false";
        }else{
            message =+ 'PH Air = '+snap.val()+' (Status Tidak Normal !) <br>';
            document.cookie = "statusPH = true";
        }
        document.cookie = "message = "+message;
    });

    var firebaseRefSuhu = firebase.database().ref("suhu");
    firebaseRefSuhu.on('value', snap => {
        $("#suhuAir").html(snap.val());
        $(this).suhuAir = snap.val();
        if(snap.val() >= 27 && snap.val() <= 30){
            message += 'Suhu Air = '+snap.val()+' (Status Normal) <br>';
            document.cookie = "statusSuhu = false";
        }else{
            message += 'Suhu Air = '+snap.val()+' (Status Tidak Normal !) <br>';
            document.cookie = "statusSuhu = true";
        }
        document.cookie = "message = "+message;
    });

    var firebaseRefGaram = firebase.database().ref("tds");
    firebaseRefGaram.on('value', snap => {
        $("#garam").html(snap.val());
        $(this).tingkatGaram = snap.val();
          if(snap.val() >= 0.15 && snap.val() <= 0.20){
            message += 'Tingkat Garam Air = '+snap.val()+' (Status Normal) <br>';
            document.cookie = "statusGaram = false";
        }else{
            message += 'Tingkat Garam Air = '+snap.val()+' (Status Tidak Normal !) <br>';
            document.cookie = "statusGaram = true";
        }
        document.cookie = "message = "+message;
    });
});
 </script>



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
                            margin-left:40px;
                            }
                            .circle1 {
                                margin-top:-185px;
                                margin-left:55px;
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
                        <div class="row text-center" style="padding-top: 25vmin;">
                        <div class="col-md-4">
                            <label style="font-size:30px; color:black; font-weight: normal">PH Air </label>
                            <div class="circle"></div>
                            <div class="circle1" id="phAir">0</div>
                            <h3 id="ph"></h3> <span></span>
                        </div>
                        <div class="col-md-4">
                            <label style="font-size:30px; color:black; font-weight: normal">Suhu Air </label>
                            <div class="circle"></div>
                            <div class="circle1" id="suhuAir">0</div>
                            <h3 id="suhu"></h3>
                        </div>
                        <div class="col-md-4">
                            <label style="font-size:30px; color:black; font-weight: normal">Tingkat Garam </label>
                            <div class="circle"></div>
                            <div class="circle1" id="garam">0</div>
                            <h3 id="tds"></h3>
                        </div>
                        </div>
                    </div>
                 </div>
             </div>
         </div>