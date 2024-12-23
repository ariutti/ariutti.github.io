# README

## GIT LFS storage for large files (video files)

Install and use Git LFS for video files and large files in general for the website

```
git lfs install
git lfs track "*.psd"
```

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

## SCORE player

Un modo per embeddare uno score player dentro alla pagina web, con tanto di visualizzazione della playhead che si muove sulla partitura. E' possibile farlo con XML?

Alcune dritte che derivano da uno scambio d ivedute con ChatGPT:

  https://www.vexflow.com/



  The idea of embedding a "score following" system into your blog is fantastic and will engage your readers in a dynamic way. Here's a breakdown of your approach:
  1. Score Following System Basics

  A score-following system aligns the playback of a piece of music with its corresponding sheet music in real-time. Users can hear the music while visually following along, offering an interactive experience.
  2. Key Components for Implementation

  You will need:

      Music Display: A way to render the music notation from the music_xml file.
      Audio Playback: To synchronize with the displayed score.
      Score Synchronization: Logic to align the playback (MIDI or audio) with the corresponding parts of the score.

  3. Technologies to Use
  a. IEEE 1599 Standard

      The IEEE 1599 standard is ideal for multimodal music representation and integration. It supports synchronization of various formats, such as symbolic music (e.g., MusicXML), audio files, and metadata.

      It is widely used in musicological studies and music tech projects, including those by LIM at the University of Milan.

      Pros:
          Well-suited for integrating multiple music representations.
          Open standard with academic and industrial backing.

      Cons:
          Might involve a learning curve for standard adoption.
          Libraries and tooling for IEEE 1599 are not as abundant as for other frameworks.

      How to Explore:
          Visit the LIM tech lab's resources or contact the lab for example implementations.
          Use libraries/tools developed for IEEE 1599 (if any are open-source or available for use).

  b. Libraries to Consider

      VexFlow
          A powerful JavaScript library to render sheet music in the browser.
          Supports MusicXML parsing (with additional libraries).

      How to use:
          Load your MusicXML and convert it to VexFlow renderable notation.

      MIDI.js
          A library to play MIDI files directly in the browser.
          Provides control over playback timing for synchronization.

      soundfont-player
          A modern library to render and play MIDI files using SoundFonts.
          Can complement VexFlow for playback.

      ABC.js
          Another notation rendering library, but it focuses on ABC notation.
          Might need conversion from MusicXML to ABC notation if preferred.

      wavesurfer.js
          You mentioned familiarity with it. While wavesurfer.js excels in waveform visualization, for score-following purposes, MIDI or symbolic representations might be a better fit.

  4. Synchronization Strategies

      Event-based Synchronization:
          Divide the score into measure-by-measure or note-by-note events.
          Use timestamps or MIDI event triggers for precise playback alignment.
      Real-time Animation:
          Use JavaScript to update the visible score region based on playback progress.

  5. Development Workflow

      Parse MusicXML:
          Convert MusicXML to a format compatible with your rendering library (e.g., VexFlow).

      Render the Score:
          Use VexFlow or another notation library to display the score.

      Audio Playback:
          Choose MIDI playback for precise timing control or audio playback for more natural sound.

      Implement Synchronization:
          Use a timing loop or MIDI events to align score updates with playback progress.

  6. IEEE 1599-Specific Development

  If you want to adopt IEEE 1599:

      Use tools to encode your MusicXML and audio into an IEEE 1599-compliant file.
      Check for libraries like IEEE 1599-Editor or any open-source tools.
      Implement JavaScript-based rendering if IEEE 1599 libraries are unavailable.

  Example Framework

      Music Rendering: Use VexFlow.
      Playback: Use MIDI.js or soundfont-player.
      Synchronization: Write custom JavaScript to align rendered measures or notes with playback timestamps.

  Would you like help setting up a small prototype? Let me know, and I can provide code snippets or further refine this approach.



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
