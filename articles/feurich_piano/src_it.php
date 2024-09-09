<?php h("Abstract");?>

Sul come, dopo diversi tentativi, sono infine riuscito a far comunicare in MIDI il mio pianoforte acustico con il mio laptop.

<?php h("Introduction");?>

Quando ero più giovane ero abituato a trascorrere molto tempo sul pianoforte. In camera mia, vicino alla mia scrivania, c'era un pianoforte acustico, verticale, che i miei genitori avevano acquistato per permettere a me e ai miei fratelli e sorelle di esercitarsi nella pratica della musica. Era bello averlo così a portata di mano: mi bastava girare la sedia e subito potevo sentirne il suono. Se mi veniva qualche idea potevo subito provarla con una grande immediatezza (qui una foto del pianoforte, datata ottobre 2002)

<?php img("images/DSCF0047.JPG", 25, "float:left; margin-bottom: 2ch; margin-left: 1ch; margin-right:2ch;");?>

Da quando ho cominciato a vivere per conto mio non ho più avuto con me il mio pianoforte pur tuttavia continuassi, almeno per i primi anni, ad esercitarmi su una qualche tastiera digitale.

Suonare un pianoforte acustico non è minimamente confrontabile con il suonare una tastiera digitale. Non è solo un fatto di suono (quello di un pianoforte acustico è caldo, largo e avvolgente mentre trovo sottile e monodimensionale quello di una tastiera digitale) o di sensazione tattile/meccanica del tocco (nonostante ci siano tastiere digitali che hanno una bellissima meccanica pesata davvero molto convincente) ma è anche una questione di praticità e immediatezza.

Mi ritengo una persona piuttosto paziente ma per certe cose credo di essere diventato piuttosto intollerante. Se sento il bisogno di suonare lo devo poter fare subito, non voglio che il mio entusiasmo si raffreddi con perdite di tempo come, collegare la tastiera alla corrente elettrica, cercare dove ho messo le cuffie, collegarle all ostrumento avendo cura di disporre correttamente il cavo in modo da non inciamparci e non averlo "tra i piedi" mentre si suona.

Ora che sto scrivendo questo articolo mi sembrano davvero cose di poco conto, ma se reiterate di continuo, finiscono per diventare una scocciatura e per "fissarsi" con l'esperienza stessa del suonare. A lungo andare finiscono per intristire anche quei pochi momenti che invece dovrebbero essere rilassanti e liberatori sullo strumento.

***

E' anche per questo che qualche mese fa io e mia moglie abbiamo decisto di acquistare un pianoforte acustico per la nostra casa (verticale ovvio perchè lo spazio non è che sia poi così ampio).

E' passato un poco di tempo prima che decidessimo ma, poco a poco, ci siamo appassionati all'idea di:

<ul>
<li>riprendere (per me), cominciare (per mia moglie) gli studi musicali;</li>
<li>suonare il piano per divertimento e passatempo;</li>
<li>usarlo anche come strumento di lavoro, per comporre e testare le idee per nuove composizioni;</li>
<li>usarlo come sorgente sonora, registrandolo magari con qualche microfono;</li>
</ul>

Dopo varie ricerche ci siamo innamorati di un pianoforte Feurich 125 che abbiamo trovato per caso da un accordatore/riparatore fuori città. E' un bellissimo pianoforte costruito nel 1983 nella Germania Ovest e che conta, tra le altre particolarità, una meccanica Renner e una tavola armonica della azienda Ciresa realizzata in abete.

[foto]

Il pianoforte dispone di due pedali: uno il "forte/risonanza" e l'altro per l'effetto "una corda" (che nel nostro piano è implementato sottoforma di avvicinamento dei martelletti alle corde); oltre a questi due pedali, il piano possiede una leva laterale (che funge da pedale di _sordina_) che se azionata fa sì che un panno in feltro scenda frapponendosi tra i martelli e le corde: si ottiene così un suono squisitamente ovattato e suggestivo.

Al momento dell'acquisto abbiamo chiesto che ci venisse installato un sistema di silenziamento, in altri termini un sistema che, attraverso sensoristica ed elettroniche varie, ci permettesse di suonare il pianoforte anche in cuffia, senza che lo strumento producesse alcun suono udibile nell'ambiente.

I sistemi di silenziamento nascono principalmente per consentire lo studio e la pratica del pianoforte senza arrecare fastidio a inquilini o vicini di casa. La presenza di sensori in tandem con l'azionamento di un sistema meccanico che interreompe la corsa dei martelli appena prima che arrivino a percuotere le corde, rende il pianoforte totalmente silenzioso e allo stesso tempo fruibile attraverso un paio di cuffie.

La nostra richiesta non è nata tanto per ovviare l'eventuale fastidio che il suono dello strumento avrebbe potuto arrecare ai vicini di casa, piuttosto per poter disporre di un sistema che fosse in grado di convertire la pressione dei tasti e dei pedali in segnali digitali: questo ci avrebbe aperto le porta a diversi tipi di sperimentazione e senza dubbio, in primo luogo, ci avrebbe consentito di poter registrare le nostre performance anche in formato MIDI!

***

Dalla mia esperienza i pianoforti Yamaha o Kaway ad esempio possono essere acquistati con un sistema di silenziamento "di fabbrica" ma è anche possibile installare un sistema di silenziamento ex-nove anche su pianoforti che originariamente non lo prevedevano (l'intervento di installazione non è particolarmente invasivo).

Esistono almeno due kit di silenziamento di questo tipo, uno è **adsilent** fabbricato in Germania (https://www.adsilent.eu/en/) l'altro è **Genio**, della azienda koreana URSlab.kr (https://usrlab.kr/), in particolare il sistema montato sul nostro feurich è un Genio Premium alpha e funziona abbastanza bene!

<?php h("My room");?>

Come dicevo, se uno degli obiettivi era appunto quello di registrare le performance musicali attraverso il MIDI sul PC, occorreva capire come collegare il Genio alla mia postazione di lavoro. Di seguito la configurazione del nostro studio di casa.

<?php img("images/room_v1_640.jpg", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

Si nota subito un primo problema; la mia postazione di lavoro abituale si trova ad una certa distanza dallo strumento. Una soluzione poteva essere quella di rifattorizzare le posizioni di tutti gli arredi della stanza per permettere alla scrivania di trovarsi in prossimità del piano. Pur avendo contemplato questa possibilità, la verità è che l'abbiamo scartata: la stanza per come è configurata attualmente ci piace molto e non abbiamo intenzione per ora di muovere alcunchè!

Il problema del collegamento tra pianoforte e laptop non è ancora risolto e dobbiamo pertanto prendere in esame altre opzioni.

<?php h("Using a long USB cable");?>

Il sistema Genio può essere collegato ad un PC tramite un cavo USB (porta 3).

<?php img("images/GENIO-front.png", 100, "margin-bottom: 2ch; margin-top:2ch;");?>

Utilizzare un cavo USB sarebbe stata la soluzione migliore e, sebbena questa connessione funzioni bene quando il cavo USB abbia lunghezze relativamente ridotte, non avrebbe funzionato altrettando bene nel nostro caso d'uso: il cavo USB avrebbe dovuto estendersi per oltre 5 metri e questo avrebbe comportato una degradazione del segnale digitale.

<?php h("Making deferred MIDI recordings");?>

Un'altra opzione poteva essere quella di effettaure le registrazioni su un dispositivo collegata al Genio (come una chiavetta USB da connettersi alla porta USB denominata _memory_, nell'immagine con il numero 4). La chiavetta USB può essere utilizzata per traghettare di volta in volta queste registrazioni dal Genio al PC.

Seppure intrigante, nonostante il differimento tra performance e riascolto della stessa sul PC, anche questa stategia si è rivelata ahimè non praticabile per quello che sembra un curioso difetto nel firmware del Genio.

In sostanza, e la cose non mi è stata smentita dal supporto ufficiale dell'azienda usrlab dopo che avevo scritto loro una mail a proposito, il firmware non è in grado di registrare eventi di tipo CC. Ad esempio il funzionamento del pedale del forte non viene registrato con control continuous, piuttosto viene tradotto come eventi di note-off sulle note che risultavano sostenute.

in queste due immagini è ben visibile la differenza tra i due casi:

<table>

<tr>
  <td>registrazione tramite cavo USB</td>
  <td>registrazione su USB stick</td>
</tr>

<tr>
  <td>immagine 1</td>
  <td>immagine 2</td>
</tr>

<tr>
  <td>il funzionamento del pedale del sustain è correttamente registrato tramite messaggi di CC</td>
  <td>il file MIDI che il firmware del Genio salva sul dispositivo USB non contiene alcuna informazione su controlli di tipo continuo. Il funzionamento del pedale del forte non viene registrato. Piuttosto, al rilascio del pedale, questo evento viene "simulato" scrivendo messaggi di note-off.</td>
</tr>

</table>

Come si vede, questo sistema è pesantemente difettato e risulta praticamente inutilizzabile. Ho provato a chiedere notizie in merito ad un eventuale aggiornamenti firmware per il Genio ma non ho ricevuto risposta a riguardo.

Inoltre, nota a margine, ho notato che alcune delle mie usb stick non funzionavano correttamente con il Genio: quest'ultimo non le riconosce come dispositivi su cui sia possibile copiare i MIDI dalla memoria interna nè dai quali riprodurre eventuali dati MIDI.

<?php h("using a MIDI cable");?>

A questo punto, l'ultima spiaggia consisteva nell'impiego di un cavo MIDI per connettere il Genio al PC. Il cavo MIDI teoricamente, non è soggetto a degradazioni eccessive del segnale su lunghe distanze, a differenza del cavo USB.

Per attuare questa strategia occorreva disporre, sia sul sistema Genio che sul mio PC, di una interfaccia fisica DIN a 5 pin. E' stata questa l'occasione per me, frugando in alcune delle scatole tecnologiche che ho in giro per casa, di riesumare una vecchia interfaccia M-Audio Midi sport 1x1. Non ricordo come ne sono entrato in possesso, fatto sta che non sono mai riuscito ad utilizzarla: quando la comprai non ero riuscito a trovare i driver per il sistema operativo Ubuntu Studio e quindi è rimasta stivata in una scatola per lungo tempo.

A distanza di anni, in occasione di questi esperimenti, con mia somma sorpresa, ho trovato su Muon un installer che facesse al caso e in men che non si dica la vecchia Midisport ha ripreso magicamente vita: ero finalmente in grado di inviare e ricevere segnali MIDI dal mio PC tramite connettore standard DIN 5 pin!

Lato PC quindi tutto sembrava risolto, restava il problema del Genio. Leggendo il manuale<?php footnote("GENIO premium alpha user manual", "http://www.queens-piano.it/wp-content/uploads/2021/04/GENIO-Premium-manual.pdf");?> incappo in questa illustrazione:

<?php img("images/GENIO-rear.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

Provo subito a connettere il MIDISPORT 1x1 alla porta MIDI ext del Genio (nell'immagine numerata come 6) ma mi accorgo che, dalla attività dei LED a bordo del MIDI sport, nessun segnale MIDI viene inviato dal Genio verso la porta di uscita MIDI out del MIDISPort. Scrivo una seconda mail al supporto ufficiale della usrlab interrogandoli sulla questione e l'assistenza mi spiega che la porta MIDI ext del GENIO è pensata per interfacciarsi esclusivamente con un dispotivio i/O MIDI proprietario e, quindi, non è compatibile con altri tipi di interfacce.

Dopo alcune altre mail che mi portano a contattare dapprima l'importatore ufficiale dei sistemi Genio in Italia e poi di nuovo il mio accordatore, riesco infine ad entrare in possesso del fantomatico sistema di espazione MIDI proprietario Genio: niente di più che una piccola scatoletta in plastica equipaggiata con tre connettori DIN 5 pin e un cavetto USB-A.

<?php img("images/MIDI_external_io.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

L'acquisto di un cavo MIDI sufficientemente lungo (10 metri nel mio caso) mi ha infine permesso di chiudere il cerchio e di collegare con successo il pianoforte al PC. Dopo i primi test sembra che questa ultima strada si stia rivelando vincente.

Ecco di seguito uno schema delle connessioni

[IMG]

lo terrò monitorato per capire se questo setup presenterà in futuro qualche tipo di malfunzionamento!
