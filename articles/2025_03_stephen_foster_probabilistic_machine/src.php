<?php genheader("Stephen Foster probabilistic machine", "March 30, 2025");?>

<p>In the experiments from the <a href="../probabilistic_automaton_for_melodies_first_tests/index.html">previous post</a>, we tried to build a probabilistic machine capable of generating new melodies based on an input melody. At the moment, our probabilistic machine can already output notes with different pitches (as well as rests) and different durations, depending on the input data provided.</p>

<p>I believe these experiments have effectively demonstrated how important it is for the dataset to be extensive in order to achieve musically convincing outputs.</p>

<p>I'm curious to try building a larger database to feed into the machine to see whether the output can actually sound more, let's say, complete, complex, varied, and convincing while still maintaining the same essence present in the original data.</p>

<p>To achieve this, I will closely follow the same steps that Olson described in Chapter 10 of his "<i>Music, Physics and Engineering</i>" book.</p>

<?php h("(Large) Dataset preparation");?>

<?php img("images/Stephen_Foster.jpeg", 18, "float:right; margin-bottom: 2ch; margin-right: 1ch; margin-left:2ch;");?>

<p>In the section "<i>Statistical Analysis of Musical Compositions</i>", Olson sets out to collect some of the most well-known melodies (at least to an American audience) from popular songs composed by <b>Stephen Foster</b><?php footnote("Stephen Foster wiki page", "https://en.wikipedia.org/wiki/Stephen_Foster");?>, a composer who lived between 1826 and 1864.</p>

<p>Olson selects 11 songs. I was able to find most of them in the Petrucci Music Library (IMSLP)<?php footnote("Petrucci Music Library (IMSLP)", "https://imslp.org/");?>, transcribed into MIDI by the same curator, Robert A. Hudson, and shared in the library under a Creative Commons Attribution license.</p>

<p>Below, I list the titles, catalog numbers, and links to the library where the corresponding MIDI files can be downloaded (see <code>Performances > Synthesized/MIDI</code> section):</p>

<ol>
  <li><i>(Old) Uncle Ned</i> (IMSLP catalogue number and <a target="_blank" href ="https://imslp.org/wiki/Old_Uncle_Ned_(Foster,_Stephen)#IMSLP193416">193416</a>);</li>
  <li><i>Massa's in the Cold Cold Ground</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/Massa%27s_in_de_Cold_Ground_(Foster,_Stephen)#IMSLP186851">186851</a>;</li>
  <li><i>My Old Kentucky Home</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/My_Old_Kentucky_Home_(Foster,_Stephen)">205542</a>);</li>
  <li><i>Ring, Ring de Banjo</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/Ring,_Ring_de_Banjo!_(Foster,_Stephen)#IMSLP179311">179311</a>);</li>
  <li><i>Old black Joe</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/Old_Black_Joe_(Foster,_Stephen)#IMSLP174777">174777</a>);</li>
  <li><i>Oh Susannah</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/My_Old_Kentucky_Home_(Foster,_Stephen)#IMSLP205542">174603</a>);</li>
  <li><i>Old Folks at Home</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/Old_Folks_at_Home_(Foster,_Stephen)#IMSLP176663">176663</a>);</li>
  <li><i>Camptown Races</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/De_Camptown_Races_(Foster,_Stephen)#IMSLP174383">174383</a>);</li>
  <li><i>Under the Willow She's Sleeping</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/Under_the_Willow_She%27s_Sleeping_(Foster,_Stephen)#IMSLP242581">242581</a>);</li>
  <li><i>Hard Times, Come Again No More</i> (IMSLP catalogue number <a target="_blank" href ="https://imslp.org/wiki/Hard_Times_Come_Again_No_More_(Foster,_Stephen)#IMSLP174492">174492</a>);</li>
</ol>

<p>Once the MIDI files were collected, I wrote a small Python tool that allowed me to prepare and aggregate the melodies of each song into a single MusicXML file (using the music21 library).</p>

<div style="text-align: center;">
<?php img("images/process_diagram.svg", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>The steps I followed to create the aggregated database are as follows:</p>

<p><b>1.</b> Using Python and music21, I open each MIDI file and determine its key. If it is different from C major (A minor), I transpose the score accordingly. The goal of this step is to ensure that all melodies are ultimately contextualized in the same key of C major or its minor relative;</p>

<p><b>2.</b> The arrangements by Robert A. Hudson obtained from IMSLP are written for piano and two or three voices. I noticed that the melody is always clearly stated in the first vocal part, therefore, I remove all other parts;</p>

<p><b>3.</b> Now, only a single vocal part remains, but this does not mean that multiple voices or chords cannot exist inside it. In other words, there may be vertical note configurations (two or more notes played simultaneously). At the moment, our probabilistic machine cannot yet handle polyphony, only monophony. It is therefore necessary to remove all notes except for the highest one where needed (in all cases where multiple notes are present simultaneously, we assume that the melody note - as conceived by the composer - is the highest one);</p>

<p><b>4.</b> We're almost there! Now we have a monophonic part containing the full melody. However, it is possible that the playable notes only appear after a variable number of empty measures, or that additional measures remain after the melody is complete. For our experiment, I consider it necessary to remove them;</p>

<p><b>5.</b> I now open the intermediate mXML file in MuseScore and make any necessary manual corrections. A recorded MIDI performance, when converted into sheet music, may display unusual rhythmic configurations, such as notes and rests with unexpected tuplets durations or strange ties and so on. This could result from misinterpretation by the notation software if the MIDI file was not previously quantized to a metric grid and still contains excessive "<i>humanization</i>". I then save the file again in mXML format for the final step.</p>

<p>At this point, I have the individual 10 melodies available. In other words, the 10 musical themes composed by Foster that serve as the foundation for this experiment.</p>

<p>Soon, we will combine them one after another into a single score that will serve as input for our probabilistic machine but first, let's listen to them individually. The following list shows the songs in the same order in which they will be aggregated into the final score:</p>

<!--
<p>I passaggi che ho seguito nella creazione del database aggregato sono i seguenti:</p>

<p><b>1.</b> Usando python e music21, apro ciascun MIDi file e ne valuto la tonalità. Se diversa da Do maggiore (La minore), traspongo la partitura opportunamente. L'obiettivo di questo passaggio è che tutte le melodie risultino infine contestualizzate nella stessa tonalità di Do maggiore/La minore;</p>

<p><b>2.</b> Gli arrangiamenti di Robert A.Hudson ottenuti da IMSLP sono scritti per pianoforte e due o tre voci. La melodia, ho notato, viene sempre chiaramente enunciata della prima parte vocale pertanto, elimino tutte le altre Parti.</p>

<p><b>3.</b> Ora rimane una sola parte vocale, il che non significa che, al uo interno non possano convivere più voci o accordi. In altri termini potrebbero esistere nella Parte alcune configurazioni verticali di note (due o più note da suonare simultaneamente). Al momento la nostra macchina probabilistica non può ancora gestire la polifonia, ma soltanto una nota alla volta (monofonia). E' necessario quindi eliminare tutte le note ad eccezione della più acuta dove necessario (in tutti i casi in cui si presentino più note simultanee stiamo dando per scontato che la note della melodia - così come pensata dal compositore - sia la più acuta);</p>

<p><b>4.</b> Ci siamo quasi, ora disponiamo di una parte, monofonica, che canta la melodia completa. Tuttavia potrebbe essere che le note da suonare sopraggiungano soltanto dopo un numero variabile di battute vuote, oppure che a seguito del completamento della melodia, ne rimangano altre prima del termine dello score. Per il nostro esperimento ritengo necessario eliminarle;</p>

<p><b>5.</b> Ora apro il file mxml intermedio con MuseScore e opero, se necessario, alcune correzioni manuali. Può essere infatti che un'esecuzione registrata in formato MIDI, quando convertita in partitura finisca col mostrare strane configurazioni ritmiche di note e pause, tuplets e legature. Questo potrebbe essere il risultato di una mala interpretazione da parte del software di notazione del MIDI file in quanto questo potrebbe non essere stato precedentmente quantizzato alla griglia metrica e quindi presentare ancora elementi eccessivamente humanized. Salvo il file nuovamente in fomrmato mxml per l'ultimo step.</p>

<p>Al momento ho quindi a disposizione le singole, 10 melodie. In altri termini, i 10 temi musicali composti da Foster alla base di questo esperimento. Fra poco li aggregheremo assieme, uno dopo l'altro, all'interno di una unica partitura che farà da input per la nostra macchina probabilistica, ma prima scoltiamolì così, singolarmente. La lista seguente elenca i brani nello stess oordine in cui essi verranno aggragati nello score finale:</p>
-->

<table style="width: 80%; margin:auto;">
  <tr>
    <td>(Old) Uncle Ned</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP193416-PMLP332442-Old_Uncle_Ned_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Massa's in the Cold Cold Ground</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP186851-PMLP203532-Massas_in_de_Cold_Ground_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>My Old Kentucky Home, Good Night</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP205542-PMLP307841-My_Old_Kentucky_Home_Good_Night_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Ring Ring de Banjo</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP179311-PMLP314268-Ring_Ring_de_Banjo_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Old Black Joe</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP174777-PMLP308193-Old_Black_Joe_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Oh Susanna</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP174603-PMLP307941-Oh_Susanna_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Old Folks at Home</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP176663-PMLP23988-Old_Folks_at_Home_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Camptown Races</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP174383-PMLP223271-Camptown_Races_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Under the Willow She's Sleeping</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP242581-PMLP392652-Under_the_Willow_Shes_Sleeping_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>

  <tr>
    <td>Hard Times Come Again No More</td>
    <td>
      <audio controls="" style="width:100%; margin: auto;"> <source src="sounds/IMSLP174492-PMLP307788-Hard_Times_Come_Again_No_More_melody_manual_edits.ogg" type="audio/ogg"> </audio>
    </td>
  </tr>
</table>

<!--
<i>Old black Joe</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174777-PMLP308193-Old_Black_Joe_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>Old Folks at Home</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP176663-PMLP23988-Old_Folks_at_Home_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>Massa's in the Cold Cold Ground</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP186851-PMLP203532-Massas_in_de_Cold_Ground_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>Hard Times, Come Again No More</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174492-PMLP307788-Hard_Times_Come_Again_No_More_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>(Old) Uncle Ned</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP193416-PMLP332442-Old_Uncle_Ned_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>My Old Kentucky Home</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP205542-PMLP307841-My_Old_Kentucky_Home_Good_Night_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>Oh Susannah</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174603-PMLP307941-Oh_Susanna_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>Camptown Races</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP174383-PMLP223271-Camptown_Races_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>Ring, Ring de Banjo</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP179311-PMLP314268-Ring_Ring_de_Banjo_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>

<i>Under the Willow She's Sleeping</i><br>
<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/IMSLP242581-PMLP392652-Under_the_Willow_Shes_Sleeping_melody_manual_edits.ogg" type="audio/ogg"> </audio>
</div>
-->

<br>

<p>Finally, I merge all these files into a single score. Here it is below (for readability, I have included the titles of each melody and alternately colored them):</p>

<div style="text-align: center;">
<?php img("images/combined_score_coloured-1.png", 100, "margin-top: 2ch; margin-bottom: 1ch;");?>
<?php img("images/combined_score_coloured-2.png", 100, "margin-top: 1ch; margin-bottom: 1ch;");?>
<?php img("images/combined_score_coloured-3.png", 100, "margin-top: 1ch; margin-bottom: 1ch;");?>
<?php img("images/combined_score_coloured-4.png", 100, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>


<?php h("Probabilistic machine in action");?>

<p>Feeding this file into the Python script from the previous post allows us to generate probabilistic machines of first, second, and higher orders. With SuperCollider, we can then listen to their behavior.</p>

<p>Here, for example, is a recording obtained from the <i>fourth-order</i> automaton:</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/stephen_foster_4order_test_1.ogg" type="audio/ogg"> </audio>
</div>

<p>At first listen, it seems to me that the machine is functioning as expected, generating a varied melodic line that remains somehow anchored to the original material. However, I'm not sure if this experiment has left me particularly satisfied.</p>

<p>Perhaps it's because I'm not sufficiently familiar with these melodies, or maybe I’m unable to focus enough on the pseudo-random movement of the generated melody to discern which trajectories from the original database it is following and which "probabilistic jumps" it is taking. Maybe I need to build a different kind of database, perhaps one derived from notes I have played myself, in my own style. That way, I might be able to draw more meaningful conclusions.</p>

<p>I’d be curious to explore this further, analyzing the sequence of notes more closely to truly understand the decision-making paths the machine is taking, step by step. Maybe I need some kind of animated graphical representation. I'll leave that idea for future experiments.</p>

<p>In the meantime, below, even if they are difficult to interpret, I wanted to include the graphs generated during the execution of the Python script for machines of various orders. It's fascinating to see how, compared to previous experiments, the complexity has significantly increased.</p>

<p>Prepare for a loooong scroll :)</p>

<!--
<p>Ad un primo ascolto mi sembra di percepire che la macchina stia funzionando come immaginato, tracciando una linea melodica varia ma sempre in qualche modo ancorata al materiale originario. Non saprei se questo esperimento mi abbia reso particolarmente soddisfatto.</p>

<p>Forse tutto dipende dal fatto che non ho sufficiente familiarità con le melodie in questione, oppure forse non riesco a prestare abbastanza attenzione al movimento pseudo-casuale della melodia generata per capire quali direzioni del database originale essa stai ricalcando oppure quali siano invece i "salti" probabilistici da lei intrapresi. Forse avrei bisogno di costruire un database di tipo diverso, magari ottenuto da note che io stesso ho suonato, con il mio modo e il mio stile. Forse così riuscirei a trarre conclusioni più complete.</p>

<p>Sarei curioso di approfondire ulteriormente, analizzando più a fondo questo susseguirsi di note per capire a tutti gli effetti quali siano i percorsi decisionali che la macchina stia facendo passo passo. Forse mi serve qualche tipo di rappresentazione grafica animata. Lascio la cosa per futuri eseprimenti.</p>

<p>Nel frattempo, qui di seguito, anche se di difficile lettura, mi piace riportare i grafici ottenuti durante l'esecuzione dello script python per le macchine di vario ordine. E' affascinante vedere come, rispetto ai precedneti esperimenti, la complessità sia qui notevolmente aumentata.</p>
-->

<p><b>First Order automaton</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_1_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p><b>Second Order automaton</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_2_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>

<?php img("images/combined_score_2_order_dotgraph.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p><b>Third Order automaton</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_3_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p><b>Fourth Order automaton</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_4_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p><b>Fifth Order automaton</b></p>

<div style="text-align: center;">
<?php img("images/combined_score_5_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<?php h("Considerations");?>

<p>I'm not 100% sure, but I believe there is an inherent error in my experiment. I'm referring to the preparation of the database, which was created by aggregating different melodies.</p>

<p>I suspect that by sequencing the melodies in this way, the machine is unintentionally learning this specific order as well. In other words, the machine is considering the probabilities of the final note (or rest) of one melody being followed by the first note (or rest) of the next melody in the sequence, even though, in reality, the order of the melodies should not be relevant.</p>

<p>How can this be avoided? These cases should ideally be excluded from the probability calculations. Something to explore in future experiments...</p>
