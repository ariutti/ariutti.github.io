<?php genheader("Game Audio series: iMuse, pt1 - intro", "December 23, 2024");?>


<?php img("images/lucasarts-logo.png", 20, "float:right; margin-bottom: 2ch; margin-right: 1ch; margin-left:2ch;");?>

<p>This post aims to be the first in a series dedicated to a very personal research journey into the technologies involved in the audio of 1990s video games, particularly the adventure games by LucasArts.</p>

<p>I’d like to share here what I’m learning about how the <b>iMuse</b> system works, along with other related technologies such as <b>MIDI</b> - on which iMuse is predominantly based - the <b>Roland MT-32</b> synthesizer, the <b>Yamaha YM-3812</b> chip - used in the well-known <i>AdLib</i> and <i>SoundBlaster</i> sound cards - and everything else that surrounds them.</p>

<p>My research does not claim to be exhaustive on the subject, nor do I have any specific goal other than to enjoy the process of learning new things about both the technology and the video games that accompanied me so much during my childhood.</p>


<?php h("What is iMuse?");?>

<?php img("images/iMuse-system-logo.png", 25, "float:left; margin-bottom: 2ch; margin-right: 2ch; margin-left:1ch;");?>

<p>iMuse, acronym for <b>I</b>nteractive <b>Mu</b>sic <b>S</b>treaming <b>E</b>ngine, was a proprietary software system developed for the soundtrack playback of adventure games (and beyond) produced by LucasArts starting in the early 1990s.</p>

<p>An audio engine capable of delivering a dynamic, real-time soundtrack to the player, responsive to in-game events without interruptions. iMuse was an innovative and unique project for its time. It is cited in virtually every book discussing the topic of audio in video games (“Game Sound”<?php footnote("'Game Sound', Karen Collins, MIT press", "https://mitpress.mit.edu/9780262537773/game-sound/");?> by Karen Collins, to name one of the most notable).</p>

<p>The credit for this invention goes to the composer and developer <b>Michael Land</b>. At the time, Land had recently joined the LucasArts team and had contributed to composing the soundtrack for “<i>The Secret of Monkey Island</i>”<?php footnote("'The Secret of Monkey Island' wiki page", "https://en.wikipedia.org/wiki/The_Secret_of_Monkey_Island");?>.</p>

<?php img("images/MI2.jpg", 25, "float:right; margin-bottom: 2ch; margin-right: 1ch; margin-left:2ch;");?>


<p>Shortly after the game’s release in late 1990, Land began envisioning a new, more powerful and versatile audio engine that could better meet the artistic needs of video game entertainment. For instance, until then, transitions between musical moods, even in high-quality games, were often abrupt, breaking the illusion and thus shattering the suspension of disbelief. For Land, this had become unacceptable.</p>

<p>Land and <b>Peter McConnel</b>, Land’s friend and colleague who had also joined the LucasArts team by then, began working together to implement the new system. The task was challenging: partly due to the ambitious nature of the project and also because they aimed to integrate it into a new game, “<i>Monkey Island 2: LeChuck’s Revenge</i>”<?php footnote("'Monkey Island 2: Le chuck’s revenge' wiki page", "https://en.wikipedia.org/wiki/Monkey_Island_2:_LeChuck%27s_Revenge");?>, which was under development and set for release soon.</p>

<p>In December 1991, “Monkey Island 2” was released, marking the debut of the iMuse system in the video game world.</p>

<div style="clear:both;"></div>

<hr/>

<p>The most frequently cited example, which serves to provide an initial idea of the capabilities of the new audio engine, is the musical accompaniment heard in the introductory part of Monkey Island 2, when the game’s protagonist, Guybrush Threepwood, strolls through the harbor-town of Woodtick.</p>


<div style="text-align: center; margin-top:2ch; margin-bottom:2ch;">
<video width="100%" controls>
<!-- <source src="videos/mi2_example_1.mp4" type="video/mp4"> -->
 <source src="videos/mi2_example_1.webm" type="video/webm">
Your browser does not support the video tag.
</video>
<p style="font-size: 0.75em; vertical-align:top; text-align:center;">Me playing the woodtick sequence of my copy of Monkey Island 2 (italian version) through ScummVM and OBS<br/>. The sounds you hear are rendered by a (virtualized) Roland MT-32.</p>
</div>


<!-- <?php img("images/monkey2-scabb.gif", 80, "margin-bottom: 2ch; margin-top: 0ch");?> -->

There is an initial musical accompainement che si arricchisce di volta in volta di nuovi arrangiamenti per il tema musicale principale,

<p>There is an initial musical accompaniment that is progressively enriched with new arrangements for the main musical theme each time Guybrush enters a new location (<i>room</i>).</p>

<p>Since video games are not traditional linear media like movies, it is impossible to predict the player’s choices or when they will occur. The composer cannot anticipate these events but must instead prepare all the necessary music material to account for the various possibilities.</p>

<p>The composer writes the various musical themes and creates different arrangements for each location. Additional transitional material is then composed to seamlessly lead from one arrangement to another for those unpredictable moments when such changes might occur during gameplay (a massive amount of work).</p>

<p>The power of iMuse lies in its ability to conditionally select and arrange this material based on the game's events.</p>

<p>One could spend hours wandering around the Woodtick area, entering and exiting different rooms at arbitrary times, without the soundtrack ever stopping: the main theme plays continuously, enriched each time with new arrangement elements characteristic of the specific room, transitioning through smooth and ingenious passages.</p>

<p>Another example that is particularly dear to me is also found in Monkey Island 2, when Guybrush is in the swamp to visit the Voodoo Lady.</p>

<p>At the edge of the swamp, the accompanying music consists of a simple melodic line outlining the main theme of this room. As soon as Guybrush boards the coffin-boat, the theme is enriched with a new part. While Guybrush navigates to the right, this vertical layering of the accompaniment continues, with new parts being added progressively. At the point just before Guybrush reaches the Voodoo Lady's hut, it is the music that dictates the game: the platform can only rise in correspondence with a specific musical accent, carefully placed at a well-considered point in the musical bar.</p>

<div style="text-align: center; margin-top:2ch; margin-bottom:2ch;">
<video width="100%" controls>
<source src="videos/mi2_example_3.webm" type="video/webm">
Your browser does not support the video tag.
</video>

<p style="font-size: 0.75em; vertical-align:top; text-align:center;">An in-game footage I recorder with ScummVM and OBS<br/>playing in the Voodoo lady swamp room (sound is rendered via a virtual Roland MT-32)</p>
</div>

<?php h("");?>

<p>A few years later, in 1994, Land and McConnel, driven by internal company requirements, filed a patent<?php footnote("iMuse Patent number US_5315057", "resources/US_5315057_A.pdf");?> to intellectually protect the newly invented technology (we will frequently refer to this patent later).</p>

<p>From that point on, the iMuse system was expanded, improved, and used in subsequent LucasArts video games.</p>

<p>For those who wish to learn more about the iMuse system and, more generally, about Michael Land as a person, I highly recommend watching this excellent interview conducted by Daniel Albu.</p>

<iframe width="100%" height="360" src="https://www.youtube.com/embed/uHqAG8CLblA?si=o5FLyf9VLM8sGvuN" allowfullscreen></iframe><br/><br/>

<?php h("Let’s dive in");?>

<p>In the context of LucasArts adventure games, iMuse works hand in hand with the SCUMM interpreter<?php footnote("SCUMM: if you know it, you love it!", "https://ariutti.github.io/articles/scumm_first/index.html");?> and is capable of “intelligently” playing portions of pre-composed music stored in a database of sound resources (in MIDI format) that are specifically “annotated,” so to speak, by the composers.</p>

<p>These annotations, expressed in the form of system exclusive (<b>SysEx</b>) messages, are embedded at specific points in the various MIDI files. iMuse examines these messages and takes corresponding actions depending on the player’s behavior or the events triggered by the game itself, generating smooth transitions and various changes in the soundtrack.</p>

<p>We know that a MIDI file is not an audio file but rather a musical score, a list of instructions (<i>performance data</i>) to be sent to some kind of device capable of interpreting them and ultimately rendering them as audible sound vibrations. It is within this device, we might say, that the actual “timbres” reside, which will play the musical notes and interpret the score as conceived by the composers.</p>

<p>A first question we might ask, then, is the following:</p>

<?php h("How sound was actually rendered back in the days?");?>

<p>We are talking about the 1990s, focusing on the world of personal computers. Gamers who owned a personal computer could be primarily divided into three distinct categories based on the hardware available to them for audio playback (as <a href="https://youtu.be/uHqAG8CLblA?si=DSB2fw6FIPR9010y&amp;t=958">Michael Land mentions</a> in the interview referenced above).</p>

<ol type="1">
<li><p>The most demanding gamers owned the most cutting-edge device available at the time: a multitimbral and multichannel MIDI-based synthesizer produced by Roland, known as the MT-32;</p></li>

<li><p>Most gamers, however, did not own a Roland MT-32 but had instead opted to equip their PC with a much more affordable sound expansion card. This could be either the AdLib card or the SoundBlaster card. Both cards featured a single FM synthesis sound chip, the Yamaha YM3812 (also called <b>OPL2</b>);</p></li>

<li><p>Finally, the most unfortunate gamers had neither of these systems. This, however, did not mean they couldn’t listen to audio on their PC: every PC came from the factory with a small integrated speaker whose sole purpose was to notify the user of the PC's status with loud and annoying beeps. Although monophonic and with a square wave as the only available timbre, it was possible to hear a rudimentary game soundtrack through this small PC speaker;</p></li>
</ol>

<p>It is easy to imagine how the three hardware solutions available on the market at the time were far from providing the same auditory experience to the listener. Not to mention the fact that all three technologies had their own distinct requirements and idiosyncrasies in terms of interfacing with the game software.</p>

<?php h("Triple Work"); ?>

<p>Composers were therefore required to produce three different solutions, each tailored to a specific technology, taking into account its limitations and strengths, and leveraging, as much as possible depending on the skill of the composer/developer, the unique characteristics of the specific technology.</p>

<p>The process began by crafting a musical sound product of the highest possible quality, then progressively scaling it down for less capable systems while striving to maintain a certain degree of consistency. The compositions were initially conceived, composed, and orchestrated with the goal of sounding optimal on the MT-32. From there, a first reduction was created, considering the limitations of the next technological system, the OPL2. Finally, the last and most drastic reduction was made to adapt the soundtrack to the PC speaker.</p>

<p>This work of composition and subsequent reductions could fall to a single composer. Alternatively, for instance, it could happen that the composer focused exclusively on creating good “transcriptions” for the OPL2 from compositions previously written by other colleagues for the Roland system.</p>

<p>When I learned about this kind of workflow, I was deeply impressed: producing a soundtrack for a video game at that time was essentially triple the work.</p>

<p>I am perhaps even more struck by the fact that much of this work was barely perceived by the gamer. In my experience, for example, belonging to the second category of gamers so to speak, I never had the opportunity to enjoy the compositions in their “original” version for the MT-32, nor was I even aware of their existence.</p>

<?php h("MIDI everywhere"); ?>

<p>Another thing I found interesting is that, regardless of the technology in question, the corresponding “score” always expressed in MIDI format and saved as such within the game’s sound resources.</p>

<p>I want to emphasize this detail because, by studying the workflow of contemporary “<i>id Software</i>,” a proprietary file format called IMF emerges. We will discuss this in a dedicated article. For now, suffice it to say that we can focus on a single “standard” format: the MIDI file.</p>

<?php h("Next steps..."); ?>

<p>In the next post, I would like to talk about the sound resources of a LucasArts video game and examine them in depth through a concrete example. I would like to start introducing the concepts of Hooks and Markers and share some Python scripts to get our hands a little dirty.</p>

<p>See you very soon, and until next time...</p>



<!--
<hr />
<h2 id="perchè-credo-sia-importante-conoscere-imuse">Perchè credo sia importante conoscere iMUSE</h2>
<p>Ritengo che, per chi come me, appassionato di musica per contesti interattivi, studiare il funzionamento di iMuse possa aggiungere al proprio bagaglio di conoscenze una serie di preziosi insegnamenti, da applicare magari anche in altri contesti.</p>
<p>iMuse è un sistema che vive al margine di diverse discipline, tutte in dialogo tra loro, dalla composizione alla cumputer science al dal sound engineering al sound design.</p>
<p>Ritengo che iMuse sia un magnifico esempio di un approccio orizzontale, olistico, alle cose, quello di Land nello specifico ma di tutti i compositori e sound designer di quel periodo storico e precedenti. All’epoca chi scriveva musica per videogiochi non era soltanto un musicista ma anche un tecnico e sviluppatore software - tra il resto - con una profonda conoscenza dei sistemi tecnolgici al contorno della loro principale mansione.</p>
<p>Michael Land non è soltanto un compositore di grande sensibilità e bravura (basti avere giocato “the Dig” solo per citare un gioco fra tutti per accorgersene) ma allo stesso tempo è un tecnico preparato e consapevole.</p>
<p>In epoche più recenti, sistemi middleware hanno reso i compositori via via sempre più indipendenti dai dettagli implementativi, ma Land faceva ancora parte delle “vecchia scuola” ed è forse per questo che iMuse è stata - ed è tutt’ora ritengo - così efficacie perchè è stato scritto di primo pugno da un “vero addetto ai lavori”.</p>
-->
