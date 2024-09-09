<?php genheader("GENIO system connections", "September 08, 2024");?>

<p>On how, after several attempts, I finally managed to get my acoustic piano to communicate with my laptop in MIDI.</p>

<?php h("Introduction");?>

<?php img("images/DSCF0047.JPG", 40, "float:right; margin-bottom: 2ch; margin-right: 1ch; margin-left:2ch;");?>

<p>When I was younger, I used to spend a lot of time on the piano. In my room, next to my desk, there was an acoustic, upright piano that my parents had bought so that my siblings and I could practise music.</p>

<p>It was nice to have it so close at hand: all I had to do was turn my chair around and immediately I could hear the sound. If I got an idea, I could immediately try it out with great immediacy (here on the right is a photo of my old piano, dated October 2002).</p>

<p>Since I started living on my own I no longer had my piano with me although I continued, at least for the first few years, to practise on some digital keyboard.</p>

<p>Playing an acoustic piano is not remotely comparable to playing a digital keyboard. It's not just a matter of sound (that of an acoustic piano is warm, wide and enveloping while I find that of a digital keyboard thin and one-dimensional) or of tactile/mechanical feel of touch (although there are digital keyboards that have beautiful weighted mechanics that are really very convincing) but it's also a matter of practicality and immediacy.</p>

<p>I consider myself a rather patient person but for certain things I think I have become rather intolerant. If I feel the need to play I have to be able to do it immediately, I don't want my enthusiasm to cool down with wasted time such as plugging the keyboard into the power socket, looking for where I put my headphones, connecting them to the instrument, taking care to arrange the cable correctly so that I don't trip over it and get it ‘in the way’ while playing.</p>

<p>Now that I'm writing this article, they really seem like minor things, but if repeated over and over again, they end up becoming a nuisance and ‘getting in the way’ of the playing experience itself. In the long run, they end up making sad even those few moments on the instrument that should instead be relaxing and liberating.</p>

<hr/>

<p>That is also why a few months ago my wife and I decided to buy an acoustic piano for our house (upright of course because the space is not that big).</p>

<p>It was a while before we decided but, little by little, we became fond of the idea of:</p>
<ul>
<li>resume (for me), begin (for my wife) music studies;</li>
<li>playing the piano for fun and hobby;</li>
<li>also use it as a working tool, to compose and test ideas for new compositions;</li>
<li>use it as a sound source, recording it perhaps with some microphone;</li>
</ul>

<p>After various searches, we fell in love with a <b>Feurich 125</b> piano that we found by chance at a tuner/repair shop out of town. It is a beautiful piano built in 1983 in West Germany and has, among other special features, a <i>Renner</i><?php footnote("Renner piano mechanics", "https://rennerusa.com/");?> mechanism and a soundboard made of spruce made by the Ciresa<?php footnote("Ciresa soundboards", "https://www.ciresafiemme.it/en/about-us/");?> company.</p>

<?php img("images/photo_2024-09-09_19-07-34.jpg", 100, "margin-top: 1ch; margin-bottom: 2ch;");?>

<p>The piano has two pedals. The right one is for the ‘<i>forte/resonance</i>’. The left one is for the ‘<i>one-string</i>’ effect which in our piano is implemented in the form of bringing the hammers closer to the strings.</p>

<p>In addition to these two pedals, the piano has a lateral lever which acts as a <i>sordina</i> pedal which, when activated, causes a felt cloth to descend, placing itself between the hammers and the strings: an exquisitely muffled and evocative sound is thus obtained.</p>

<p>On closer inspection, both the left pedal and the <i>sordina</i> lever can be considered sound silencing systems, invented for both expressive and practical purposes.</p>

<p>At the time of purchase, we asked for an additional silencing system to be installed, in other words, a system that, through sensors and various electronics, would allow us to play the piano with headphones, without the instrument producing any audible sound in the environment.</p>

<!--<p>at, by means of various sensors and electronics, would allow us to play the piano with headphones, without the instrument producing any audible sound in the environment.</p>-->

<p>Silencing systems are primarily designed to allow studying and practising the piano without disturbing tenants or neighbours. The presence of sensors in tandem with the activation of a mechanical system that interrupts the stroke of the hammers just before they hit the strings, makes the piano totally silent and at the same time usable through a pair of headphones.</p>

<p>Our request wasn't primarily to prevent any potential disturbance the instrument's sound might cause our neighbors, but rather to implement a system that could convert the pressure applied to the keys and pedals into digital signals. This would have opened up opportunities for various forms of experimentation and, most importantly, allowed us to record our performances in MIDI format.</p>

<p>From my experience, <i>Yamaha</i> or <i>Kaway</i> pianos, for example, can be purchased with a ‘factory’ silencing system, but it is also possible to install a silencing system from scratch even on pianos that did not originally have one (the installation work is not particularly invasive).</p>

<p>There are at least two silencing kits of this kind: one is <i><a href="https://www.adsilent.eu/en/">adsilent</a></i>, made in Germany, and the other is Genio, from the Korean company <a href="https://usrlab.kr/">URSlab</a>. The system installed on our Feurich is a <b>Genio Premium alpha</b>, and it works quite well!</p>

<?php h("My room");?>

<p>As I said, if one of the goals was precisely to record musical performances via MIDI on the PC, I needed to figure out how to connect the <i>Genio</i> to my workstation. Below is the configuration of our home studio.</p>

<div style="text-align: center;">
<?php img("images/room_v2.svg", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>An initial problem is immediately apparent; my usual workstation is located some distance from the instrument. One solution could have been to refactor the positions of all the furniture in the room to allow the desk to be close to the piano. Although we contemplated this possibility, the truth is that we discarded it: we like the room as it is currently configured very much and have no intention of moving anything at the moment!</p>

<p>The problem of the connection between the piano and the laptop has not yet been resolved and we must therefore consider other options such as:</p>
<ol>
  <li>Using a long USB cable;</li>
  <li>Making deferred MIDI recordings;</li>
  <li>Using a MIDI cable;</li>
</ol>

<?php h("Using a long USB cable");?>

</p>The <i>Genio</i> system can be connected to a PC via a USB cable (port 3 in image below, taken from the <i>Genio Premium alpha</i> user manual<?php footnote("GENIO premium alpha user manual", "http://www.queens-piano.it/wp-content/uploads/2021/04/GENIO-Premium-manual.pdf");?>).<p>

<?php img("images/GENIO-front.png", 100, "margin-bottom: 2ch; margin-top:2ch;");?>

<p>Using a USB cable would have been the best solution, and although this connection works well when the USB cable has relatively short lengths, it would not have worked so well in our use case: the USB cable would have had to extend more than 5 metres and this would have resulted in a degradation of the digital signal.</p>

<?php h("Making deferred MIDI recordings");?>

<p>Another option could be to make the recordings on a device connected to the <i>Genio</i> (such as a USB stick to be connected to the USB port named <code>memory</code>, in the picture with the number 4). The USB stick can be used to ferry these recordings from the <i>Genio</i> to the PC from time to time.</p>

<p>While intriguing, despite the deferral between performance and replay of the same on the PC, even this strategy proved also impractical due to what appears to be a curious flaw in the <i>Genio</i>'s firmware.</p>

<p>Basically, and this has not been denied to me by the <i>USRlab</i> company's official support after I had emailed them about it, the firmware is not capable of recording CC-type events.</p>

<p>For example, the operation of the <i>forte</i> pedal is not recorded with control continuous, rather it is translated as note-off events on the notes that were sustained.</p>

<p>In these two pictures, the difference between the two cases is clearly visible (screenshots are taken from Reaper DAW):</p>

<table  style="width: 100%;">

<tr>
  <th>Recording via USB cable</th>
  <th>Recording on USB stick</th>
</tr>

<tr>
  <td style="width: 50%; text-align: center;"><?php img("images/recorder_w_MIDI_cable.png", 100, "margin-bottom: 1ch; margin-top:1ch;");?></td>
  <td style="width: 50%; text-align: center;"><?php img("images/recorder_on_USB_stick.png", 100, "margin-bottom: 1ch; margin-top:1ch;");?></td>
</tr>

<tr>
  <td style="font-size: 0.75em; vertical-align:top; text-align:center;">Sustain pedal operation is correctly registered via CC messages</td>
  <td style="font-size: 0.75em; vertical-align:top; text-align:center;">The MIDI file that the Genio firmware saves on the USB device does not contain any information about continuous controls. The operation of the forte pedal is not recorded. Rather, when the pedal is released, this event is ‘simulated’ by writing note-off messages.</td>
</tr>
</table>

<br/>

<p>As you can see, this system is heavily flawed and practically unusable. I asked about a possible firmware update for the <i>Genio</i> but have not received a reply in this regard.</p>

<p>Also, on a side note, I noticed that some of my USB sticks did not work properly with the <i>Genio</i>: the latter does not recognise them as devices to which it is possible to copy MIDI from the internal memory nor from which any MIDI data can be played.</p>

<?php h("Using a MIDI cable");?>

<p>At this point, the last resort was to use a MIDI cable to connect the <i>Genio</i> to the PC. The MIDI cable is theoretically not subject to excessive signal degradation over long distances, unlike the USB cable.</p>

<p>To implement this strategy, it was necessary to have a physical 5-pin DIN<?php footnote("5-pin DIN MIDI connections ", "https://en.wikipedia.org/wiki/MIDI#DIN_connector");?> interface on both the <i>Genio</i> system and my PC. This was the opportunity for me, rummaging through some of the technology boxes I have around the house, to exhume an old <b>M-Audio Midisport 1x1</b> interface (you can see it from this connection diagram taken from the <a href="http://www.m-audio.jp/midisport-1x1/">m-audio website</a>).</p>

<div style="text-align: center;">
<?php img("images/midisport-1x1-setup.jpg", 80, "margin-bottom: 2ch; margin-top:2ch;");?>
</div>

<p>I don't remember how I came into possession of it, the fact is that I've never managed to use it: when I bought it I couldn't find the drivers for my <i>Ubuntu Studio</i> operating system and so it sat in a box for a long time.</p>

<p>Years later, on the occasion of these experiments, to my surprise, I found an installer on <i>Muon</i> (the package manager of Ubuntu Studio 22.04 operating system I'm using) that fit the bill and in no time at all the old <i>Midisport</i> magically came back to life: I was finally able to send and receive MIDI signals from my PC via the standard 5-pin DIN connector!</p>

<p>On the PC side then everything seemed to be solved, the problem of the <i>Genio</i> remained. Reading the manual I came across these illustration:</p>

<?php img("images/GENIO_connecting_w_external_midi_device.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

<?php img("images/GENIO-rear.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

<p>So, as a test, I immediately try to connect the <i>Midisport</i> to the <code>MIDI ex</code> port of the <i>Genio</i> (in the picture numbered as 6) but I realise that, from the activity of the the Midisport's LEDs, no MIDI signal is sent from the <i>Genio</i> to the MIDI out port of the Midisport.</p>

<p>I wrote a second e-mail to <i>USRlab</i>'s official support querying them about the matter and the support explains to me that the <code>MIDI ex</code> port of the <i>Genio</i> is designed to interface exclusively with a <u>proprietary I/O MIDI device</u> and, therefore, is not compatible with other types of interfaces.</p>

<p>After a few more mails that lead me to contact first the official importer of the <i>Genio</i> systems in Italy and then again my tuner, I finally manage to get hold of the misterious <i>Genio</i> proprietary MIDI I/O expansion system: nothing more than a small plastic box equipped with three 5-pin DIN connectors and a USB-A cable.</p>

<?php img("images/MIDI_external_io.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

<p>The purchase of a sufficiently long MIDI cable (10 metres in my case) finally allowed me to close the circle and successfully connect the piano to the PC. After initial tests, it seems that this last route is proving successful.</p>

<p>Here is a diagram of the connections:</p>

<div style="text-align: center;">
<?php img("images/connection_diagram_v1.svg", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>I will keep an eye on it in the future and hope not to run into any more strange malfunctions.</p>
