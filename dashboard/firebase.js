{
var ph = document.getElementById('ph');
var phAir = firebase.database().ref().child('ph');
phAir.on('value', snap => ph.innerText = snap.val());

var tds = document.getElementById('tds');
var tdsAir = firebase.database().ref().child('tds');
tdsAir.on('value', snap => tds.innerText = snap.val());

var volt = document.getElementById('volt');
var voltSensor = firebase.database().ref().child('volt');
voltSensor.on('value', snap => volt.innerText = snap.val());

var suhu = document.getElementById('suhu');
var suhuSensor = firebase.database().ref().child('suhu');
suhuSensor.on('value', snap => suhu.innerText = snap.val());
}
// The core Firebase JS SDK is always required and must be listed first
//     <script src="https://www.gstatic.com/firebasejs/5.5.6/firebase.js"></script>

//     <!-- TODO: Add SDKs for Firebase products that you want to use
//          https://firebase.google.com/docs/web/setup#config-web-app -->

//     <script>
//       // Your web app's Firebase configuration
//       var firebaseConfig = {
//         apiKey: "AIzaSyC0ljcjG_Qi_ayk9Tg06dxT6uAb-RXwXrI",
//         authDomain: "monitoringpemancinganikan.firebaseapp.com",
//         databaseURL: "https://monitoringpemancinganikan.firebaseio.com",
//         projectId: "monitoringpemancinganikan",
//         storageBucket: "",
//         messagingSenderId: "198096329984",
//         appId: "1:198096329984:web:14ad1257617a6bc2"
//       };
//       // Initialize Firebase
//       firebase.initializeApp(firebaseConfig);
//     </script>