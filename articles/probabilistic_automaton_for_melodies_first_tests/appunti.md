# fratelli Hollos

Qualche tempo fa, fortuitamente, ho fatto conoscenza della piccola casa editrice Abrazol Publishing https://abrazol.com/ che sembra pubblicare esclusivamente libri scritti dai fratelli Stefan https://www.exstrom.com/stefan/stefan.html e J. Richard https://www.exstrom.com/richard/richard.html Hollos.

I due fratelli, entrambi laureati in Ingegneria elettronica e Fisica, sono appassionati di Matematica, statistica e probabilitò, elettronica e arte e assieme scrivono di questi argomenti nei loro libri. Sono libri affascinanti e curiosi, sin dalla grafica di copertina. Scritti con un linguaggio semplice e accessibile, pieni di spunti interessanti e da cui trasuda tutta la passione degli autori per le materie trattate.

Ho letto due dei loro libri, quelli che tra tutti più mi sembravano coniugare l'aspetto ingegneristico, logico matematico a quello artistico dell'espressione musicale. Si tratta di

"Creating Rhythms" https://abrazol.com/books/rhythm1/ e "Creating Melodies" https://abrazol.com/books/melody1/ davvero super consigliati.

# Olson

In particolare, c'è un capitolo nel libro "Creating Melodies" in cui i fratelli Hollos descrivono una macchina probabilistica (probabilistic automata) in grado di generare melodie convincenti su base di materiale preparato sul quale la macchina è stata allenata. L'esempio che Stefan e Richard descrivono è basato sul lavoro di un altro autore, tale Harry F. Olson che nel 1952 aveva pubblicato un libro intitolato "Musica Enginnering" (conosciuto dal 1962 in avanti con il nome di "Music, Physics and Enginnering").

In questo libro Olson costruisce questo automaton e lo declina su diversi livelli di complessità via via crescente (ordini) con lo scopo di ottenere in output una melodia che sempre di più si avvicini "stilisticamente" a quanto contenuto nel materiale sonoro fornito come input (database??).

Tutto questo ha attirato la mia curiosità e ho voluto provare ad implementare personalmente questo automaton usando python.


ho usato music 21
dotgraph

# implementazione

Che cosa è una melodia anzitutto?  https://en.wikipedia.org/wiki/Melody è una frase musicale, una "gesture", composta da una successione finita di note. Ogni nota segue e precede altre note costruendo così un "profilo" (contour) caratteristico e riconoscibile sulla prospettiva orizzonale, lineare. Oltre a questo ogni nota ha una durata ben precisa e nell'insieme, queste durate definiscono il ritmo della melodia all'interno della suddivisione ritmica. Certe note "cadono" sul tempo forte della battuta, altre invece si manifestano sugli accenti deboli e così facendo suggeriscono una idea più o meno forte di tonalità dove la melodia vive e entro la quale essa si muove.

dinamica?
timbro?

Ci sono insomma tantissimi elementi da considerare ma volendo cominciare nel modo più semplice possibile possiamo, per ora, trascurare l'aspetto ritmico e concentrarci sul "contour" esaminando soltanto le note e i loro pitches.

Anhe le pause vanno considerate!

## preparazione del dataset

Per verificare la bontà del mio codice ho deciso di usare una semplice melodia, molto conosciuta "old McDonald". Eccone una preview (ottenuta con lilopond)

[score]

Per ottenerloa ho scritto queste note nella mia DAW preferita (reaper) e la ho esportata in formato MIDI con l'intendo di farne poi un parsing allì'interno del codice python usando la libreria music21.

Se il nostro algoritmo è ben progettato, riusciremo anche solo con il solo ascolto dell'output a capire il suo corretto funzionamento. In altri termini, mi aspetto che la melodia in uscita dall'automaton mostrerà delle somiglianze più o meno notevoli alla melodia originale.

# primo ordine

Una prima analisi che si può fare della melodia data e contare quante volte una data nota compare al suo interno. Ecco una heatmap (ottenuto con matplotlib) che rappresenta il quantitativo delle note all'interno della nostra melodia di partenza:

[heatmap 1st order]

L'automaton più semplice che possiamo ottenere è quello del primo ordine, ovvero un algoritmo che generi nuove note in funzione della frequenza con le quali queste note compaiono nella melodica di partenza.

Ecco come suona l'output di un automaton di primo ordine allenato sulla nostra melodia.

[audio]

Quanto stiamo ascoltando è 1 minuto di audio ottenuto dall'algoritmo (ottenuto con un event pattarn in SuperCollider che riproduce note musicali in base alla descrizione dell'automaton di primo grado memorizzata all'interno di un fle YAML, output dello script di analisi python)

[MIDI file (dataset)] --> [python: music21 analysis algorythm] --> [YML automaton description file] --> [SuperCollider] --> [audio]
                                                                |->[score output (via lylipond)]
                                                                |->[graphs - matplotlib]


# 2nd order

Fino a qui tutto ok, l'algoritmo funziona ma con un automaton di primo ordine, così semplice, il risultato risulta musicalmente ancora abbastanza rudimentale. proviamo a complicare le cose e a porci altre domande. una melodia non è soltanto una successione casuale di note. Ogni nota ne segue un'altra a seconda del pensiero artistico dell'autore. Un progetto per così dire che ha volute disporre le note secondo un determinato ordine. Come possiamo dare per tenerne conto?

Possiamo ad esempio costruire un nuovo automaton che sia in grado di restituire una determinata nota in funzione di quale sia stata la nota precedentemente selezionata. E' questo l'automa di secondo ordine, quello che analizza il dataset estraendo informazioni sulla successione di due note.

Eccono una heatmap che rappresenta una statistica di secondo ordine della nostra melodia di partenza:

[heatmap 2nd]

Per diletto potremmo anche rappresentare questi rapporti con un grafo connesso dove ogni nota sia rappresentata da un nodo mentre ogni connessione (edge) rappresenti i rapporti tra due note, ciascuno di essi con uno spessore differente a seconda della probabilità della transizione tra una nota e l'altra.

[dotgraph]

Sono sempre stato affascianato dai grafici di qiesto tipo e mi sono divertito a inserire nello script python una funzionalità esposrtarlo in automatico usando il modulo `graphviz`. ho pensato che disporre di una rappresentazione di questo tipo potesse in qualche modo aiutare la comprensione dell'algoritmo. Il diagramma di funzionamento si puà aggiornare come segue

[MIDI file (dataset)] --> [python: music21 analysis algorythm] ----> [YML automaton description file] --> [SuperCollider] --> [audio]
                                                                |--> [score output (via lylipond)]
                                                                |--> [graphs - matplotlib]
                                                                |--> [dotgraph - 2nd order only]

Come suona un automaton di secondo ordine?

[audio]

Si può notare che, aumentando l'ordine dell'automaton, le note si susseguono in modo differente e il profilo di questa nuova melodia in uscita più rassomiglia il materiale musicale di partenza.

# ordine più alti

Si potrebbe spingere questo ragionamento ancora oltre ad esempio analizzando le successioni di 3 note od ottenere così un automaton di terzo ordine il quale risponde alla domanda "spaendo che ho già suonato queste due note in successione, quale sarà la nuova nota da suonare?"

[3rd order]

Similemnte per il quarto

[4th order]

e così via


# considerazioni

Questi primi risultati sono interessanti a mio avviso perchè mostrano come, basandoci sulla statistica e sulla probabilità si possano ottenere delle macchine in grado di generare autonomamente delle melodie nuove ma al contempo che molto rassomigliano il meteriale fornito dome dataset di partenza. Mi immagino ad esempio ad un loro utilizzo in un contesto di installazione multimediale dove sia necessario produrre di continuo musica nuova e sempre diversa che possa essere generata in automatico (musica generativa).

L'ideale secondo me sarebbe quello di produrre un dataset molto più nutrito, magari registrando una propria performance, anche di lunga durata, trasformandola in poi in file MIDI e usare un automa di ordine elevato per disporre di un alterego di se stessi che suona melodie di continuo rispettando in quelche modo il nostro gusto e il nostro modo di suonare :)


Come abbiamo già detto, va qui ricordato che non stiamo ancora considerando altri aspetti fondamentali per generazione della melodia, come il ritmo o la dinamica. Che risultati si potrebbero ottenere se lo facessimo?
Cosa succederebbe se, ad esempio, il nostro automata tenesse in considerazione anche la durata di ciascuna nota nelle sue analisi statistiche della partiture in input?

# adding time / rhythm

La heatmap di primo ordine si arricchisce di più elementi rispetto a quella che abbiamo incontrato in precedenza. Nella melodia, note accumunate dallo stesso pitch diventano ora entità differenti perchè hanno durate differenti tra loro.

[heatmap 1st order]

Sin da un primo ascolto si nota che, pur essendo questo l'automata più rudimentale, quello di primo ordine, abbiamo che le durate delle note vengono rispettate.

[audio]

E mano a mano che aumentiamo l'ordine dell'automa, il rispettivo risultato sonoro diventa via via sempre più sovrapponibile con il materiale di partenza.

[4th




