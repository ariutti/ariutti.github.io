<?php genheader("Wavesurfer test", "September 01, 2024");?>
<p>
This is my first test with wavesurfer.js library.
</p>

<p>Recently I've came across an article by Fabien<?php footnote("Fabien Sanglard article where he is using wavesurfer.js players", "https://fabiensanglard.net/sf2_sound_system/index.html");?> where he is showing a beatyful audio player rendered with this javascript lib called <a href="https://wavesurfer.xyz/">wavesurfer.js</a>.
So now I would like to try myself in using this very same library here on this test page.</p>
<br/>



<div id="test_sound" style="border: 1px black solid; background-color: white;">
</div>
<div style="text-align:center; margin-top: 1ch; margin-bottom: 2ch;">
  <button onclick="update(this,test_sound);">Play</button>
</div>


 <?php h("How to make it work? Nicola, this is a reminder for you!");?><p>

<p>In order to have the <b>wavesurfer.js</b> work on my website (which I think is something similar Fabien is using) you have to take care of properly prepare the article folder like it's shown below:</p>

<pre>
├── /js/
│   └── wavesurfer.min.js
└── /articles_folder/
    └── /article_subfolder/
        ├── index.html
        └── sounds/
            └── file-audio.mp3
</pre>

<p>The article subfolder should contain at least two subfolders:</p>
<ul>
  <li>the <code>js</code> folder has been tought to contain javascripts code;</li>
  <li>the second one is the <code>sounds</code> folder and, as the name suggests, will be used to store all the soundfiles used by the article.</li>
</ul>


<p>Inside the <b>js</b> folder put the <code>wavesurfer.min.js</code> file. You can do that simply by running the command <code>npm install --save wavesurfer.js</code> inside this folder, navigate into the <b>dist</b> subfolder to locate the file, moving it outside and removing everything else.</p>

<br/>

<p><b>Edit 2024/12/24</b>: better to have the <code>js</code> (with the <i>wavesurfer.min.js</i> inside) outside the articles parent folder. This way, if more than one article will need the library, we are not going to have duplicate files inside the website repository.</p>

<br/>

<p>Place the desired audio files inside the <b>sounds</b> folder</p>

<hr>

<p>Then you have to write some html code inside the article source file. First of all, create a div like this:</p>

<pre>
  &lt;div id=&quot;test_sound&quot; style=&quot;border: 1px black solid; background-color: white;&quot;&gt;
  &lt;/div&gt;
</pre>

<p>Then another one to contain the play button:

<pre>
  &lt;div style=&quot;text-align:center; margin-top: 1ch; margin-bottom: 2ch;&quot;&gt;
    &lt;button onclick=&quot;update(this,test_sound);&quot;&gt;Play&lt;/button&gt;
  &lt;/div&gt;
</pre>

<p>Note that this button, when clicked, will trigger a callback function to be implemented inside our custom javascript code (see below).</p>

<p>Than we should include the javascript library with the line:</p>
<pre>
  &lt;script src="../../js/wavesurfer.min.js"&gt;&lt;/script&gt;
</pre>

<p>And eventually a last bit of custom javascript code to:</p>

<ul>
  <li>instantiate the <i>wavesurfer</i> audio visualizers</li>
  <li>load proper audiofiles into them</li>
  <li>implement the <b>upload</b> callback function used by the play/stop buttons</li>
</ul>

<pre>
  &lt;script type=&quot;text/javascript&quot;&gt;
  var test_sound = WaveSurfer.create({
    container: &apos;#test_sound&apos;,
    waveColor: &apos;#aaaaaa&apos;,
    progressColor: &apos;#000000&apos;,
    cursorColor: &apos;#DD0000&apos;,
    barHeight: 2,
  });

  test_sound.load(&apos;sounds/file-audio.mp3&apos;);

  function update(e, wf) {
    if (wf.isPlaying()) {
        wf.pause();
        e.innerText = &quot;Play&quot;;
    } else {
        wf.play();
        e.innerText = &quot;Stop&quot;;
    }
  }
&lt;/script&gt;
</pre>


<!-- wavesurfer stuff -->
<script src="../../js/wavesurfer.min.js"></script>
<!-- <script src="https://unpkg.com/wavesurfer.js@7"></script> -->
<script type="text/javascript">
  var test_sound = WaveSurfer.create({
    container: '#test_sound',
    waveColor: '#aaaaaa',
    progressColor: '#000000',
    cursorColor: '#DD0000',
    barHeight: 2,
  });

  test_sound.load('sounds/numbers_1to4_every_seconds_48@24_mono.mp3');

  function update(e, wf) {
    if (wf.isPlaying()) {
        wf.pause();
        e.innerText = "Play";
    } else {
        wf.play();
        e.innerText = "Stop";
    }
  }
</script>
<!-- ENDOF wavesurfer stuff -->
