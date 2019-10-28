// var phAir = document.getElementById("pdAir");
// var suhuAir = document.getElementById("suhuAir");
// var garam = document.getElementById("garam");

// var firebaseRefPh = firebase.database().ref().child("ph");
// firebaseRefPh.on('child_added', snap => {
//     console.log(snap.val());
// });

 var app_fireBase= {};

(function(){
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
})()