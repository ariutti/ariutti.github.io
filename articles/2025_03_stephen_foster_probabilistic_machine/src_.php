<?php genheader("Stephen Foster probabilistic machine", "March 30, 2025");?>

<p>Negli esperimenti al precedente post abbiamo provato a costruire una macchina probabilistica che potesse generare nuove melodie a partire da una melodia data in ingresso. Al momento la nostra macchina probabilistica è già in grado di fornire in output note di pitch differente (oltre che pause) ma anche di durata differente in base ai dati forniti in ingresso.</p>

<p>Credo che questi esperimenti abbiano mostrato efficaciemente quanto sia importante che il dataset sia ampio per ottenere output musicalmente convincenti.</p>

<p>Sono curioso di provare a costruire un database più grande da fornire in ingresso alla macchina per capire se, effettivamente, l'output possa effettivamente suonare più, come dire, completo, compesso, variato, convincente e, allo stesso tempo mantenere lo stesso sapore contenuto nei dati di partenza.</p>

<p>Per farlo seguirà pedissequamente gli stess istep che Olson ha descritto al capitolo 10 del suo libro "Music, Physics and Engineering".</p>

<?php h("(Large) Dataset preparation");?>

<p>Nella sezione "Statystical Analysis of Musical Compositions", Olson si propone di raccogliere alcune delle melodie più conosciute (almeno alle orecchie di uno statunitense) tratte da brani popolari composti da Stephen Foster (https://en.wikipedia.org/wiki/Stephen_Foster), compositore vissuto a cavallo tra il 1826 e il 1864.</p>

<p>Olson seleziona 11 canzoni. Sono riusicto a trovarne la maggiorparte sul catalogo Petrucci, trascritte in MIDI dal medesimo curatore, tale Robert A.Hudson e condivise sulla libreria con licenza Creative Commons Attribution. Riporto di seguito i titoli, numero di catalogo e link alla libreria per poterne scaricare i realtivi MIDI):</p>

<ol>
<li><i>Old black Joe</i> (IMSLP catalogue number 174777 and <a href="https://imslp.org/wiki/Old_Black_Joe_(Foster,_Stephen)#IMSLP174777">link</a> );</li>
<li><i>Old Folks at Home</i> (IMSLP catalogue number 176663 and <a href="https://imslp.org/wiki/Old_Folks_at_Home_(Foster,_Stephen)#IMSLP176663">link</a> );</li>
<li><i>Massa's in the Cold Cold Ground</i> (IMSLP catalogue number 186851 and <a href="https://imslp.org/wiki/Massa%27s_in_de_Cold_Ground_(Foster,_Stephen)#IMSLP186851">link</a> );</li>
<li><i>Hard Times, Come Again No More</i> (IMSLP catalogue number 174492 and <a href="https://imslp.org/wiki/Hard_Times_Come_Again_No_More_(Foster,_Stephen)#IMSLP174492">link</a> );</li>
<li><i>(Old) Uncle Ned</i> (IMSLP catalogue number 193416 and <a href="https://imslp.org/wiki/Old_Uncle_Ned_(Foster,_Stephen)#IMSLP193416">link</a> );</li>
<li><i>My Old Kentucky Home</i> (IMSLP catalogue number 205542 and <a href="https://imslp.org/wiki/My_Old_Kentucky_Home_(Foster,_Stephen)">link</a> );</li>
<li><i>Oh Susannah</i> (IMSLP catalogue number 174603 and <a href="https://imslp.org/wiki/My_Old_Kentucky_Home_(Foster,_Stephen)#IMSLP205542">link</a> );</li>
<li><i>Camptown Races</i> (IMSLP catalogue number 174383 and <a href="https://imslp.org/wiki/De_Camptown_Races_(Foster,_Stephen)#IMSLP174383">link</a> );</li>
<li><i>Ring, Ring de Banjo</i> (IMSLP catalogue number 179311 and <a href="https://imslp.org/wiki/Ring,_Ring_de_Banjo!_(Foster,_Stephen)#IMSLP179311">link</a> );</li>
<li><i>Under the Willow She's Sleeping</i> (IMSLP catalogue number 242581 and <a href="https://imslp.org/wiki/Under_the_Willow_She%27s_Sleeping_(Foster,_Stephen)#IMSLP242581">link</a> );</li>
</ol>

<p>Una volta collezionati i MIDI files si è trattato di scrivere un piccolo tool in python che mi consentisse di prepare ed aggregare le melodie di ciascuna canzone in un unico file music XML (con l'ausilio della libreria musc21).</p>

<div style="text-align: center;">
<?php img("images/process_diagram.svg", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>I passaggi che ho seguito nella creazione del database aggregato sono i seguenti:</p>
<ol>
<li>Usnado python e music21, apro ciascun MIDi file e ne valuto la tonalità. Se diversa da Do maggiore (La minore), traspongo la partitura opportunamente. L'obiettivo di questo passaggio è che tutte le melodie risultino infine contestualizzate nella stessa tonalità di Do maggiore/La minore;</li>
<li>Gli arrangiamenti di Robert A.Hudson ottenuti da IMSLP sono scritti per pianoforte e due o tre voci. La melodia, ho notato, viene sempre chiaramente enunciata della prima parte vocale pertanto, elimino tutte le altre Parti.</li>
<li>Ora rimane una sola parte vocale, il che non significa che, al uo interno non possano convivere più voci o accordi. In altri termini potrebbero esistere nella Parte alcune configurazioni verticali di note (due o più note da suonare simultaneamente). Al momento la nostra macchina probabilistica non può ancora gestire la polifonia, ma soltanto una nota alla volta (monofonia). E' necessario quindi eliminare tutte le note ad eccezione della più acuta dove necessario (in tutti i casi in cui si presentino più note simultanee stiamo dando per scontato che la note della melodia - così come pensata dal compositore - sia la più acuta);</li>
<li>Ci siamo quasi, ora disponiamo di una parte, monofonica, che canta la melodia completa. Tuttavia potrebbe essere che le note da suonare sopraggiungano soltanto dopo un numero variabile di battute vuote, oppure che a seguito del completamento della melodia, ne rimangano altre prima del termine dello score. Per il nostro esperimento ritengo necessario eliminarle;</li>
<li>Ora apro il file mxml intermedio con MuseScore e opero, se necessario, alcune correzioni manuali. Può essere infatti che un'esecuzione registrata in formato MIDI, quando convertita in partitura finisca col mostrare strane configurazioni ritmiche di note e pause, tuplets e legature. Questo potrebbe essere il risultato di una mala interpretazione da parte del software di notazione del MIDI file in quanto questo potrebbe non essere stato precedentmente quantizzato alla griglia metrica e quindi presentare ancora elementi eccessivamente humanized. Salvo il file nuovamente in fomrmato mxml per l'ultimo step.</li>
</li>

<p>Al momento ho quindi a disposizione le singole, 10 melodie. In altri termini, i 10 temi musicali composti da Foster alla base di questo esperimento. Ascoltiamoli prima di procedere:</p>


<i>Old black Joe</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174777-PMLP308193-Old_Black_Joe_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>



<i>Old Folks at Home</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP176663-PMLP23988-Old_Folks_at_Home_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>


<i>Massa's in the Cold Cold Ground</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP186851-PMLP203532-Massas_in_de_Cold_Ground_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>



<i>Hard Times, Come Again No More</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174492-PMLP307788-Hard_Times_Come_Again_No_More_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>


<i>(Old) Uncle Ned</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP193416-PMLP332442-Old_Uncle_Ned_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>


<i>My Old Kentucky Home</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP205542-PMLP307841-My_Old_Kentucky_Home_Good_Night_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>



<i>Oh Susannah</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174603-PMLP307941-Oh_Susanna_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>



<i>Camptown Races</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174383-PMLP223271-Camptown_Races_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>


<i>Ring, Ring de Banjo</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP179311-PMLP314268-Ring_Ring_de_Banjo_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>



<i>Under the Willow She's Sleeping</i>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP242581-PMLP392652-Under_the_Willow_Shes_Sleeping_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<p>Infine aggrego tutti questi files in una partitura unica, Eccola qui di seguito</p>

<div style="text-align: center;">
<?php img("images/combined_score_score.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<?php h("First order automaton");?>

<div style="text-align: center;">
<?php img("images/combined_score_1_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<?php h("Superior order automatons");?>

<p>Di seguito, anche se davvero di difficile lettura, i grafici che l'agoritmo restituisce a seguito dell'anilisi del database.</p>

<p><b>Secondo Ordine</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_2_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>

<?php img("images/combined_score_2_order_dotgraph.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p><b>Terzo Ordine</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_3_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p><b>Quarto Ordine</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_4_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p><b>Quinto Ordine</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_5_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>Ecco come suona l'automaton di Quarto Ordine:</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/stephen_foster_4order_test_1.mp3" type="audio/mp3"> </audio>
</div>



<?php h("Considerations");?>








Adesso sinceramente non saprei come proseguire, perchè, se da un lato questo compositore è molto conosciuto alle orecchie degli statunitensi, a me no. E vorrei trovare dunque un compositore più diciamo "trasversale, valido per tutte le culture. Ma al momento (21/09/2024) non lo trovo.

# Se considerassimo anche le durate

Si può ragionare almeno in due modi diversi secondo me:
1. considerando la decisione della nota e la scelta del tempo come due processi indipendneti in cui
Il primo sistema è basato su una macchina a stati finiti (di ordine arbitrario) e il secondo sistema invece prende le decisioni in merito alla durata. Questo secondo sistema potrebbe funzionare in due modi diversi:
    + La probabilità della durata della nota (o pausa) sarebbe calcolata in base alle frequenze delle durate, in senso assoluto, indipendentemente dalla nota in partitura. Mi spiego meglio, conto quante note (o pause) da 1/4 ci sono, quante da 1/8, quante da 1/16, e così via. scelgo in base a questo. Questo approccio secondo me è di utilità solo parziale perchè non tiene conto dei rapporti tra note-durata consecutive. che è anche inmportante in musica.
    + potrebbe anche essere che, data una nota selezionata, si vada cercando con quanti tipi differenti di durate essa è comparsa nel database. e si scelga statisticamente una durata per via statistica.

2. In alternativa, la macchina a stati è costruita in modo tale che la durata di una nota è intrinseca con la probabilità della nota stessa. La concatenazione di stati nella FSM deve contemplare anche la durata.



# ATTENZIONE
C'è un vizio nel training di Stephen Foster. Se si mettono i brani uno dopo l'altro, lui imparerà a riprodurli uno dopo l'altro.
