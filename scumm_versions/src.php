<?php genheader("Scumm versions", "July 18, 2017");?>

When back in 1987 <b>Ron Gilbert</b> and <b>Aric Wilmunder</b>, later nicknamed the "<i>SCUMM lords</i>", started working on SCUMM, the procedure to split game software into two different parts, <i>assets</i> on one side and <i>interpreter</i> on the other, was quite usual, at least for what concerns adventure videogames.<br/><br/>

The thing was already beed tried out successfully by <b>Siera On-line</b> developers since 1984 with their <b>AGI</b> (<b>A</b>dventure <b>G</b>ame <b>I</b>nterpreter) and <b>SCI</b> (<b>S</b>ierra <b>C</b>reative <b>I</b>nterpreter) interpreters and earlier by the famous <b>Infocom</b>, back in 1979 with the <b>Z-machine</b>, the virtual machine in charge of intepreting resource files containing all the <i>interactive fiction</i> contents.<br/><br/>

By the way, if you search "<i>interactive fiction</i>" on Wikipedia, you will find that this is only one of the many sub-genres related to the overall adventure game one. Actually, interactive fiction was one of the first kind of adventure games which was bring to the market.<br/><br/>

<div style="text-align:center;">
<?php img("images/adventure-genre.png", 50, "margin-bottom: 2ch; margin-top:2ch;");?>
</div><br/><br/>

The change to use the mouse as a mean to interact with the game came later (from here the name <i>click-and-point</i> adventure). The images too came later, initially only in black and white format, then in colors (vectorial and bitmap graphics).<br/><br/>

Adventure games became <i>graphical</i> only gradually while, at the beginning, the game experience consisted in reading the text shown on screen, maybe enriched with some sound effects, and in typing pairs of words, <i>verb-noun</i>, to fed the game <i>parser</i> with and make the story going on.<br/><br/>

Even more interesting can be to link the <i>interactive fiction</i> genre to the "analog" version of it: I'm talking about the "<b>Choose your own adventure</b>" literary genre which gained a great popularity in the '80 but began to be experimented since the '40.<br/><br/>

... better for me to stop here before to definitely loose myself in looking for the origin of the adventure genre. Anyway, from the reference section below you can find a list of useful links you can use yourself to go deeper into the subject.

<?php h("Game and Intepreter");?>

Stop wandering now and let's start to examine something concrete about the SCUMM world. Let's see what's the difference between the game and the interpreter.<br/><br/>

We will need to run our LucasArts games, either on an old PC or on an emulated one (using <b>DOSBox</b> for example), and type some commands to show information about the interpreter and the game itself.<br/><br/>

Here's a video I've prepared for the occasion (english subtitles will be available soon):<br/><br/>

<iframe width="100%" height="360" src="https://www.youtube.com/embed/ZCdnodwgBT4" allowfullscreen></iframe><br/><br/>

In this example I've used one of my favourite game, "<i>Indiana Jones and the Fate of Atlantis</i>" running in DOSBox. Suppose you already have the game folder on your virtual hard drive, let's enter inside it, with the `cd` command, and print the list of its content usign the `dir` command:<br/><br/>

<div style="text-align:center;">
<?php img("images/ver-cd-dir.png", 80, "margin-bottom: 2ch; margin-top:2ch;");?>
</div><br/><br/>

We are interested in that file with the `.exe` extension: this is the SCUMM interpreter, the computer program in charge of decoding game resources and able to run the game!<br/><br/>

We want to know what's its version (we will need this information later when we'll move to scritp "<i>descumming</i>") and in order to do this we try to run the interpreter passing it an intentionally invalid argument (say `foo`). The interpreter will not understand it so it will show an error message and also the information we are looking for!<br/><br/>

<div style="text-align:center;">
<?php img("images/ver-atlantis-foo.png", 80, "margin-bottom: 2ch; margin-top:2ch;");?>
</div><br/><br/>

As you can see from the image above, this massage is showing us what are the correct arguments to use. In addition to that, on the upper right corner, we clearly read the version number.<br/><br/>

<div style="text-align:center;">
<?php img("images/ver-foo-output.png", 80, "margin-bottom: 2ch; margin-top:2ch;");?>
</div><br/><br/>

Now, let's run the game passing some contemplated parameter: let's say I want to enable VGA graphics and SoundBlaster sound so I will use the `v` and `s` commands respectively.

<hr><br/><br/>

When the game has started, let's use a keys combination to show the version of the game this time: the combination is made of `ctrl` and `v` and will cause the game to pause and a message to pop-up on screen.<br/><br/>

As we see there is a difference from the interpreter version and the game version.<br/><br/>

<?php img("images/ver-game.png", 100, "margin-bottom: 2ch; margin-top:2ch;");?>

Game and interpreter versions are different because game and interpreter are two different software components. The <i>game</i> is indeed a whole made of images, text and scripts, compacted and encoded into specific resource files inside the directory while the <i>interpreter</i> is a software program which job is to decode these files and interpret them in order to run the game on our computer.<br/><br/>

The same keys combo seen above is still valid if we are playing the game using <i>ScummVM</i>!<br/><br/>

<?php img("images/ver-game-scummvm.png", 100, "margin-bottom: 2ch; margin-top:2ch;");?>

Here's a table where I listed all the informantion about my LucasArts games:<br/><br/>

<table>
    <tr>
        <th rowspan="2"> </th>
        <th colspan="3">Interpreter</th>
        <th colspan="2">Game</th>
    </tr>
    <tr>
        <th>executable</th>
        <th>ver.</th>
        <th>timestamp</th>
        <th>ver.</th>
        <th>timestamp</th>

    </tr>
    <tr>
        <th>Monkey Island</th>
        <td>monkey.exe</td>
        <td>5.3.04 CD</td>
        <td>Apr 12 1994 15:49:24</td>
        <td>CD-ROM version 2.3</td>
        <td>//</td>
    </tr>
    <tr>
        <th>Indiana Jones and the Fate of Atlantis</th>
        <td>atlantis.exe</td>
        <td>5.2.23cd</td>
        <td>Sept 28 1994 14:32:05</td>
        <td>Ver 1.0 ITA</td>
        <td>20-09-92</td>
    </tr>
    <tr>
        <th>Monkey Island: LeChuck Revenge</th>
        <td>monkey2.exe</td>
        <td>5.2.25cd</td>
        <td>Sept 26 1994 12:09:02</td>
        <td>Ver 1.0</td>
        <td>21-11-91</td>
    </tr>
    <tr>
        <th>Day of The Tentacle</th>
        <td>tentacle.exe</td>
        <td>6.4.2</td>
        <td>Jun 02 1993 18:04:22</td>
        <td>Ver 1.0 ITA</td>
        <td>//</td>
    </tr>
    <tr>
        <th>Sam & Max Hit the Road</th>
        <td>samnmax.exe</td>
        <td>7.0.2F</td>
        <td>Jun 29 1994 15:39:02</td>
        <td>Ver CD 1.0</td>
        <td>05-01-95</td>
    </tr>
    <tr>
        <th>Full Throttle</th>
        <td>ft.exe</td>
        <td>7.3.5</td>
        <td>Jul 06 1995 10:40:24</td>
        <td>//</td>
        <td>//</td>
    </tr>
    <tr>
        <th>The Dig</th>
        <td>dig.exe</td>
        <td>7.5.0i2</td>
        <td>Feb 09 1996 13:31:00</td>
        <td>Ver 1.0</td>
        <td>//</td>
    </tr>
</table>

<?php h("References");?>

<ul>
  <li>Accordi Richards, M. (2014). <a href="http://www.carocci.it/index.php?option=com_carocci&task=schedalibro&Itemid=72&isbn=9788843074167">Storia del videogioco</a>. Carocci Editore. It's a book I bought in Italy but I think there's a lot of books about the history of videogams that can do the job!</li>
  <li>from Wikipedia: <a href="https://en.wikipedia.org/wiki/Adventure">adventure game genre</a>, <a href="https://en.wikipedia.org/wiki/Interactive">interactive fiction</a>, <a href="https://en.wikipedia.org/wiki/Choose">Choose your own adventure</a>;</li>
  <li><a href="https://en.wikipedia.org/wiki/Sierra">Sierra On-Line</a>Entertainment <a href="https://en.wikipedia.org/wiki/Adventure_Game_Interpreter">AGI</a> and <a href="http://sciwiki.sierrahelp.com/index.php?title=Sierra_Creative_Interpreter">SCI</a> Game interpreters;</li>
  <li><a href="http://wiki.scummvm.org/index.php/SCUMM/Versions">Here</a> the ScummVM <i>Technical Reference</i> Wiki page dedicated to SCUMM versions.</li>
</ul>
