<?php genheader("Probabilistic automaton for creating melodies (first tests)", "October 17, 2024");?>

<p>Sui primi esperimenti nel costruire una macchina probabilistica per la generazione automatica di melodie.</p>

<?php h("fratelli Hollos");?>

<p>Qualche tempo fa, fortuitamente, ho fatto conoscenza della piccola casa editrice Abrazol Publishing<?php footnote("Abrazol Publishing", "https://abrazol.com/");?> che sembra pubblicare esclusivamente libri scritti dai fratelli <a href="https://www.exstrom.com/stefan/stefan.html">Stefan</a> e <a href="https://www.exstrom.com/richard/richard.html">J. Richard</a> Hollos.</p>

<?php img("images/cover_creating_rhythms.png", 20, "float:left; margin-bottom: 2ch; margin-right: 2ch; margin-left:1ch;");?>
<?php img("images/cover_creating_melodies.png", 20, "float:left; margin-bottom: 2ch; margin-right: 2ch; margin-left:1ch;");?>

<p>I due fratelli, entrambi laureati in Ingegneria elettronica e Fisica, sono appassionati di matematica, statistica, probabilità, elettronica e arte e assieme scrivono di questi argomenti nei loro libri.</p>

<p>Sono libri affascinanti e curiosi, sin dalla grafica di copertina, scritti con un linguaggio semplice e accessibile, pieni di spunti interessanti e da cui traspare tutta la passione degli autori per queste materie.</p>

<p>Ho letto due dei loro libri, quelli che tra tutti più mi sembravano coniugare l'aspetto ingegneristico, logico matematico a quello artistico dell'espressione musicale.</p>
<p>Si tratta di "<a href="https://abrazol.com/books/rhythm1/">Creating Rhythms</a>" e "<a href="https://abrazol.com/books/melody1/">Creating Melodies</a>" davvero super consigliati.</p>

<?php h("Olson");?>

<p>In particolare, c'è un capitolo nel libro "Creating Melodies" in cui i fratelli Hollos descrivono una macchina probabilistica (probabilistic automata) in grado di generare melodie convincenti su base di materiale preparato sul quale la macchina viene preventivamente allenata.</p>

<?php img("images/cover_music-physics-and-engineering.jpg", 20, "float:right; margin-bottom: 2ch; margin-right: 1ch; margin-left:2ch;");?>

<p>L'esempio che Stefan e Richard descrivono è basato sul lavoro di un altro autore, tale Harry F. Olson che nel 1952 aveva pubblicato un libro intitolato "Musica Engineering" (conosciuto dal 1962 in avanti con il nome di "Music, Physics and Engineering").</p>

<p>In questo libro Olson costruisce questo automaton e lo declina su diversi livelli di complessità via via crescente (ordini) con lo scopo di ottenere in output una melodia che sempre di più si avvicini "stilisticamente" a quanto contenuto nel materiale sonoro fornito come input (dataset).</p>

<p>Tutto questo ha attirato la mia curiosità e ho voluto provare ad implementare personalmente questo automaton usando python.</p>

<div style="clear:both;"></div>

<?php h("What a melody is");?>

<p>Anzitutto, che cosa è una melodia<?php footnote("Melody definition by WikiPedia", "https://en.wikipedia.org/wiki/Melody");?></p>

<p>E' una frase musicale, una "gesture", composta da una successione finita di suoni a diverse altezze (note) e di silenzi (pause). Ogni nota segue e precede altre note formando così un "profilo" (contour) caratteristico e riconoscibile sulla prospettiva orizzonale. Ogni nota ha anche una durata ben precisa e nell'insieme, queste durate definiscono il ritmo della melodia. Certe note "cadono" sul tempo forte della battuta, altre invece si manifestano sui tempi deboli e così facendo suggeriscono un senso di tonalità più o meno forte entro la quale la melodia vive e si muove.</p>

<p>Solo per aggiungere qualche ulteriore elemento, va detto che, come per la parola parlata, anche nella frase musicale ogni parte possiede un propria dinamica e l'intensita di volume ed espressione di ogni nota evolve organicamente con lo sviluppo della frase.</p>

<p>Ci sono insomma tantissimi elementi da considerare per creare proceduralmente una melodia ma, cominciando nel modo più semplice possibile, possiamo trascurare tutto quanto non siano le note con le loro altezze e le pause.</p>

<?php h("Dataset preparation");?>

<p>Per verificare la bontà del mio codice ho deciso di usare una semplice melodia, molto conosciuta "old McDonald".</p>

<div style="text-align: center;">
<?php img("images/old_mc_donald_score.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/old_mc_donald.ogg" type="audio/ogg"> </audio>
</div>

<p>Ho scritto la melodia usando Reaper, la mia DAW preferita, avendo cura di quantizzare per bene ciascuna nota ed esportare in fine in formato MIDI con l'intendo di farne poi un parsing all'interno del codice python usando la libreria music21.</p>

<p>Se il nostro algoritmo sarà ben progettato, mi aspetto che la melodia in uscita mostri delle somiglianze più o meno notevoli con quella originale.</p>

<?php h("First order automaton");?>

<p>Una prima analisi che si può fare della melodia data e contare quante volte una data nota compare al suo interno. Ecco una heatmap che rappresenta il quantitativo delle note all'interno della nostra melodia di partenza:</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_1_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>Partendo da questa prima analisi statistica, possiamo ottenere l'automaton più semplice. Si tratta dell'automaton del primo ordine. Esso è in grado di generare nuove note in funzione della frequenza con le quali esse compaiono nella melodia originale.</p>

<p>In altri termini, l'automaton di primo ordine sceglie le note casualmente tra tutte quelle presenti nella melodia di partenza. Avranno probabilità maggiore di essere selezionate quelle note che erano più presenti nella melodia originale.</p>

<p>Ecco come suona un minuto di audio ottenuto come output di un automaton di primo ordine allenato sulla nostra melodia.</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/1st_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>Fino a qui tutto ok, l'algoritmo funziona ma con un automaton così semplice, il risultato suona musicalmente ancora abbastanza rudimentale. Proviamo a complicare un poco le cose e a porci qualche domanda in più.</p>
<p>Una melodia infatti non è soltanto una successione casuale di note. Ogni nota ne segue un'altra a seconda del pensiero artistico dell'autore. Il compositore è un progettista che, per così dire, che ha disposto le note secondo un determinato criterio in modo da raccontare ed esprimere qualche cosa. Come possiamo tenerne conto?</p>

<?php h("Second order automaton");?>

<p>Possiamo ad esempio costruire un nuovo automaton che sia in grado di restituire una determinata nota in funzione di quale sia stata la nota precedentemente selezionata. E' questo l'automata di secondo ordine, quello che analizza il dataset estraendo informazioni sulle successioni di due note.</p>

<p>Ecco una heatmap che rappresenta una statistica di secondo ordine della nostra melodia di partenza:</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_2_order_heatmap.png", 60, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>Per diletto potremmo anche rappresentare questi rapporti con un grafo connesso dove ogni nota sia rappresentata da un nodo mentre ogni connessione (edge) rappresenti i rapporti tra due note. Ciascun edge è disegnato con uno spessore differente a seconda della probabilità della transizione tra una nota e l'altra.</p>
<p>Una rappresentazione di questo tipo può aiutarci meglio a visualizzare i vari flussi decisionali che l'algoritmo può compiere al momento di generare una nuova nota.</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_dotgraph.png", 40, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>Ma la vera domanda è: come suona un automaton di secondo ordine? Si possono udire delle differenze con l'automata precedente? Di che entità sono questi eventuali cambiamenti?</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/2nd_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>Si può notare che, aumentando l'ordine dell'automaton, le note si susseguono in modo differente e il profilo di questa nuova melodia in uscita più rassomiglia il materiale musicale di partenza.</p>

<?php h("Higher order automatons");?>

<p>Si potrebbe spingere questo ragionamento ancora oltre ad esempio analizzando le successioni di 3 note od ottenere così un automaton di terzo ordine. Questo automaton è in grado di generare una nuova nota su base di quali siano le due nuote suonate precedentemente.</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_3_order_heatmap.png", 40, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/3rd_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>Similmente per il quarto ordine:</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_4_order_heatmap.png", 40, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/4th_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>e così via...</p>

<?php h("First considerations");?>

<p>Questi primi risultati sono interessanti a mio avviso perchè mostrano come, basandoci sulla statistica e sulla probabilità si possano ottenere delle macchine in grado di generare autonomamente delle melodie nuove ma al contempo rassomiglianti al meteriale fornito come dataset di partenza.</p>
<p>Mi immagino ad esempio ad un loro utilizzo in un contesto di installazione multimediale dove sia necessario produrre musica nuova, sempre diversa ma coerente con uno stile dato. Musica che possa essere generata di continuo, in automatico (musica generativa).</p>

<p>Da questi primi esperimenti noto che la preparazione del dataset è una fase molto importante. Perchè la macchina sia afficabile e possa fornire risultati al tempo stesso coerenti ma pure variegati, occorre che il dataset sia grande e popoloso. Dovrebbe contenere al suo interno quante più combinazioni possibili di note ma pure contenere figure ritmiche e melodiche che si ripresentino uguali a loro stesse, più volte, così da fornire all'automaton la possibilità di decidere quale delle possibili strade scegliere.</p>

<p>Nella mia testa si potrebbe registrare per lungo tempo una propria performance per trasformandola poi in file MIDI. Usando tale MIDI file come dataset l'automaton, in qualche modo, diverrebbe una sorta di alterego di sé stessi, in grado di proporre nuove melodie che rispecchiano in quelche modo il nostro gusto e il nostro modo di suonare :)</p>

<p>Come abbiamo già detto, va qui ricordato che non abbiamo fino ad ora considerando altri aspetti fondamentali per generazione della melodia, come il ritmo o la dinamica. Che risultati si potrebbero ottenere se lo facessimo?</p>
<p>Cosa succederebbe se, ad esempio, il nostro automata tenesse in considerazione anche la durata di ciascuna nota nelle sue analisi statistiche della partiture in input?</p>

<?php h("Adding time | rhythm");?>

<p>Se cambiamo il codice del nostro algoritmo e aggiungiamo una funzionalità per l'analisi della durata di ciascuna nota, oltre che della sua altezza, avremo che la heatmap di primo ordine si arricchisce di più elementi rispetto a quella che abbiamo incontrato in precedenza. Nella melodia, note accumunate dallo stesso pitch diventano ora entità differenti perchè hanno durate differenti tra loro.</p>

<div style="text-align: center;">
<?php img("images/graphs_w_duration/old_mc_donald_1_order_heatmap.png", 80, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>Pur essendo questo un automata del primo ordine, sin da un primo ascolto si nota che l'output è in grado richiamare maggiormente l'idea melodica del dataseta, non soltanto le altezze ma pure le durate vengono rispettate e restituite.</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/1st_w_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>Mano a mano che aumentiamo l'ordine dell'automaton, il rispettivo risultato sonoro diventa via via sempre più sovrapponibile con il materiale di partenza.<p>

<div style="text-align: center;">
<?php img("images/graphs_w_duration/old_mc_donald_2_order_heatmap.png", 80, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/2nd_w_duration.ogg" type="audio/ogg"> </audio>
</div>

<div style="text-align: center;">
<?php img("images/graphs_w_duration/old_mc_donald_3_order_heatmap.png", 60, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/3rd_w_duration.ogg" type="audio/ogg"> </audio>
</div>

<div style="text-align: center;">
<?php img("images/graphs_w_duration/old_mc_donald_4_order_heatmap.png", 60, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/4th_w_duration.ogg" type="audio/ogg"> </audio>
</div>

<?php h("Considerations, pt2");?>

<p>Si ascolta che, mano a mano che aumentiamo l'ordine dell'automaton, il risultato sonoro cambia. Tuttavia più si aumento l'ordine più la varietà dei possibili otuput diminuisc e la casualità finisce con l'uscire un poco di scena: la melodia ottenuta in output, specie per gli ordini più alti, diventa praticamente identica a quella fornita in input.</p>

<p>Se da una lato questo dimostra la bontà dell'algoritmo, dall'altro mi fa riflettere sulle vere capacità di questa macchina di essere sufficientemente versatile per la generazione di musica "nuova" e che susciti interesse nell'ascoltatore. Il rischio di generare piuttosto ripetitività eccessiva e monotonia è evidente.</p>

<p>Credo altresì che il principale motivo per cui gli automaton di ordine elevato mi risultino così poco efficaci dipenda essenzialmente dalla dimensione del dataset.</p>

<p>A ben vedere la melodia che ho scelto per questi primi test è davvero molto semplice e ha una durata davvero breve.</p>

<p>Non vedo l'ora di continuare questi esperimento, sottoponendo all'algoritmo un dataseta più grande e variagato.</p>

<?php h("The code");?>

<p>You can fine the code I wrote on <a href="https://github.com/ariutti/probabilistic_automaton_for_melody_generation">this github repository</a>.</p>

<p>Il codice è essenzialmente in grado di fare un parsing di un file MIDI ed effettuare una serie di analisi statistiche (tramite il modulo music21) per costruire tante macchine a stati quante si desideri.</p>

<p>Le descrizioni delle macchine a stati così generate vengono salvate in formato <code>yaml</code> così da poter essere facilmente interpretate da SuperCollider per la generazione sonora della melodia in output (nel repository, oltre a codice python ptincipale, troverete anche il codice SuperCollider corrispondente).</p>

<p>Oltre a questo, il codice è in grado di renderizzare anche grafici e immagini, come le varie heatmap e il grafo connesso (tramite matplotlib e graphviz).</p>

<div style="text-align: center;">
<?php img("images/algorhythm_diagram.svg", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>Direi che per ora è tutto, ci riaggiorniamo al prossimo esperimento!</p>
