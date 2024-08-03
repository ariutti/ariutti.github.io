---
layout: post
title: Scumm versions
date: 2017-07-18 09:00:00
excerpt: Let's talk about the different versions of Scumm interpreter
category: [game, scumm]
---

When back in 1987 **Ron Gilbert** and **Aric Wilmunder**, later nicknamed the "_SCUMM lords_", started working on SCUMM, the procedure to split game software into two different parts, _assets_ on one side and _interpreter_ on the other, was quite usual, at least for what concerns adventure videogames.

The thing was already beed tried out successfully by **Siera On-line** developers since 1984 with their **AGI** (<b>A</b>dventure <b>G</b>ame <b>I</b>nterpreter) and **SCI** (<b>S</b>ierra <b>C</b>reative <b>I</b>nterpreter) interpreters and earlier by the famous **Infocom**, back in 1979 with the **Z-machine**, the virtual machine in charge of intepreting resource files containing all the _interactive fiction_ contents.

By the way, if you search "_interactive fiction_" on Wikipedia, you will find that this is only one of the many sub-genres related to the overall adventure game one. Actually, interactive fiction was one of the first kind of adventure games which was bring to the market.

![Adventure genre hierarchy]({{ site.baseurl }}/assets/images/scumm/adventure-genre.png)

The change to use the mouse as a mean to interact with the game came later (from here the name _click-and-point_ adventure). The images too came later, initially only in black and white format, then in colors (vectorial and bitmap graphics).

Adventure games became _graphical_ only gradually while, at the beginning, the game experience consisted in reading the text shown on screen, maybe enriched with some sound effects, and in typing pairs of words, _verb-noun_, to fed the game _parser_ with and make the story going on.

Even more interesting can be to link the _interactive fiction_ genre to the "analog" version of it: I'm talking about the "**Choose your own adventure**" literary genre which gained a great popularity in the '80 but began to be experimented since the '40.

... better for me to stop here before to definitely loose myself in looking for the origin of the adventure genre. Anyway, from the reference section below you can find a list of useful links you can use yourself to go deeper into the subject.

{% comment %}
However I must confess I would really like to examine the thing in depth, maybe in some future post: as an example I would like to analyse the differences between Sierra game engines and SCUMM not to mention that I have never played even a Sierra adventure and need to remedy it!
{% endcomment %}

## Game and Intepreter

Stop wandering now and let's start to examine something concrete about the SCUMM world. Let's see what's the difference between the game and the interpreter.

We will need to run our LucasArts games, either on an old PC or on an emulated one (using **DOSBox** for example), and type some commands to show information about the interpreter and the game itself.

Here's a video I've prepared for the occasion (english subtitles will be available soon):

<iframe width="100%" height="360" src="https://www.youtube.com/embed/ZCdnodwgBT4" allowfullscreen></iframe>

In this example I've used one of my favourite game, "_Indiana Jones and the Fate of Atlantis_" running in DOSBox. Suppose you already have the game folder on your virtual hard drive, let's enter inside it, with the `cd` command, and print the list of its content usign the `dir` command:

![DIR]({{ site.baseurl }}/assets/images/scumm/ver-cd-dir.png)

We are interested in that file with the `.exe` extension: this is the SCUMM interpreter, the computer program in charge of decoding game resources and able to run the game!

We want to know what's its version (we will need this information later when we'll move to scritp "_descumming_") and in order to do this we try to run the interpreter passing it an intentionally invalid argument (say `foo`). The interpreter will not understand it so it will show an error message and also the information we are looking for!

![atlantis foo]({{ site.baseurl }}/assets/images/scumm/ver-atlantis-foo.png)
{% comment %}![interpreter version]({{ site.baseurl }}/assets/images/scumm/ver-interpreter.png){% endcomment %}

As you can see from the image above, this massage is showing us what are the correct arguments to use. In addition to that, on the upper right corner, we clearly read the version number.

![atlantis interpreter version]({{ site.baseurl }}/assets/images/scumm/ver-foo-output.png)

Now, let's run the game passing some contemplated parameter: let's say I want to enable VGA graphics and SoundBlaster sound so I will use the `v` and `s` commands respectively.

---

When the game has started, let's use a keys combination to show the version of the game this time: the combination is made of `ctrl` and `v` and will cause the game to pause and a message to pop-up on screen.

{% comment %}
lo commento perchè non mi piace come viene fuori l'effetto delle immagini inline

When the game has started, let's use a keys combination to show, this time, the version of the game: the combination is made of ![ctrl]({{ site.baseurl }}/assets/images/scumm/Ctrl.jpg){: display="inline"} and ![v]({{ site.baseurl }}/assets/images/scumm/V.jpg){: display="inline"} and will cause the game to pause and a message to pop-up onscreen showing the information required (among other concerning the memory usage)

un altro modo di mostrarle sarebbe questo:

<p>La combinazione di tasti da usare è <img alt="Ctrl" src="{{ site.baseurl }}/assets/images/scumm/Ctrl.jpg" style="display: inline"> + <img alt="V" src="{{ site.baseurl }}/assets/images/scumm/V.jpg" style="display: inline"> e provocherà la comparsa di un messaggio al centro dello schermo che riporta appunto la versione del gioco, differente rispetto a quella dell'interprete, oltre ad altre statistiche relative all'uso della memoria (che magari vedremo meglio in un altro post).</p>
{% endcomment %}

As we see there is a difference from the interpreter version and the game version.

![game version]({{ site.baseurl }}/assets/images/scumm/ver-game.png)

Game and interpreter versions are different because game and interpreter are two different software components. The _game_ is indeed a whole made of images, text and scripts, compacted and encoded into specific resource files inside the directory while the _interpreter_ is a software program which job is to decode these files and interpret them in order to run the game on our computer.

The same keys combo seen above is still valid if we are playing the game using _ScummVM_!

![game version in scummVM]({{ site.baseurl }}/assets/images/scumm/ver-game-scummvm.png)

Here's a table where I listed all the informantion about my LucasArts games:

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

## Refereces

### Books and Papers

* Accordi Richards, M. (2014). [Storia del videogioco](http://www.carocci.it/index.php?option=com_carocci&task=schedalibro&Itemid=72&isbn=9788843074167). Carocci Editore. It's a book we bought in Italy but I think there's a lot of books about the history of videogams that can do the job!

### Links

* from Wikipedia: [adventure game genre](https://en.wikipedia.org/wiki/Adventure_game), [interactive fiction](https://en.wikipedia.org/wiki/Interactive_fiction), [Choose your own adventure](https://en.wikipedia.org/wiki/Choose_Your_Own_Adventure);
* [Sierra On-Line](https://en.wikipedia.org/wiki/Sierra_Entertainment) [AGI](https://en.wikipedia.org/wiki/Adventure_Game_Interpreter) and [SCI](https://en.wikipedia.org/wiki/Sierra_Entertainment#1980s) interpreters;
* [Here](http://wiki.scummvm.org/index.php/SCUMM/Versions) the ScummVM _Technical Reference_ Wiki page dedicated to SCUMM versions.

{% comment %}

ITALIANO ---

Quando nel 1987 **Ron Gilbert** e **Aric Wilmunder**, poi ribattezzati gli "_SCUMM lords_", si misero al lavoro su SCUMM, la pratica di scomporre il software in due parti concettualmente distinte, _risorse_ da una parte ed _interprete_ dall'altra, non era certo una novità, almeno per quanto riguarda i videogiochi di avventura.

La cosa era già stata sperimentata con successo dagli sviluppatori della **Sierra On-Line** sin dal 1984 con **AGI** e successivamente con **SCI** e prima ancora dalla celebre **Infocom**, siamo nell'anno 1979, con **Z-Machine**, la macchina virtuale in grado di interpretare i files di risorse che costituivano i contenuti delle loro _interactive fiction_.

Se cercate _Interactive Fiction_ su Wikipedia, scoprirete che questo è uno dei nomi alternativi associati al sottogenere dei giochi di avventura testuali.

Senza entrare troppo nella cronologia, è interessante sapere che le avventure grafiche costituiscono un semplice sotto-genere del più ampio genere avventura.

La possibilità di utilizzare il mouse come principale mezzo per l'interazione con il gioco venne in seguito (da qui anche il nome alternativo di _avventura punta-e-clicca_), anche le immagini vennero in seguito, dapprima solo in bianco e nero, poi a colori, in vettoriale e poi ancora in grafica bitmap.
tter
L'avventura divenne _grafica_ gradualmente mentre, in principio, l'eperienza di gioco consisteva nella lettura di un testo a schermo, al più qualche effetto sonoro e l'interazione consisteva nel digitare a tastiera la coppia di parole _verb-noun_ (verbo e sostantivo) per darle in pasto al _parser_ e far progredire la storia.

Ancora più gustoso è ricollegare tutto questo ad un genere letterario che ebbe la sua massima popolarità negli anni '80 ma che cominciò ad essere sperimentato sin dai '40: il **librogame**!

Mi fermo prima di perdermi definitivamente nella ricerca delle origini del genere, dalla sezione _Riferimenti_ potete comunque trovare tutti i link per saperne di più; ammetto tuttavia che mi piacerebbe molto approfondire ulteriormente questi argomenti, magari ne scriverò in qualche futuro post. Mi piacerebbe, ad esempio, analizzare le differenze tra il game engine della Sierra e quello della LucasArts per non dire che non ho ancora mai giocato ad una interactive fiction! Vedremo...

### Gioco ed interprete

Tornando a noi, per cominciare questa nostra avventura nell'universo SCUMM cerchiamo di capire meglio, magari con un esempio, la differenza che, nel sistema SCUMM,  sussiste tra il gioco e l'interprete.

Ho preparato persino un video per l'occasione!

<iframe width="100%" height="360" src="https://www.youtube.com/embed/ZCdnodwgBT4" allowfullscreen></iframe>

Supponendo che, come me, ancora conserviate i dati dei giochi LucasArts originali, avete almeno un paio di modi per mettere in pratica quello che di cui vi voglio parlare:

* il primo è quello di eseguire questi comandi sul vostro vecchio computer;
* il secondo modo, sicuramente più pratico, è quello di eseguirli su di un vecchio computer **virtuale**, ad esempio, facendo uso del software **DOSBox**;

Avviato DOSBox, partendo dal prompt dei comandi, si procede individuando la cartella del gioco che ci interessa esaminare. Ad esempio "**Indiana Jones and the Fate of Atlantis**".

Entriamo nella directory e stampiamo l'elenco dei files. Nell'elenco compare un file con estensione EXE.
Si tratta dell'interprete SCUMM: il programma che si occupava di decodificare i files risorse ed eseguire gli script del gioco.

Ci sarà utile individuare la **versione** dell'interprete, per farlo occorre far partire il programma indicando un parametro volutamente non corretto per indurre il programma a terminare l'esecuzione e mostrare alcuni messaggi a console.

Come si può vedere da questa schermata, il programma ci sta mostrando quali siano i paramentri corretti. Nell'angolo in alta a destra invece è ben visibile l'indicazione della sua versione.

Preso nota della versione dell'interprete, avviamo ora il programma passando i parametri che ci interessano. Ad esempio **v** per la grafica VGA e **s** per attivare il sonoro tramite scheda SoundBlaster.

A programma avviato, usiamo una combinazione di tasti per rivelare, quasta volta, la versione del gioco.

<p>La combinazione di tasti da usare è <img alt="Ctrl" src="{{ site.baseurl }}/assets/images/scumm/Ctrl.jpg"> + <img alt="V" src="{{ site.baseurl }}/assets/images/scumm/V.jpg"> e provocherà la comparsa di un messaggio al centro dello schermo che riporta appunto la versione del gioco, differente rispetto a quella dell'interprete, oltre ad altre statistiche relative all'uso della memoria (che magari vedremo meglio in un altro post).</p>

Versione del gioco e versione dell'interprete sono differenti perchè gioco ed interprete sono due componeneti software diverse tra loro. Il **gioco** altro non è che un insieme di dati come immagini, testo e scripts, compattati e codificati in files appositi all'interno della directory. L'**interprete** invece è un programma che, in poche parole, ha il compito di  scompattare ed interpretare questi files per far funzionare il videogame sul nostro computer.
{: class="note"}

La combinazione di tasti vista sopra è ancora valida se giochiamo al gioco utilizzando **ScummVM**!

Ecco una tabella in cui riporto le versioni degli interpreti per i nostri giochi LucasArts PC IBM compatibile originali:

{% endcomment %}
