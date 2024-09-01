<?php genheader("Scumm: if you know it, you love it!", "July 12, 2017");?>

Graphic adventure videogames are extraordinary multimedial pieces of art.<br></br>

Born as the natural evolution of textual adventures of the early 80', graphic adventures enclose all the features of a movie: plot, dialogues, characters, images, animations, soundtrack, sound and visual effects.<br></br>

In addition to movies, graphic adventures are interactive: the player is the protagonist.<br></br>

My youth as been deeply influenced by <b>LucasArts</b> graphical adventures: these games really shaped in me the concept of videogame entertainment!

<!-- The <b>LucasArts</b> is the software house which I'm more attached to and whose games I've played more than other's. -->

<?php h("SCUMM");?>

Technically speaking, if we try to put ourself in an adventure games developer's shoes for a moment, we will notice soon how many data (<i>assets</i>) we must deal with: we have audio files for the soundtrack, we have sound effects and sometimes also voice recordings, we have a lot of images, one for each single frame of characters animations but also images for the background art and the objects the player could interact with during the game.<br></br>

Futhermore we have dialogue text strings, we have code scripts which the behaviour of the actors depends on, gameplay mechanics, decisional trees, whose structure can modify the story flow depending on the player actions, and a lot more...<br></br>

Back to the early LucasArts years (still <i>LucasFilm games</i> at that time), the greatest problem in developing such a game could have been mainly caused by the fact it would have taken years to write the game code using only the <i>assembly</i> language.<br></br>

<!-- {% comment %}, beyond of this huge amount of resources (<i>assets</i>) needed, {% endcomment %} -->

They needed some kind of tool to make this process quicker and easier for developers and content creators to use and, eventually, this tool was soon created from scratch.<br></br>

Since <b>Maniac Mansion</b>, their first adventure game, LucasArts developers started to use <b>SCUMM</b><?php footnote("SCUMM Wikipedia page", "https://en.wikipedia.org/wiki/SCUMM");?> (<b>S</b>cript <b>C</b>reation <b>U</b>tility for <b>M</b>aniac <b>M</b>ansion) a special programming language and toolbox particularly designed for this kind of videogames.

<?php img("images/scumm-bar.png", 100, "margin-bottom: 2ch; margin-top:2ch;");?>

Thanks to SCUMM, programmers would have been able to manipulate the huge amount of game assets in a relatively easy way, taking benefit from a series of ad-hoc pre-packaged functions, writing more compact and human-readible scripts, without troubling themself with countless lines af low level code.<br></br>

The term SCUMM can also be extended to the way assets were encoded and packed together on large "<i>container files</i>", inside of which the game scripts were also stored (game scripts can be considered as assets too!)<br></br>

Then, those "<i>container files</i>" were read and decoded by a special computer program in order to eventually run the actual game! This program was the SCUMM <b>interpreter</b> (later it was given the name <b>SPUTM</b> which stands for <b>S</b>CUMM <b>P</b>resetation <b>U</b>tility (<b>tm</b>) <?php footnote("'The SCUMM Diary: Stories behind one of the greatest game engines ever made' article by Mike Bevan", "https://www.gamedeveloper.com/design/the-scumm-diary-stories-behind-one-of-the-greatest-game-engines-ever-made");?>).<br></br>

<div style="text-align: center;">
<?php img("images/scumm-system.png", 50, "margin-bottom: 2ch; margin-top:2ch;");?><br></br>
</div>

Indeed it was a veritable virtual machine (<i>process virtual machines</i>) designed to run a single computer program - the game itself - giving it an abstract execution enviroment, indipendent from the underlying platform.<br></br>

With game interpreters it was eventually possible to keep assets separated from the game implementation details whose were strictly dependent on the hardware and different from platform to platform (<i>Commodore</i>, <i>Pc</i> o <i>Apple</i> for example). <br></br>

<div style="text-align: center;">
<?php img("images/scumm-interpreter-2.png", 50, "align:center; margin-bottom: 2ch; margin-top:2ch;");?>
</div>

With the passing of time and the emergence of new systems and devices, these games could no longer be played because their interpreters were no longer up to date to adapt to the hardware features of modern machines.<br></br>

And here's the <b>ScummVM</b> team!

<?php h("ScummVM");?>

<?php img("images/scummvm-128.png", 21, "float: left; margin-bottom: 2ch; margin-left: 2ch; margin-right:1ch;");?>

The idea which is the base of the ScummVM developers work is simple: build new SCUMM interpreters<?php footnote("ScummVM Project", "http://www.scummvm.org/");?><?php footnote("ScummVM Project Wikipedia page", "https://en.wikipedia.org/wiki/ScummVM");?>!<br></br>

As today (July 2017), after 15 years of development<?php footnote("'Maniac Tentacle Mindbenders: How ScummVM’s unpaid coders kept adventure gaming alive' article by Richard Moss. An interesting article on ScummVM history, have a good read", "http://arstechnica.com/gaming/2012/01/16/maniac-tentacle-mindbenders-of-atlantis-how-scummvm-kept-adventure-gaming-alive/");?>, the ScummVM project makes it possible to run these games on a myriad of platforms such as Windows, Linux, Mac, PlayStation3, iOS, Android, Dreamcast, Tizen, Amiga OS, SamsungTV only to name a few.<br></br>

Futhermore, even if the core of the project were initially focoused on LucasArts SCUMM games solely, as ScummVM name suggests, now ScummVM is huge and integrates a lot of game interpreters from other good-old-days software houses like <i>Sierra</i>, <i>Revolution Software</i>, <i>Activision</i>, <i>Coktel Vision</i> and more, and it is growing every day.<br></br>

ScummVM exists thanks to the collaboration of hundreds of developers and adventure games enthusiasts. As said before and shown on the following video, the project contains the code of a huge amount of different game interpreters of the "<i>graphical adventure</i>" game genre. ScummVM also contains code from other software projects which were born indipendently like the <b>Munt</b> project<?php footnote("The Munt project (a Roland MT-32 software emulation)", "https://github.com/munt/munt");?>, used to emulate the Rolant MT-32 sound card and its typical sounds.<br></br>

<iframe width="100%" height="315" src="https://www.youtube.com/embed/iZpf15F3ink" allowfullscreen></iframe><br></br>

We must consider that at the very heart of the ScummVM project there is even a greater work: the <b>retro-engineering</b> which took place on the binary files of the original games! This was necessary (and it still is indeed) because software houses never released the source codes of their games.<br></br>

Fortunately there are some exceptions, as the case of <i>Revolution Software</i> which gave free access to their games source codes such as <i>Lure of the Temptress</i> and <i>Beneath a Steel Sky</i>, saving ScummVM developers from the umpteenth headache and, at the same time, garanteeing a brand new life to these games!<br></br>

The same was for <i>Adventure Soft</i> and other software houses which, in this sharing spirit, released freeware versions of their games that are now downloadable from the ScummVM project website directly<?php footnote("ScummVM Project freeware games page", "http://www.scummvm.org/games/");?>.<br></br>

As an example of the great quality of the project and of the ScummVM developers cautious care for details, lies in the fact they have included codes to even solve <i>bugs</i> from games in their original version<?php footnote("LucasArts SCUMM games contained bugs too, and ScummVM (partially) solved them! A the page which shows them", "http://wiki.scummvm.org/index.php/SCUMM/Bugs");?>!<br></br>

<hr>

<b>Free software</b> is the leitmotif of the ScummVM project: another great note is that ScummVM is free software, all project source code is freely available and distributed with a GPL license.<br></br>

In short... hats off and long live to <b>ScummVM</b>!

<?php h("and then...");?>

ScummVM is certantly not the only project thanks to which it is possible to play again our old videogames or programs. Among all other options I think that <b>DOSBox</b> project is noteworthy here<?php footnote("DOSBox Project home page", "http://www.DOSBox.com/");?><?php footnote("DOSBox Project Wikipedia page", "https://en.wikipedia.org/wiki/DOSBox");?>.<br></br>

<?php img("images/dosbox-128.png", 21, "float: left; margin-bottom: 2ch; margin-right: 2ch; margin-top:1ch;");?>

With DOSBox we are always talking about a virtual machine even if it is a <i>System virtual machine</i> instead of a <i>Process virtual machine</i>. An emulation of a complete system therefore: an IBM PC compatible machine running a DOS operating system, with emulation of graphic peripherals and IBM compatible sound card.<br></br>

This means that old programs (not just games) are provided an environment where they can work properly, unaware to run on top of a modern device!<br></br>

The DOSBox project is a little younger than ScummVM (the first release for DOSBox dates back to June 2002 while the ScummVM one in October 2001) and, just like ScummVM, this is <b>free software</b>, licensed under the GNU GPL.

<?php h("Other References");?>

<ul>
<li>An interesting <a href="https://www.youtube.com/watch?v=wNpjGvJwyL8">talk</a> by <i>Ron Gilbert</i> at <i>Game Forum Germany 2011</i>. Here Gilbert talks about <i>Maniac Mansion</i> and about <i>SCUMM</i> engine origin, with some curiosity;</li>
<li><a href="http://wiki.scummvm.org/index.php/SCUMM">SCUMM engine</a> page taken directly from the ScummVM Wiki;</li>
<li>Othere interesting link from Wikipedia: <a href="https://en.wikipedia.org/wiki/Virtual_machine">Virtual Machine</a>;</li>
</ul>
