---
layout: post
title: ScummVM, if you know it, you love it!
date: 2017-07-12 09:00:00
excerpt: SCUMM and ScummVM, what are the two?
category: [game, scumm]
---

Graphic adventure videogames are extraordinary multimedial pieces of art.

Born as the natural evolution of textual adventures of the early 80', graphic adventures enclose all the features of a movie: plot, dialogues, characters, images, animations, soundtrack, sound and visual effects.

In addition to movies, graphic adventures are interactive: the player is the protagonist.

My youth as been deeply influenced by **LucasArts** graphical adventures: these games really shaped in me the concept of videogame entertainment!

{% comment %}
The **LucasArts** is the software house which I'm more attached to and whose games I've played more than other's.
{% endcomment %}

## SCUMM

Technically speaking, if we try to put ourself in an adventure games developer's shoes for a moment, we will notice soon how many data (_assets_) we must deal with: we have audio files for the soundtrack, we have sound effects and sometimes also voice recordings, we have a lot of images, one for each single frame of characters animations but also images for the background art and the objects the player could interact with during the game.

Futhermore we have dialogue text strings, we have code scripts which the behaviour of the actors depends on, gameplay mechanics, decisional trees, whose structure can modify the story flow depending on the player actions, and a lot more...

Back to the early LucasArts years (still _LucasFilm games_ at that time), the greatest problem in developing such a game could have been mainly caused by the fact it would have taken years to write the game code using only the _assembly_ language.

{% comment %}, beyond of this huge amount of resources (_assets_) needed, {% endcomment %}

They needed some kind of tool to make this process quicker and easier for developers and content creators to use and, eventually, this tool was soon created from scratch.

Since **Maniac Mansion**, their first adventure game, LucasArts progemmers started to use **SCUMM** (<b>S</b>cript <b>C</b>reation <b>U</b>tility for <b>M</b>aniac <b>M</b>ansion) **[a]**, a special programming language and toolbox particularly designed for this kind of videogames.

![Scumm bar]({{ site.baseurl }}/assets/images/scumm/scumm-bar.png)

Thanks to SCUMM, programmers would have been able to manipulate the huge amount of game assets in a relatively easy way, taking benefint from a series of ad-hoc pre-packaged functions, writing more compact and human-readible scripts, without troubling themself with countless lines af low level code.

The term SCUMM can also be extended to the way assets were encoded and packed together on large "_container files_", inside of which the game scripts were also stored (game scripts can be considered as assets too!)

Then, those "_container files_" were read and decoded by a special computer program in order to eventually run the actual game! This program was the SCUMM **interpreter** (later it was given the name **SPUTM** which stands for <b>S</b>CUMM <b>P</b>resetation <b>U</b>tility (**tm**) **[h]**).

![Scumm interpreter]({{ site.baseurl }}/assets/images/scumm/scumm-interpreter-2.png){: width="60%;"}

Indeed it was a veritable virtual machine (_process virtual machines_) designed to run a single computer program - the game itself - giving it an abstract execution enviroment, indipendent from the underlying platform.

With game interpreters it was eventually possible to keep assets separated from the game implementation details whose were strictly dependent on the hardware and different from platform to platform (_Commodore_, _Pc_ o _Apple_ for example).

![SCUMM system]({{ site.baseurl }}/assets/images/scumm/scumm-system.png){: width="60%;"}

With the passing of time and the emergence of new systems and devices, these games could no longer be played because their interpreters were no longer up to date to adapt to the hardware features of modern machines.

And here's the **ScummVM** team!

## ScummVM

![ScummVM Logo]({{ site.baseurl }}/assets/images/scumm/scummvm-128.png){: align="left"}

The idea which is the base of the ScummVM developers work is simple: build new SCUMM interpreters! **[c]**

As today (July 2017), after 15 years of development **[d]**, the ScummVM project makes it possible to run these games on a myriad of platforms such as Windows, Linux, Mac, PlayStation3, iOS, Android, Dreamcast, Tizen, Amiga OS, SamsungTV only to name a few.

Futhermore, even if the core of the project were initially focoused on LucasArts SCUMM games solely, as ScummVM name suggests, now ScummVM is huge and integrates a lot of game interpreters from other good-old-days software houses like _Sierra_, _Revolution Software_, _Activision_, _Coktel Vision_ and more, and it is growing every day.

ScummVM exists thanks to the collaboration of hundreds of developers and adventure games enthusiasts. As said before and shown on the following video, the project contains the code of a huge amount of different game interpreters of the "_graphical adventure_" game genre. ScummVM also contains code from other software projects which were born indipendently like the **Munt** project **[e]**, used to emulate the Rolant MT-32 sound card and its typical sounds.

<iframe width="100%" height="315" src="https://www.youtube.com/embed/iZpf15F3ink" allowfullscreen></iframe>

We must consider that at the very heart of the ScummVM project there is even a greater work: the **retro-engineering** which took place on the binary files of the original games! This was necessary (and it still is indeed) because software houses never released the source codes of their games.

Fortunately there are some exceptions, as the case of _Revolution Software_ which gave free access to their games source codes such as _Lure of the Temptress_ and _Beneath a Steel Sky_, saving ScummVM developers from the umpteenth headache and, at the same time, garanteeing a brand new life to these games!

The same was for _Adventure Soft_ and other software houses which, in this sharing spirit, released freeware versions of their games that are now downloadable from the ScummVM project website directly **[f]**.

As an example of the great quality of the project and of the ScummVM developers cautious care for details, lies in the fact they have included codes to even solve _bugs_ from games in their original version **[j]**!

---

**Free software** is the leitmotif of the ScummVM project: another great note is that ScummVM is free software, all project source code is freely available and distributed with a GPL license.

In short... hats off and long live to **ScummVM**!

## and then...

ScummVM is certantly not the only project thanks to which it is possible to play again our old videogames or programs. Among all other options I think that **DOSBox** project is noteworthy here **[g]**.

![DOSBox Logo]({{ site.baseurl }}/assets/images/scumm/dosbox-128.png){: align="left"}

With DOSBox we are always talking about a virtual machine even if it is a _System virtual machine_ instead of a _Process virtual machine_. An emulation of a complete system therefore: an IBM PC compatible machine running a DOS operating system, with emulation of graphic peripherals and IBM compatible sound card.

This means that old programs (not just games) are provided an environment where they can work properly, unaware to run on top of a modern device!

The DOSBox project is a little younger than ScummVM (the first release for DOSBox dates back to June 2002 while the ScummVM one in October 2001) and, just like ScummVM, this is **free software**, licensed under the GNU GPL.

## References

### Links

* **[a]** from Wikipedia: [SCUMM](https://en.wikipedia.org/wiki/SCUMM);
* **[b]** an interesting [talk](https://www.youtube.com/watch?v=wNpjGvJwyL8) by _Ron Gilbert_ at _Game Forum Germany 2011_. Here Gilbert talks about _Maniac Mansion_ and about _SCUMM_ engine origin, with some curiosity;
* **[c]** ScummVM Project: [home Page](http://www.scummvm.org/), wikipedia [page](https://en.wikipedia.org/wiki/ScummVM);
* **[d]** An interesting [article](http://arstechnica.com/gaming/2012/01/16/maniac-tentacle-mindbenders-of-atlantis-how-scummvm-kept-adventure-gaming-alive/) on ScummVM history. The article is written by _Richard Moss_ and is titled "_Maniac Tentacle Mindbenders: How ScummVM’s unpaid coders kept adventure gaming alive_", have a good read;
* **[e]** The [Munt](https://github.com/munt/munt) project (a Roland MT-32 software emulation);
* **[f]** ScummVM Project: [freeware](http://www.scummvm.org/games/) games page;
* **[g]** DOSBox Project: [home page](http://www.DOSBox.com/), Wikipedia [page](https://en.wikipedia.org/wiki/DOSBox);
* **[h]** Gamasutra [article](http://www.gamasutra.com/view/feature/196009/the_scumm_diary_stories_behind_.php?print=1): "_The SCUMM Diary: Stories behind one of the greatest game engines ever made_" by _Mike Bevan_;
* **[i]** [SCUMM engine](http://wiki.scummvm.org/index.php/SCUMM) page taken directly from the ScummVM Wiki;
* **[j]** Also LucasArts SCUMM games contained bugs, and ScummVM (partially) solved them! This is the [page](http://wiki.scummvm.org/index.php/SCUMM/Bugs) which shows them;
* Othere interesting link from Wikipedia: [Virtual Machine](https://en.wikipedia.org/wiki/Virtual_machine);

{% comment %}
---
    <p><b>SCUMM under the hood!</b></p>
    <ol>
    <li><a href="#ver">Versioni</a>: Interprete SCUMM & SCUMM Games;</li>
    <li><a href="#glossario">Glossario</a>: capiamoci! Un po' di terminologia utile;</li>

    <!--  -->

    <li><a href="#risorse">Risorse</a>: come è strutturato l'insieme delle risorse di un gioco LucasArts;</li>
    <li>ScummVM <a href="#debugger">Debugger</a>, un primo strumento per esplorare lo SCUMM game!</li>
    <li><a href="#boxes-walk-matrix">Boxes e Walk Matrix</a>;</li>
    <li>SCUMM <a href="#descumming-scripts">Scripts</a>: come decodificarli;</li>
    <li><a href="#tools-01">Tools</a> per creare;</li>
    <li><a href="#tools-02">Tools</a> per analizzare e per giocare;</li>
    <li><a href="#descumming-scripts">Descumming Scripts</a>;</li>
    <li><a href="#deluaing-scripts">De-Lua-ing Scripts</a>;</li>
    <li><a href="#scaling">Scaling</a>;</li>
    <li>Roland <a href="#roland">MT-32</a>;</li>
    <li><a href="#imuse">iMuse</a>;</li>

    </ol>  

    <p><b>Curiosità</b></p>
    <ol>
    <li>Old <a href="#copy-protection">copy protection</a> systems;</li>

    <li><a href="#json">JSON</a> & LucasFilm games</li>

    </ol>

---

I videogiochi di avventura grafici sono opere multimediali sbalorditive.

Nate come naturale evoluzione delle avventure testuali dei primi '80, la avventure grafiche racchiudono al loro interno tutte le caratteristiche di un film: storia, dialoghi, personaggi, immagini, animazioni, colonna sonora, effetti sonori e visivi. In più l'avventura grafica è interattiva: il giocatore è il protagonista!

Tra tutte le software house che producevano avventure grafiche all'inizio degli anni '90, sicuramente quella a cui sono più affezionato è stata la **LucasArts**.

I loro giochi hanno profondamente cambiato il mio concetto di intrattenimento videoludico!

Dal punto di vista tecnico, se proviamo a metterci nei panni di chi le avventure grafiche le realizzava, ci si rende subito conto che è notevole la mole di dati da gestire: si parla di file audio per le musiche, gli effetti sonori e le voci dei personaggi, le immagini per descrivere i vari frame delle animazioni, oppure i fondali e gli oggetti con cui il giocatore interagisce. Ci sono poi le stringhe di testo relative ai dialoghi, i codici che regolano i comportamenti degli '_attori_' all'interno del gioco, le meccaniche del gameplay, gli alberi logici decisionali su base dei quali talvolta l'avventura può modificare il proprio corso a seconda della azioni intraprese, etc...

Non si trattava soltanto di un problema di risorse (moltissime e di tipologia differente tra loro), il problema più grande era dato dal fatto che sarebbero occorsi anni per scrivere tutto il codice sorgente di un solo videogioco usando il linguaggio **assembly**. Uno strumento in grado di ottimizzare questo workflow ancora non esisteva, e venne ben presto creato dal nulla...

<!-- e, poco a poco, spinto dal desiderio costante di "<em>smontare le cose per vedere come sono fatte dentro</em>", oltre a continuare a giocarci, ho cominciato a smontarli, un pezzo alla volta, per cercare di capire come funzionassero.</p> -->

### SCUMM

Sin dalla loro prima avventura grafica, sto parlando di **Maniac Mansion**, i programmatori della LucasArts (allora ancora LucasFilm games) utilizzarono un sistema di loro invenzione: SCUMM (**Script Creation Utility** for **Maniac Mansion**) <b>[a]</b>, un linguaggio di programmazione appositamente studiato per facilitare la creazione di questo tipo di videogiochi.

I programmatori sarebbero così stati in grado di manipolare la moltitudine di risorse di cui il gioco aveva bisogno in modo tutto sommato semplice, sfruttando una serie di funzioni ad-hoc preconfezionate, stilando script, più compatti e comprensibili, senza perdersi nella stesura di innumerevoli righe di codice a basso livello.

Volendo, il termine SCUMM si può estendere al modo in cui i dati del gioco venivano codificati ed accorpati in grandi files contenitore, all'interno dei quali, oltre alle risorse di cui abbiamo parlato, venivano immagazzinati gli stessi scripts.

Questi files contenitore venivano poi letti e decodificati da uno speciale programma, diverso da piattaforma a piattaforma, così da eseguire il gioco vero e proprio. Questo programma era il cosiddetto **interprete** SCUMM (più tardi ribattezzato **SPUTM** come <b>S</b>CUMM <b>P</b>resetation <b>U</b>tility (<b>tm</b>) <b>[h]</b>). Si trattava di una vera e propria macchina virtuale (<em>process virtual machines</em>) progettata per eseguire un singolo programma per computer - il gioco appunto - fornendogli un ambiente di esecuzione astratto e indipendente dalla piattaforma.

Sistema SCUMM **=** codifica dei file di risorse **+** linguaggio di scripting **+** interprete SCUMM <b>[b]</b>
{: class="note"}

Con gli interpreti era così possibile mantenere separate le risorse del gioco (i cosiddetti **game assets**) dai dettagli di implementazione, più legati alle caratteristiche hardware della piattarforma su cui il gioco doveva essere giocato (_Commodore_, _Pc_ o _Apple_ ad esempio). Con il passare del tempo e la nascita di nuovi sistemi e dispositivi, ben presto questi giochi non poterono più essere messi in esecuzione in quanto i loro interpreti non sono più stati aggiornati per adattarli alle caratteristiche hardware delle macchine moderne.

Ed è qui che entra in gioco il Team ScummVM!

### ScummVM

L'idea che sta alla base del lavoro degli sviluppatori del sistema ScummVM è semplice: costruire nuovi interpreti SCUMM. <b>[c]</b>

Ad oggi (Maggio 2015), dopo 13 anni di sviluppo <b>[d]</b>, il progetto ScummVM rende possibile l'esecuzione di questi giochi su una miriade di piattaforme tra cui Windows, Linux, Mac, PlayStation3, iOS, Android, Dreamcast, Tizen, Amiga OS, SamsungTV, solo per citarne alcune,

senza contare che se inizialmente (come il nome stesso fa intuire) il core del progetto si focalizzava solamente su alcuni giochi della LucasArts, esso si è via via ingrandito tanto da contemplare giochi da innumerevoli software house (Sierra, Revolution Software, Activision, Coktel Vision etc...), espandendosi sempre più...

ScummVM nasce dalla collaborazione di centinaia di programmatori, e, come mostra il video qui sotto, si tratta di un software molto complesso e articolato che racchiude il codice di moltissimi interpreti diversi, non soltanto relativi ai videogiochi SCUMM. <br>ScummVM funziona su moltissime piattaforme e incorpora al suo interno codice da altri progetti software nati indipendentemente come ad esempio il progetto _Munt_<b>[e]</b>, per emulare la scheda audio Roland MT-32 e i suoi suoni tipici di quell'epoca.

<iframe width="560" height="315" src="https://www.youtube.com/embed/iZpf15F3ink" allowfullscreen></iframe>

Dobbiamo pensare che alla base di questo vi è un lavoro ancora più grande ossia quello della **retro-engineering** operata sui files binari dei giochi originali! Questo perchè le software house non hanno ancora rilasciato informazioni in merito ai propri codici sorgente.

Ci sono però alcune eccezioni, come nel caso della _Revolution Software_ che lasciò agli sviluppatori del progetto ScummVM libero accesso ai codici sorgente dei loro giochi _Lure of the Temptress_ e _Beneath a Steel Sky_, risparmiando loro i mal di testa derivati dall'ennesimo lavoro di retro-engineering.

Lo stesso fu poi per _Adventure Soft_ e altre software house che in questo spirito di condivisione rilasciarono versioni freeware dei loro giochi, scaricabili direttamente da una apposita pagina del progetto <b>[f]</b>.

Un esempio della qualità e della cura maniacale per i dettagli sta nel fatto che gli sviluppatori hanno incluso codici per risolvere persino i _bugs_ dei videogiochi nella loro versione originale! <b>[j]</b>

Lo spirito che anima il team di sviluppo è l'**open source**: altra grande nota di merito è che ScummVM è software **free** e che tutto il codice sorgente del progetto è liberamente fruibile e distribuito con licenza di tipo GPL.

Insomma ...tanto di cappello e lunga vita a **ScummVM**!

### e poi

Il progetto ScummVM non è certo l'unico attraverso il quale ci è possibile rigiocare ai vecchi giochi o far funzionare vecchi programmi. Tra tutte le altre possibilità credo doveroso menzionare il sistema **DOSBox** <b>[g]</b>.

![DOSBox Logo]({{ site.baseurl }}/assets/images/scumm/dosbox-128.png){: align="left" }

---

Si tratta sempre di una macchina virtuale, anche se in questo caso parliamo di una _System virtual machine_ anzichè di un _Process virtual machine_.

Una emulazione quindi di un sistema completo, un computer PC IBM compatibile con installato un sistema operativo DOS, con tanto di emulazione di periferiche grafiche e scheda audio IBM compatibile. Questo significa che ai vecchi programmi (non soltanto giochi) viene fornito un ambiente in cui questi possono funzionare correttamente, ignari di star girando su di un moderno dispositivo!

Il progetto DOSBox è di poco più giovane di ScummVM (la prima release per DOSBox risale al Giugno 2002 mentre quella per ScummVM all'Ottobre 2001) e, proprio come ScummVM si tratta di **software free**, distribuito con licenza GNU GPL.

{% endcomment %}
