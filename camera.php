<html>
<head>
  <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<video id="webcam" autoplay playsinline width="640" height="480" style="border: groove"></video>
<canvas id="canvas" class="d-none"></canvas>
<audio id="snapSound" src="audio/snap.wav" preload = "auto"></audio>

<br><br>
<button id="open">Open Camera</button>
<button id="cap">Capture</button>
<button id="stop">Stop Webcam</button>
<button id="rotate">Rotate Camera</button>
<br>
<img id="download-photo">
</body>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>

<script>
  const webcamElement = document.getElementById('webcam');
  const canvasElement = document.getElementById('canvas');
  const snapSoundElement = document.getElementById('snapSound');
  const webcam = new Webcam(webcamElement, 'user', canvasElement, snapSoundElement);

  $('#open').click(function () {
    webcam.start()
      .then(result =>{
        console.log("webcam started");
      })
      .catch(err => {
        console.log(err);
      });
  });


  $('#cap').click(function () {
    let picture = webcam.snap();
    document.querySelector('#download-photo').href = picture;
    // saveSnap();
  });
  $('#stop').click(function () {
    webcam.stop();

  });
  $('#rotate').click(function () {
      webcam.flip();
      webcam.start();
  });

  function saveSnap(){

    var base64image = document.getElementById("download-photo").href;


    webcam.upload( base64image, 'submit.php', function(text) {
      alert(text);
      console.log('Save successfully');
    });

  }
</script>

</html>


