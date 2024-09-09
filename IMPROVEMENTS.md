# README

## Matematical formulas

vedi articolo di fabien qui: https://fabiensanglard.net/floating_point_visually_explained/index.html


## HOW to implement synthax highligth in <pre> tags
TODO

## how to show HTML code inside the <pre> tags

Se desideri mostrare del codice HTML all'interno dei tag <pre> senza che il browser lo interpreti come codice HTML effettivo, devi eseguire l'escape dei caratteri speciali. I caratteri principali che richiedono l'escape sono:

    < (minore) → &lt;
    > (maggiore) → &gt;
    & (e commerciale) → &amp;
    " (virgolette doppie) → &quot;
    ' (virgolette singole) → &apos; (non sempre necessario, dipende dal contesto)


## [DONE]waveform visualizer

Take a look at this article by fabien sargland
* https://fabiensanglard.net/sf2_sound_system/index.html

Sembra che Fabien stia usando wavesurfer.js;


A fondo pagina infatti vedo qualcosa di questo tipo

<script src="wavesurfer.js"></script>
<script type="text/javascript">
  var intro_without_sfx = WaveSurfer.create({
    container: '#waveform_without_sfx',
    waveColor: '#aaaaaa',
    progressColor: '#000000',
    cursorColor: '#DD0000',
    barHeight: 2,

  });

  intro_without_sfx.load('nosfx.mp3');

  var intro_with_sfx = WaveSurfer.create({
    container: '#waveform_with_sdx',
    waveColor: '#aaaaaa',
    progressColor: '#000000',
    cursorColor: '#DD0000',
    barHeight: 2,

  });

  intro_with_sfx.load('oksfx.mp3');

  function update(e, wf) {
    if (wf.isPlaying()) {
        wf.pause();
        e.innerText = "Play";
    } else {
        wf.play();
        e.innerText = "Stop";
    }
  }
</script>

mentre all'interno della pagina web, nei punti in cui si voglia collocare la visualizzazione della forma d'onda si ha questo:

<div id="waveform_without_sfx" style="border: 1px black solid; background-color: white;">
    <wave style="display: block; position: relative; user-select: none; height: 128px; overflow: auto hidden;">
        <wave style="position: absolute; z-index: 3; left: 0px; top: 0px; bottom: 0px; overflow: hidden; width: 477px; display: block; box-sizing: border-box; border-right: 1px solid rgb(221, 0, 0); pointer-events: none;">
            <canvas style="position: absolute; left: 0px; top: 0px; bottom: 0px; height: 100%; width: 882px;" width="882" height="128"></canvas>
        </wave>
        <canvas style="position: absolute; z-index: 2; left: 0px; top: 0px; bottom: 0px; height: 100%; pointer-events: none; width: 882px;" width="882" height="128"></canvas>
    </wave>
</div>

e anche

<div id="waveform_with_sdx" style="border: 1px black solid; background-color: white;">
    <wave style="display: block; position: relative; user-select: none; height: 128px; overflow: auto hidden;">
        <wave style="position: absolute; z-index: 3; left: 0px; top: 0px; bottom: 0px; overflow: hidden; width: 0px; display: block; box-sizing: border-box; border-right: 1px solid rgb(221, 0, 0); pointer-events: none;">
            <canvas style="position: absolute; left: 0px; top: 0px; bottom: 0px; height: 100%; width: 882px;" width="882" height="128"></canvas>
        </wave>
        <canvas style="position: absolute; z-index: 2; left: 0px; top: 0px; bottom: 0px; height: 100%; pointer-events: none; width: 882px;" width="882" height="128"></canvas>
    </wave>
</div>




Take inspiration from these links:
* discussion on stack overflow: https://stackoverflow.com/questions/38727741/play-a-moving-waveform-for-wav-audio-file-in-html
* https://wavesurfer.xyz/
