---
layout: post
title: Boxes & walk matrix
date: 2017-07-19 09:00:00
excerpt: a place to walk
category: [game, scumm]
usemath: true
---

What are boxes? Everything started when I tried to understand the walking algorithm in SCUMM

On every player click, the SCUMM engine identifies a path and the actor starts to move following it, bypassing obstacles along the road and eventually arriving to its destination without any problem. How is all this possible?

Computer science literature **[1]** handle the topic broadly, highlighting different types of algorithms used to solve these kind of problems which are called _pathfinding_ problems. The best known of these algorithms is the <b>A*</b>, a natural evolution of the simpler **Dijkstra**'s one, often used to solve _tactical decision making_ problems rather that _pathfinding_ problems.

<div class="dashed">
<img alt="Edsger Dijkstra" src="{{site.baseurl}}/assets/images/scumm/Dijkstra.jpg" style="float: right; padding:20px;"/>
<p>The Dijkstra algorithm is named after its discoverer, the mathematician Edsger Dijkstra and, despite the algorithm was originally designed to solve the <em>shortest path</em> problem (a particular problem in mathematical graph theory), it was later used in videogames.</p>
<p>Dijkstra is also famous for his 1968 well-known article "<em>GOTO statement considered harmful</em>" <b>[b]</b> where he fought against the so called <em>spaghetti code</em>, low quality programs which were difficult to read or modify because of the extreme use of <em>GOTO</em> statement (see <b>[c]</b>).</p>
</div>

The _A*_ algorithm is quite complex and it is very useful in situation where the AI engine is frequently asked to find the best way throw a series of point in space always changing dynamically. However SCUMM does not use it for its internal pathfinding mechanism; the _A*_ algorithm is too much sophisitcated, especially considering that the "_walkable area_" inside a SCUMM room stays pretty the same throughout the game, in addition to that I think probably the _A*_ would have been too CPU hungry for old computers.

SCUMM instead uses a relatively simple system which is pretty elegant in my opinion!

## Fingolfin docet

In order to better understand what we are talking about, let's examine a post by **Max "Fingolfin" Horn** (an ex-member of the ScummVM development team by now) where he talks about SCUMM pathfinding on the ScummVM forum (see **[a]**):

{% comment %}
In order to better understand what we are talking about, I would like to quote **Max "Fingolfin" Horn** (by now an ex-member of the ScummVM development team) who talked about SCUMM pathfinding on the forum (see **[a]**):

>ScummVM doesn't using anything complicated like A* at all!<br/><br/>
Rather, the game screen is divided into so-called "_boxes_" (which in the later SCUMM versions could essentially be almost arbitrary non-overlapping quadrangles).<br/><br/>
Normally, an "_actor_" (like e.g. Guybrush in Monkey Island) is confined to movement within those boxes. So at any time, an actor has a "_current box_" attribute assigned to it. Let's assume the actor is in box 1.<br/><br/>
When the user clicks somewhere, the engine first determines which box the click was in. If it's the same as the actor to be moved is in anyway, it can just be walked there. That's easy. Now assume the click was in a different box, e.g. box 5. Then the engine first determines how to get to that box.<br/><br/>
For this, it looks in the "_box matrix_", which is essentially a precomputed n*n matrix, where n is the total number of boxes in the room. For each pair (i,j) of boxes, it contains a value k which says: "If you are in box i and want to get to get to box j, first go to box k". Note that "k" could equal j if box i and j are adjacent.<br/><br/>
Now, equipped with this value, the engine will first compute a path for the actor to walk from its current position to the new box k. This depends on how the boxes i and k "touch".<br/><br/>
Anyway, so the actor walks a bit and reaches box k. If this was the same as the box of our final destination, then we just walk to the final destination, and are done. If not, we rince and repeat: Look up the entry (k,j) in the box matrix to find the next box; walk to that; etc...

{% endcomment %}

Fingolfin essentially says that the walkable area of a room is subdivided into a series of quadrilateral non-overlapping areas called **boxes**.

**Actor** movements (as those of Indy in "_Indiana Jones and the Fate of Atlantis_") are bordered inside those boxes and actor has also an attribute to keep track of what is the box he is currently in.

When the player clicks on a point on the screen, the engine acts differnetly according on where this point is in relation with the boxes:
1. if the point is inside the same box where the actor is, then the actor simply starts to move toward the point;
2. if the point is inside a different box instead, the engine computes a path in order for the actor to leave his current box and move towards the destination one. This same kind of computation happens when the point is outside all of the boxes, in which case the engine must find the nearest box to the player click first.

If _current box_ and _destination box_ are different, the engine will refer to the **box matrix** (also called **walk matrix**) to find the _next box_ the actor has to walk trough in order to reach the destination. The _walk matrix_ is essentially a precomputed matrix made of $$ n \times n $$ elements, where $$n$$ is the total number of boxes inside the room.

For each pair of boxes, $$i$$ and $$j$$, the matrix contains a value $$k$$ which means "_If you are in box **i** now and you want to reach box **j**, you mast go to box **k** first!_"

When the actor arrives in box $$k$$ and this box doesn't correspond to the desired final destination, this process will repeat. On the other hand, when $$k == j$$ (i.e. boxes $$i$$ and $$j$$ are adjacent), the actor is arrived and no more calculation are needed.

## In practice...

Let's do a practical example: we can use ScummVM and its debugger to make some tests.
Let's load a savegame from "_Indiana Jone and the Fate of Atlantis_":

![tikal]({{ site.baseurl }}/assets/images/scumm/tikal.png)

Here we are in _Tikal_, inside the Maya temple! So let's call the ScummVM debugger with the `CTRL` + `D` keys combination.

The ScummVM debugger offers 2 different commands in order to show and examine the information we talked about. Here they are:
* the `box`command;
* the `matrix` command

{% comment %} TODO: video {% endcomment %}

Let's examine them in depth.

Pay attention, this is a SCUMM version 5 game and these information may be different for different games.<br/><br/>In addition to that I should mention that these data (walk matrix in particular) can change during the game so, if are using this commands yourself you could get different results.<br/><br/>See the **[d]** reference for more details
{: class="note"}

## Box command

The `box` command shows a schematic report about the current room boxes, let's try to insert it at the debugger prompt and see what happens:

![tikal boxes]( {{ site.baseurl }}/assets/images/scumm/console-01.png)

The 12 rows of text output, one for each of the boxes, show information about their geometry and more. Let's put aside for the moment the row/box number `0` (it is used as a sort of walk-matrix header and doesn't contain useful information really), and take a look at the other rows; here we see numerical values corresponding to

| Upper Left Coords | Lower Left Coords | Upper Right Coords | Lower Right Coords | Mask | Flags | Scale |

Let's omit the last three values for now, they represent `mask`, `flags` and `scale` values we will cover in details in future posts. Now let's concentrate to the first 4 pairs of coordinates.

![example box]( {{site.baseurl}}/assets/images/scumm/box-new.png){: align="right" width="50%"}

Each of these pair represents one of the 4 box vertices, expressed in _pixels_. In order we have the upper left vertex first and then the lower left one and so on with the upper and lower right vertices.

Tracing vertices and lines on the room background image we obtain a visual representation of the walkable area, very useful for our study.

![tikal boxes]({{site.baseurl}}/assets/images/scumm/tikal-boxes-02.png)

From the image we note indeed an interesting fact: some of these boxes may show up differently than a quadrilateral and solve as a simple segment as it happens for box 7, 8, and 9!

## Matrix command

Now let's try the `matrix` command instead an see what the debugger shows up:

![tikal boxes]({{ site.baseurl }}/assets/images/scumm/console-02.png)

These values are quite criptical to interpret but fortunately the ScummVM wiki **[d]** comes in handy. From here we read that the matrix has a line for each box, and for each one it lists a triad of values for each adjacent box to the one we are considering.

The first two values of the triad define a range (`start` and `end` values) of boxes which, in order to be reached, they force the actor to visit another box, which is the one represented by the third value.

As an example lets examine row number `4`: the first triad is represented like this `[1-3=>2]` which means that if the actor current box is 4 and he is asked to go to box 1 through 3, he must first visit the second box. Now the second triad `[4-4=>4]` is easier to understand, if we already are on box 4 and the player click is still on this box, we should remain here!

The same kind of thinking can be used for all the boxes in the room eventually creating something like the table below (which i think is easier to read than the debugger output!)

<table class="walk-matrix">
    <tr>
        <th class="gray1"> </th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
    </tr>
    <tr>
        <th>1</th>
        <td class="gray1">1</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray2">//</td>
        <td>10</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>2</th>
        <td>1</td>
        <td class="gray1">2</td>
        <td>3</td>
        <td>4</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td class="gray2">//</td>
        <td>10</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>3</th>
        <td>2</td>
        <td>2</td>
        <td class="gray1">3</td>
        <td>2</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>7</td>
        <td class="gray2">//</td>
        <td>2</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>4</th>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray1">4</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray2">//</td>
        <td>2</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>5</th>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td class="gray1">5</td>
        <td>6</td>
        <td>3</td>
        <td>3</td>
        <td class="gray2">//</td>
        <td>3</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>6</th>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>5</td>
        <td class="gray1">6</td>
        <td>7</td>
        <td>7</td>
        <td class="gray2">//</td>
        <td>3</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>7</th>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>6</td>
        <td class="gray1">7</td>
        <td>8</td>
        <td class="gray2">//</td>
        <td>3</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>8</th>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td class="gray1">8</td>
        <td class="gray2">//</td>
        <td>7</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>9</th>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray1">9</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>10</th>
        <td>1</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray2">//</td>
        <td class="gray1">10</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>11</th>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray1">11</td>
    </tr>
</table>

## Practicals

Let's pretend we are the SCUMM engine and let's try to solve some SCUMM "_real_" pathfinding problem!

Here's again the image showing the walkable area

![tikal boxes]({{ site.baseurl }}/assets/images/scumm/tikal-boxes-02.png)

Now suppose Indy is on box 1 and the player clicks on a point which is inside the 4th box. We the engine must refer to the walk matrix a see what we get from here. We get 2, the number which is on the crossing between the first row and the fourth column.

Great! This is perfectly reasonable, especially looking at the picture, from the moment that box 1 and 2 are adjacent and that if we move to box 2 we are closer to our destination.

So Indy now is walking to box 2 and, once he arrives here, because box 2 is not the original destination we wanted, we must consult the walk matrix again. Now we look at the crossing of row 2 and column 4 and we read 4!

So one last stroll will suffice for Indy to reach his final destination on box 4!

So try youself, imagine the user is clicking near box 6, are you able to find the route using the walk matrix? Let's put your solution in the comment below!

## References

### Books and Papers

* **[1]** Millington, I., & Funge J. (2009). [Artificial Intelligence for Games](https://www.crcpress.com/Artificial-Intelligence-for-Games/Millington-Funge/p/book/9780123747310) (2nd ed.). Morgan Kaufmann ([here](https://github.com/idmillington/aicore)'s the link to the book code repository);

### Links

* **[a]** ScummVM Forum pathfinding [topic](http://forums.scummvm.org/viewtopic.php?t=4532);
* **[b]** [Go-to statement considered harmful](https://www.cs.utexas.edu/users/EWD/ewd02xx/EWD215.PDF);
* **[c]** from Wikipedia: [Spaghetti Code](https://en.wikipedia.org/wiki/Spaghetti_code), [Structured programming](https://en.wikipedia.org/wiki/Structured_programming);
* **[d]** ScummVM, SCUMM technical reference: [Box](http://wiki.scummvm.org/index.php/SCUMM/Technical_Reference/Box_resources) and [Matrix](http://wiki.scummvm.org/index.php/SCUMM/Technical_Reference/Box_resources#BOXM) resources;
* [Here](https://www.google.com/patents/US5425139?dq=sierra+on-line+path+finding&hl=en&sa=X&ved=0ahUKEwiqyuHVjZXVAhUF7xQKHfecCOYQ6AEIKzAB)'s another way of looking at the pathfinding problem by **Sierra On-Line**;

{% comment %}

Già tradotto

----

Tutto è cominciato quando ho cercato di capire che tipo di algoritmo usasse SCUMM per muovere i vari attori all'interno della room.

Ad ogni click l'attore, lo SCUMM engine individua un percorso e l'attore comincia a muoversi, camminando verso il punto in cui si è cliccato, aggirando gli ostacoli presenti. Come è possibile tutto questo?

La letteratura **[1]** tratta approfonditamente l'argomento, indicando diversi tipi di algoritmi che si usano per risolvere problemi di questo tipo, detti problemi del _pathfinding_. il più conosciuto è forse <b>A*</b>.


<div class="note">
<img alt="Edsger Dijkstra" src="{{site.baseurl}}/assets/images/scumm/Dijkstra.jpg" style="float: right; padding:20px;"/>
<p>Come riporta <b>[1]</b>, l'algoritmo <b>A*</b> è una naturale evoluzione del più semplice algorimo di <b>Dijkstra</b>. Quest'ultimo viene più spesso utilizzato per risolvere problemi di <em>tactical decision making</em> piuttosto che per il <em>pathfinding</em>.</p>
<p>L'agoritmo di Dijkstra prende il nome dal suo scopritore, il matematico Edsger Dijkstra. Originariamente progettato per risolvere un problema nella teoria matematica dei grafi, un problema detto dello <em>shortest path</em>, questo algoritmo è stato poi messo al servizio del videogioco ed è diventato il punto di partenza per la risoluzione di una particolare classe di problemi.</p>
<p>Tra le altre cose, proprio il sig. Dijkstra, con il suo celebre articolo <em>"GOTO statement considered harmful"</em> <b>[b]</b> del 1968, si batteva contro lo <em><b>Spaghetti code</b></em>, ossia contro i programmi di scarsa qualità, difficilmente leggibili e modificabili per la malsana tendenza all'uso della direttiva <b>GOTO</b> (vedi <b>[c]</b>).</p>
<hr class="clear" />
</div>

<b>A*</b> tuttavia è un algoritmo abbastanza complesso e articolato per essere utilizzato all'interno di SCUMM, a causa forse delle limitazioni computazionali dei dispositivi dell'epoca? non saprei dire, fatto sta che SCUMM utilizza invece un sistema molto più semplice e, in questa sua semplicità, direi molto elegante!

## Fingolfin Docet

Per meglio capire in cosa consiste questo sistema voglio citare le parole di **Max "Fingolfin" Horn**, ormai ex-membro del team di sviluppo di ScummVM, direttamente tratte da un suo intervento (vedi **[a]**) sul forum:

<div class="traduzione dashed-border">

<p>ScummVM doesn't using anything complicated like A* at all!</p>

<p>Rather, the game screen is divided into so-called "boxes" (which in the later SCUMM versions could essentially be almost arbitrary non-overlapping quadrangles).</p>

<p>Normally, an "actor" (like e.g. Guybrush in Monkey Island) is confined to movement within those boxes. So at any time, an actor has a "current box" attribute assigned to it. Let's assume the actor is in box 1.</p>

<p>When the user clicks somewhere, the engine first determines which box the click was in. If it's the same as the actor to be moved is in anyway, it can just be walked there. That's easy. Now assume the click was in a different box, e.g. box 5. THen the engine first determines how to get to that box. For this, it looks in the "box matrix", which is essentially a precomputed n*n matrix, where n is the total number of boxes in the room. For each pair (i,j) of boxes, it contains a value k which says: "If you are in box i and want to get to get to box j, first go to box k". Note that "k" could equal j if box i and j are adjacent.<br>
Now, equipped with this value, the engine will first compute a path for the actor to walk from its current position to the new box k. This depends on how the boxes i and k "touch".</p>
<p>Anyway, so the actor walks a bit and reaches box k. If this was the same as the box of our final destination, then we just walk to the final destination, and are done. If not, we rince and repeat: Look up the entry (k,j) in the box matrix to find the next box; walk to that; etc.</p>

<p>[...]</p>

</div>

**Fingolfin** dice sostanzialmente che l'area di gioco è suddivisa in aree quadrangolari non sovrapposte, chiamate **boxes**.

I movimenti dell'**attore** (come ad esempio Indiana Jones) sono confinati all'interno di queste aree (per questo, l'attore possiede un attributo denominato **current box**).

Quando l'utente clicca, per prima cosa l'engine determina in quale box è avvenuto il click. Se il click è avvenuto nella stessa box in cui risiede l'attore, l'attore camminerà verso il punto del click, semplicemente.

_TODO: e se il click avviene al di fuori di tutte le box??_

Se invece il click è avvenuto in una box differente, allora l'engine deve dapprima determinare come poterci arrivare. Per farlo consulta la **box matrix** (anche chiamata **walk matrix**), che è essenzialmente una matrice precostruita di $$ n * n $$ elementi, dove **n** è il numero totale di box nella room.

Per ogni coppia di box (**i**, **j**) la matrice contiene un valore **k** che sta a significare:

<p style="text-align: center">"<em>Se ti trovi nella box </em><b>i</b><em> e vuoi raggiungere la </em><b>j</b><em>, raggiungi prima la </em><b>k</b>"</p>

da notare che **k** può anche essere uguale a **j** se **i** e **j** sono adiacenti.

<p>Ora, a partire da questo valore, l'engine deve occuparsi di calcolare un percorso per l'attore per condurlo dalla sua posizione attuale alla box <b>k</b>. Questo dipende dal modo in cui le due box, <b>i</b> e <b>k</b> sono affiancate.</p>
<p>Una volta che l'attore ha raggiunto la box <b>k</b> si valuta se sia questa la box che contiene la destinazione finale:</p>
<ul>
    <li>Se sì, allora all'attore basterà muovere pochi ulteriori passi per raggiungere quel punto.</li>
    <li>Se no il procedimento ricomincia: si consulta la <b>box matrix</b> cercando l'entry associata alla nuova coppia (<b>k</b>, <b>j</b>), si ricava la prossima box, e si cammina fino a là, etc...</li>
</ul>

## In pratica...

<p>Wow, tutto questo è molto interessante ma forse un poco troppo astratto. Vogliamo fare un esempio un po' più concreto?</p>
<p>Possiamo usare ScummVM e sperimentare con il suo debugger. Sotto allora e carichiamo un salvataggio da <b>Indiana Jones and the Fate of Atlantis</b>.</p>
<p>Carichiamo il salvataggio <em>Tikal</em> ed entriamo nel templio.</p>

<div class="img">
<img alt="tikal" src="{{site.baseurl}}/assets/images/scumm/tikal.png" />
</div>

Una volta qui, richiamiamo il debugger di ScummVM con la combinazione di tasti ![Ctrl]({{site.baseurl}}/assets/images/scumm/Ctrl.jpg){: display="inline"} + ![D]({{site.baseurl}}/assets/images/scumm/D.jpg){: display="inline"}

Il debugger di ScummVM offre 2 principali comandi per esaminare le informazioni di cui abbiamo parlato; esaminiamoli nel dettaglio:
* comando <a href="#debugger-comando-box">box</a>;</li>
* comando <a href="#debugger-comando-matrix">matrix</a>.</li>

## Comando BOX

<p>Il comando <b>box</b> mostra un resoconto delle più importatnti informazioni relative alle box della room corrente, proviamo a digitarlo a console e a dare l'invio: ecco qui quanto riportato dall'output:</p>

<div class="img">
<img alt="tikal boxes" src="{{ site.baseurl }}/assets/images/scumm/console-01.png" />
</div>

<p>12 righe di testo in output, una per ciascuna delle box presenti nella room (la room 0 sembra avere delle caratteristiche anomale e per il momento la tralascieremo). Le informazioni sono mostrate nella forma seguente (la versione SCUMM su cui questo gioco si basa è la 5, per altri giochi le informazioni mostrate potrebbero essere diverse):</p>

<table class="dati">
    <tr>
        <th>Upper Left Coords</th>
        <th>Upper Right Coords</th>
        <th>Lower Right Coords</th>
        <th>Lower Left Coords</th>
        <th>Mask</th>
        <th>Flags</th>
        <th>Scale</th>
    </tr>
</table>


<p>Tralasciando per ora gli ultimi tre campi (<b>Mask</b>, <b>Flags</b> e <b>Scale</b>) che tratteremo in articoli separati, concentriamoci ora sulle prime 4 coppie di valori.</p>

<div>
<img alt="box" src="{{site.baseurl}}/assets/images/scumm/box.jpg" style="margin: 1em; float: right;" />

<p>Ognuna di queste coppie altro non è che una coppia di coordinate espresse in <em>pixels</em> relative ai vertici della <b>box</b>, (ricordiano che la box altro non è se non un' area quadrangolare).</p>
<p>I vertici vengono indicati da quello più in alto a sinistra (<b>U</b>pper <b>L</b>eft) fino a quello che si trova in basso a sinistra (<b>L</b>ower <b>L</b>eft)procedendo in senso orario. Nell'ordine quindi si hanno i 4 vertici <b>UL</b>, <b>UR</b>, <b>LR</b> e infine <b>LL</b>, come mostrato nella figura qui di fianco.</p>

<hr class="clear" />
</div>



<p>Riportando i valori delle coordinate sull'immagine di sfondo otteniamo questa rappresentazione che rende subito l'idea di come siano fatte le box e di come esse siano disposte in modo tale da affiancarsi tra loro per creare, di fatto, l'intera area calpestabile dagli attori.</p>

<div class="img">
<img alt="tikal boxes" src="{{site.baseurl}}/assets/images/scumm/tikal-boxes-02.png" />
</div>

<div class="note">
<p>Da notare inoltre un particolare interessante: come si può vedere dall'immagine, alcuni di questi quadrangoli possono degenerare in semplici linee se i loro vertici coincidono a 2 a 2. Nella room corrente è il caso delle box <b>7</b>, <b>8</b> e <b>9</b>.</p>
</div>

<a id="debugger-comando-matrix"></a>

## Comando MATRIX

<p>Usiamo ora il comando <em>matrix</em>, eccone l'output:</p>

<div class="img">
<img alt="tikal boxes" src="{{ site.baseurl }}/assets/images/scumm/console-02.png" />
</div>

<p>Visto così non è molto chiaro. Costruiamoci uno spreadsheet ricavando le informazioni necessarie in questo modo:</p>
<ul>
    <li>La prima riga della matrice (nell'output della console indicata da <b>1:</b>) ha per elementi:
        <ul>
            <li>il valore 1, situato all'incrocio con la colonna 1</li>
            <li>il valore 2, per le colonne dalla 2 alla 8;</li>
            <li>il valore 10, in corrispondenza della colonna 10;</li>
            <li>nessun valore specificato per le altre colonne (9 e 11);</li>
        </ul></li>
    <li>La seconda riga della matrice ha per elementi:
        <ul>
            <li>il valore 1, situato all'incrocio con la colonna 1</li>
            <li>il valore 2, situato all'incrocio con la colonna 2</li>
            <li>il valore 3, situato all'incrocio con la colonna 3</li>
            <li>il valore 4, situato all'incrocio con la colonna 4</li>
            <li>il valore 3, per le colonne dalla 5 alla 8;</li>
            <li>il valore 10, in corrispondenza della colonna 10;</li>
            <li>anche per questa riga, nessun valore specificato per le colonne 9 e 11;</li>
        </ul></li>
</ul>

<p>Proseguiamo così per le righe rimanenti e otteniamo la tabella mostrata qui di seguito.</p>

## Esercizi

Per comodità, torno a mostrare l'immagine vista poco più su. Facciamo ora un paio di esperimenti come se fossimo noi l'engine di gioco e dovessimo risolvere il problema del _pathfinding_!

![tikal boxes]({{ site.baseurl }}/assets/images/scumm/tikal-boxes-02.png)

Supponiamo che l'attore Indy si trovi sulla box **1** (Indy->currente box = 1).

Supponiamo di cliccare in corrispondenza della box **4**, la nostra _final destination_ si trova all'interno della box 4 (target box = 4). Come raggiungerla?

Consultiamo la **Walk Matrix** e leggiamo il valore in corrispondenza dell'incrocio riga-colonna 1-4.

Il valore che leggiamo è **2**.

Bene! questo significa che Indy, per riuscire a raggiungere 4 partendo da 1 deve dapprima passare per 2, come per altro ci conferma anche l'immagine qui sopra: la box 1 è affiancata alla 2.

Dopo una breve passeggiata Indy si trova ora sulla box 2 (Indy->currente box = 2).

La box attuale corrisponde alla nostra _target box_? La risposta è no, per cui l'operazione va ripetuta.

Consultiamo di nuovo la **Walk Matrix**, questa volta leggiamo il valore all'incrocio della riga 2 e della colonna 4: il valore letto è 4.

Ancora una volta, interpretare la tabella sottoforma di immagine ci rende pù semplice la comprensione: la box 4 è affiancata alla 2!

Basta un'altra semplice passeggiata per far sì che Indy passi dalla box 2 alla 4 e, infine, raggiunga senza ulteriori sforzi la nostra _final destination_.

Provate ora con un altro esperimento, provate a "cliccare" sulla box **6**. Consultate la tabella, riuscite a ricostruire il ragionamento dell'engine in questo caso?

{% endcomment %}
