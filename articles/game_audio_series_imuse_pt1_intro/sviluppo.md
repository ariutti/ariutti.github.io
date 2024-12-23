# GAME AUDIO: iMUSE pt1 - intro

Questo post si propone di essere il primo di una serie dedicata ad un personalissimo percorso di ricerca sulle tecnologie coinvolte nell'audio dei videogiochi degli anni '90, in particolar modo i videogiochi di avventura della LucasArts.

Mi piacerebbe condividere qui quanto sto apprendendo del funzionamento del sistema iMuse e sulle altre tecnologie coinvolte come il MIDI - su cui iMuse si basa preponderantemente - sul sintetizzatore MT-32 della Roland, sul chip Yamaha YM-3812 - impiegato a bordo delle famose schede sonore AdLib e SoundBlaster - e tutto quello che si muove al contorno.

La mia ricerca non ha la pretesa di essere per nulla esaustiva sull'argomento nè mi prefiggo alcun obiettivo se non quello di divertirmi nel processo d'imparare nuove cose sia sulla tecnologia che sui videogiochi stessi che tanto mi hanno accompagnato quando ero bambino.

## Che cosa è iMUSE

iMuse - acronimo per Interactive Music Streaming Engine - è stato un sistema software proprietario per la riproduzione della colonna sonora dei videogiochi di avventura (e non solo) prodotti da LucasArts a partire dai primi anni '90.

Un motore audio in grado di restituire in tempo reale al giocatore una colonna sonora dinamica, responsiva agli eventi del gioco senza soluzione di continuità. iMuse è stato per l'epoca un progetto innovativo e unico nel suo genere. Lo si trova citato in qualunque libro tratti l'argomento dell'audio nel contesto videoludico ("Game Sound", Karen Collins, MIT press [link](https://mitpress.mit.edu/9780262537773/game-sound/), per citarne uno su tutti).

Colui cui va dato merito di questa invenzione è il compositore e sviluppatore Micheal Land. All'epoca Land era da poco entrato a fare parte del team della Lucas e aveva preso parte alla stesura della colonna sonora di "The Secret of Monkey Island".

Poco dopo l'uscita del gioco, sul finire del 1990, Land aveva cominciato ad immaginare un nuovo motore audio, più potente e versatile che potesse essere maggiormente rispettoso delle esigenze artistiche dell'intrattenimento videoludico. A titolo d'esempio, basti pensare che, fino a quel momento, le transizioni tra un mood musicale ed un altro, anche nei videogiochi di grande livello, erano conseguite in modo brusco col risultato di rompere l'illusione e dissolvere così la sospensione della incredulità. La cosa, per Land, era diventata ormai intollerabile.

Land e Peter McConnel, amico e collega di Land, anch'egli entrato nel frattempo nel team LucasArts, cominciarono assieme ad implementare il nuovo sistema. Il lavoro non fu facile: in parte a causa dell'ambiziosità del progetto ma pure perchè l'idea era quella di integrarlo all'interno di un nuovo gioco, "Monkey Island 2: Le chuck's revenge", al tempo in lavorazione e che sarebbe uscito di lì a breve.

Nel dicembre del 1991 esce infatti "Monkey Island 2" e il sistema iMuse debutta così nel mondo videoludico.


## BOX - Un paio di esempi

L'esempio in assoluto più citato, che serve per dare una prima idea di quali siano le capacità del nuovo motore audio è l'accompagnamento musicale che si può ascoltare nella parte introduttiva di Monkey 2, quando il protagonista del gioco Guybrush Trephood passeggia nel porto-città di Woodtick.

Abbiamo un tema musicale principale il cui arrangiamento cambia costantemente ogni volta che il guybrush entra in una nuova ambientazione (room).

Non essendo il videogioco un media lineare tradizionale come potrebbe essere un film, non è possibile conoscere con anticipo quali siano le scelte del giocatore nè tantomeno quando esse avvengano nel tempo. Il compositore non può anticipare questi eventi ma deve piuttosto preparare tutto il materiale necessario al fine di contemplare le diverse possibilità.

Il compositore scrive i vari temi musicali e ne costruisce arrangiamenti diversi per ogni ambientazione. Scrive poi ulteriore materiale di transizione che possa condurre agilmente da un arrangiamento ad un altro e lo fa per tutti quei momenti nel tempo, non prevedibili a priori, nei quali questi cambiamenti si possano verificare all'interno della partita (una mole di lavoro enorme).

La potenza di iMuse sta nella capacità di selezionare e ordinare questo materiale in modo condizionale in funzione degli eventi del gioco.

Si potrebbero spendere ore a camminare nello scenario di Woodtick, entrando e uscendo dalle diverse room, in momenti arbitrari, senza che la colonna sonora si interrompa mai: il tema principale suona di continuo e ogni volta si arricchisce con elementi di arrangiamento nuovi, caratteristici della specifica room, passando attraverso transizioni morbide e ingegnose.

Un'altro esempio che mi sta particolarmente a cuore si trova sempre in Monkey 2, quando Guybrush si trova nella palude per andare a visitare Vodoo Lady.
Guybush è sul limitare della palude, la musica di accompagnamento consiste in una semplice linea melodica che delinea il tema principale di questa room.
Non appena Guybrush sale sulla bara-barca, ecco che il tema si arricchisce di una nuova parte. Mentre guybrush naviga verso destra, questa stratificazione verticale dell'accompagnamento continua, si aggiungono via via nuove parti. Fino al punto che, poco prima che Guybrush possa entrare alla palafitta di Voodoo Lady, è la musica che comanda il gioco: la piattaforma può sollevarsi soltanto in corrispondenza di uno specifio accento musicale che cade su un ben ponderato punto della battuta musicale

## end of Example BOX

Qualche anno dopo, nel 1994, Land e McConnel, spinti da esigenze interne all'azienda, rilasciarono un patent per proteggere intelletualmente la nuova tecnologia appena inventata (faremo riferimento a questo patent frequentemente in seguito).

[Patent](https://image-ppubs.uspto.gov/dirsearch-public/print/downloadPdf/5315057)

Da lì in poi il sistema iMuse venne ampliato, migliorato e impiegato nei successivi videogiochi targati LucasArts.

Per chi desidera conoscere di più sul sistema iMuse e in generale sulla persona di Micheal Land consiglio vivamente la visione di questa magnifica intervista realizzata da Daniel Albu

iframe - (https://youtu.be/uHqAG8CLblA?si=yty1k7vWx1s4NAxS)

## entriamo nel vivo

iMuse, nel contesto dei videogiochi di avventura della LucasArts, lavora fianco a fianco con l'interprete SCUMM [link all'altro articolo] ed è in grado di riprodurre "intelligentmente" porzioni di musica precomposta e archiviata in un database di sound resources (in formato MIDI) appositamente "annotate", per così dire, dai compositori.

Queste annotazioni - espresse sottoforma di messaggi di sistema esclusivo (SysEx) - innestate in punti specifici dei vari MIDI files, vengono esaminate da iMuse e azioni corrispondenti vengono intraprese a seconda dei comportamenti del giocatore o degli eventi che scaturiscono dal gioco stesso generando transizioni morbide e cambiamenti di vario genere nella colonna sonora.

Sappiamo che il MIDI file non è un audio file ma piuttosto una partitura musicale, una lista di istruzioni (performance data) da veicolare verso un qualche tipo di dispositivo in grado di interpretarle e renderizzarle infine in vibrazioni sonore udibili. E' in questo dispositivo, potremmo dire, che risiedono i veri e propri "timbri" che suoneranno le note musicali e interpreteranno la partitura così come concepita dai compositori.

Una prima domanda che potremmo porci dunque è la seguente:

## How sound was actually "rendered" back in the days?

Stiamo parlando degli anni '90 e ci stiamo concentrando sul mondo del personal computer. I videogiocatori che possedevano un personal computer si potevano suddividere principalmente in 3 distinte categorie in funzione dell'hardware a loro disposizione per la riproduzione audio (come racconta Micheal Land nella intervista sopra citata - https://youtu.be/uHqAG8CLblA?si=DSB2fw6FIPR9010y&t=958).

1. I videogiocatori più esigenti possedevano il dispositivo più all'avanguardia al momento disponibile: un sintetizzatore multitimbrico e multicanale basato su MIDI prodotto da Roland, denominato MT-32.

2. La maggiorparte dei videogiocatori però non possedava un Roland MT-32 ma aveva piuttosto optato per equipaggiare il proprio PC con una scheda di espansione sonora decisamente più economica. Poteva trattarsi della scheda AdLib oppure della SoundBlaster. Entrambe le schede montavano un singolo chip sonoro per sintesi FM, il YM3812 della Yamaha (anche chiamato OPL2).

3. Infine i videogiocatori più sfortunati non potevano contare nè sull'uno nè sull'altro sistema. Questo tuttavia non significava che non potessero ascoltare audio dal proprio PC: ogni PC infatti usciva dalla fabbrica con un piccolo speaker integrato il cui unico scopo era quello di notificare l'utente sullo stato di salute del PC stesso con rumorosi e fastidiosi beeep. Seppur monofonica e con l'onda quadra come unico timbro disponibile, era possibile ascoltare una rudimetale colonna sonora del gioco anche tramite questo piccolo PC speaker.

Si può bene immaginare come le tre soluzioni harware presenti al tempo sul mercato fossero ben lungi dall'essere in grado di restituire la medesima esperienza sonora all'ascoltatore. Per non parlare del fatto che le tre tecnologie avevano tutte le proprie ben distinte esigenze ed idiosincrasie in termini di interfacciamento con il software del gioco.

## triplo lavoro

Ai compositori era pertanto richiesto di produrre 3 differenti soluzioni, ciascuna dedicata alla specifica tecnologia, considerandone limiti e punti di forza, sfruttando il più possibile, a seconda della bravura del compositore/sviluppatore, le caratteristiche proprie della specifica tecnologia.

Si cominciava con il confezionare un prodotto sonoro musicale dalla più alta qualità possibile per poi scalarlo via via sugli altri sistemi meno performanti, cercando di mantenere un certo grado di coerenza. Le composizioni erano così dapprima concepite, composte e orchestrate con l'obiettivo che suonassero al meglio sul dispositivo Roland MT-32. Da qui poi si ricavava una prima riduzione contemplando le limitazioni del sistema tecnologico subito a seguire, l'OPL2. Infine, l'ultima e più drastica riduzione era quella per adattare la colonna sonora al PC speaker.

Questo lavoro di composizione e successive riduzioni poteva essere in carico ad un singolo compositore; poteva capire invece, per esempio, che il compositore si dedicasse esclusivamente a realizzare buone "trascrizioni" per OPL2 di composizioni già scritte in precedenza da altri colleghi per il sistema Roland.

Quando ho appreso di questo tipo di workflow, sono rimasto molto colpito: la produzione di una colonna sonora per un videogioco all'epoca era un triplo lavoro.

Mi colpisce ancora di più forse sapere che molto poco di questo lavoro venisse realmente percepito dal videogiocatore. Nella mia esperinza ad esempio, appartenendo alla seconda categoria di videogiocati per così dire, mai ho potuto fruire delle composizioni nella loro versione "originale" per MT-32 nè tantomeno ero consapevole della loro esistenza.

## tutto è MIDI

Un'altra cosa che ho trovato interessante è che qualunque sia tecnologia in esame e la "partitura" ad essa corrisponente, essa venisse comunque sempre espressa in formato MIDI e salvata in quanto tale all'interno delle risorse del gioco.

Ci tengo a sottolineare questo dettaglio perchè studiando quale fosse invece il flusso di lavoro dei contemporanei "id software" emerge un formato di file proprietario chiamato IMF. Parleremo di questo in un articolo dedicato. Per ora ci basti dire che possiamo concentrarci su di un unico formato "standard": il MIDI file.



--------------------------------------------------------------------------------

## Perchè credo sia importante conoscere iMUSE

Ritengo che, per chi come me, appassionato di musica per contesti interattivi, studiare il funzionamento di iMuse possa aggiungere al proprio bagaglio di conoscenze una serie di preziosi insegnamenti, da applicare magari anche in altri contesti.

iMuse è un sistema che vive al margine di diverse discipline, tutte in dialogo tra loro, dalla composizione alla cumputer science al dal sound engineering al sound design.

Ritengo che iMuse sia un magnifico esempio di un approccio orizzontale, olistico, alle cose, quello di Land nello specifico ma di tutti i compositori e sound designer di quel periodo storico e precedenti. All'epoca chi scriveva musica per videogiochi non era soltanto un musicista ma anche un tecnico e sviluppatore software - tra il resto - con una profonda conoscenza dei sistemi tecnolgici al contorno della loro principale mansione.

Micheal Land non è soltanto un compositore di grande sensibilità e bravura (basti avere giocato "the Dig" solo per citare un gioco fra tutti per accorgersene) ma allo stesso tempo è un tecnico preparato e consapevole.

In epoche più recenti, sistemi middleware hanno reso i compositori via via sempre più indipendenti dai dettagli implementativi, ma Land faceva ancora parte delle "vecchia scuola" ed è forse per questo che iMuse è stata - ed è tutt'ora ritengo - così efficacie perchè è stato scritto di primo pugno da un "vero addetto ai lavori".
