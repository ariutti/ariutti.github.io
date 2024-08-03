<?php genheader("First Article", "August 03, 2024");?>
<p>
Hola, this is actually my first article on this brand new web site.
</p>


<?php h("First Title");?>
<p>Testing some functionalities here like a link to a local resource. In this case we are talking about a pdf you can 'possibly' download from <a href="local_res/mixdown_1.pdf">here</a>.</p>
<p>This is <code>code</code> style inlide word, this is <b>bold</b> while this is <i>italic</i>.

<?php h("code blocks | table"); ?>
<p>This should be a code block
<pre>A  153 bytes
B 13,982,640 bytes
C 2,088,576 bytes
D 1,185,760,800 bytes</pre>

And also this one

<pre>$ cat ikaruga.gdi
3
1     0 4 2352 track01.bin 0
2  5945 0 2352 track02.raw 0
3 45000 4 2352 track03.bin 0</pre>
</p>

<?php h("sounds"); ?>
<p>What about a sound player embedded here?</p>
<audio controls="" style="width:100%; margin-bottom: 2ch;"> <source src="sound/numbers_1to4_every_seconds_48@24_mono.mp3" type="audio/ogg"> </audio>


<?php h("using footnotes"); ?>
<p>This is a footnote <?php footnote("fabien website", "https://fabiensanglard.net/");?></p>


<?php h("Images"); ?>
<p>How to deal with images? <br/>
  <?php img("laptop.png", 21, "float:left;margin-bottom: 2ch; margin-left: 2ch; margin-right:1ch;");?>
  This is a png image floating to the left.
  <div style="clear:both;"></div>
  <?php img("test.gif", 21, "float:right;margin-bottom: 2ch; margin-righ: 2ch; margin-left:1ch;");?>
  This is a <b>.gif</b> image floating to the right.
</p>
<div style="clear:both;"></div>
