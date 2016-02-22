<html>
  <head>
    <script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
    <script>
      var soundID = "Thunder";

      function loadSound () {
        createjs.Sound.registerSound("mp3/m.mp3", soundID);
      }

      function playSound () {
        createjs.Sound.play(soundID);
      }

      setInterval(playSound, 10000);
    </script>
  </head>
  <body onload="loadSound();">
    <button onclick="playSound();" class="playSound">Play Sound</button>
  </body>
</html>

