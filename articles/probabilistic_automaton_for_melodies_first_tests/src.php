<?php genheader("Probabilistic automaton for creating melodies (first tests)", "October 17, 2024");?>

<p>On the early experiments in building a probabilistic machine for the automatic generation of melodies.</p>

<?php h("Hollos brothers");?>

<p>Some time ago, by chance, I came across the small publishing house <a href="https://abrazol.com/">Abrazol Publishing</a>, which seems to exclusively publish books written by the brothers <a href="https://www.exstrom.com/stefan/stefan.html">Stefan</a> and <a href="https://www.exstrom.com/richard/richard.html">J. Richard</a> Hollos (maybe because they own it?).</p>

<?php img("images/cover_creating_rhythms.png", 20, "float:left; margin-bottom: 2ch; margin-right: 2ch; margin-left:1ch;");?>
<?php img("images/cover_creating_melodies.png", 20, "float:left; margin-bottom: 2ch; margin-right: 2ch; margin-left:1ch;");?>

<p>The two brothers, both graduates in Electrical Engineering and Physics, are passionate about mathematics, statistics, probability, electronics, and art, and together they write about these subjects in their books.</p>

<p>Their books are fascinating and intriguing, starting with their cover design. Written in a simple and accessible language, they are full of interesting insights and reflect the authors' passion for these fields.</p>

<p>I read two of their books, the ones that seemed to best combine the engineering, logical-mathematical aspect with the artistic expression of music.</p>
<p>These are "<a href="https://abrazol.com/books/rhythm1/">Creating Rhythms</a>" and "<a href="https://abrazol.com/books/melody1/">Creating Melodies</a>", both highly recommended.</p>

<?php h("Olson");?>

<p>In particular, there is a chapter in the book "<i>Creating Melodies</i>" where the Hollos brothers describe a probabilistic automaton capable of generating convincing melodies based on prepared material on which the machine is trained.</p>

<?php img("images/cover_music-physics-and-engineering.jpg", 20, "float:right; margin-bottom: 2ch; margin-right: 1ch; margin-left:2ch;");?>

<p>The example that Stefan and Richard describe is based on the work of another author, Harry F. Olson, who in 1952 published a book titled "<i>Musical Engineering</i>" (known from 1962 onwards as "<i>Music, Physics and Engineering</i>").</p>

<p>In this book, Olson develops this automaton and applies it to various levels of increasing complexity (<i>orders</i>) to produce a melody that progressively stylistically resembles the input sound material (<i>dataset</i>) provided.</p>

<p>All of this piqued my curiosity, and I decided to try implementing this automaton myself using Python.</p>

<div style="clear:both;"></div>


<?php h("What a melody is");?>

<p>First of all, what is a melody<?php footnote("Melody definition by WikiPedia", "https://en.wikipedia.org/wiki/Melody");?>?</p>

<p>It is a musical phrase, a "<i>gesture</i>" composed of a finite sequence of sounds at different pitches (<i>notes</i>) and silences (<i>rests</i>). Each note follows and precedes other notes, thus forming a distinctive and recognizable "<i>contour</i>" from a horizontal perspective.</p>

<p>Each note also has a precise duration, and together these durations define the rhythm of the melody. Furthermore some notes fall on the strong beats of the measure, while others occur on the weaker beats, suggesting a more or less pronounced sense of tonality within which the melody exists and moves.</p>

<p>To add a few more elements, it should be noted that, much like spoken language, every part of a musical phrase has its own dynamics, the volume and expression of each note evolve organically with the development of the phrase.</p>

<p>In short, there are many elements to consider when procedurally creating a melody, but by starting as simply as possible, we can overlook everything except the notes with their pitches and the rests.</p>

<?php h("Dataset preparation");?>

<p>To test the effectiveness of the code, I decided to use a simple and well-known melody: "<i>Old McDonald</i>" (is that the actual name?):</p>

<div style="text-align: center;">
<?php img("images/old_mc_donald_score.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/old_mc_donald.ogg" type="audio/ogg"> </audio>
</div>

<p>I wrote the melody using Reaper, my favorite DAW, making sure to quantize each note properly and then exporting it in MIDI format, intending to parse it later in Python using the <a href="https://www.music21.org/music21docs/">music21</a> library.</p>

<p>If our algorithm is well designed, I expect the output melody to show more or less significant similarities to the original.</p>

<?php h("First order automaton");?>

<p>A first analysis we can perform on the given melody is to count how often each note appears. Here’s a heatmap showing the frequency of the notes within our starting melody:</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_1_order_heatmap.png", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>Starting from this initial statistical analysis, we can create the simplest automaton: a <i>first-order</i> automaton. It generates new notes based on the frequency with which they appear in the original melody.</p>

<p>In other words, the first-order automaton randomly selects notes from those present in the original melody. Notes that appeared more frequently in the original melody will have a higher probability of being chosen.</p>

<p>Here’s what a minute of audio output from a first-order automaton trained on our melody sounds like:</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/1st_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>So far, so good. The algorithm works, but with such a simple automaton, the result still sounds musically quite rudimentary. Let’s try to make things a bit more complex and ask ourselves a few more questions.</p>

<p>After all, a melody is not just a random sequence of notes. Each note follows another based on the composer’s artistic intention. The composer is like an architect, arranging the notes according to a certain design to express or convey something. How can we account for that?</p>

<?php h("Second order automaton");?>

<p>For example, we can build a new automaton capable of selecting the next note based on the previously selected one. This is the <i>second-order</i> automaton, which analyzes the dataset by extracting information about two-note sequences.</p>

<p>Here is a heatmap representing a second-order statistic of our starting melody:</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_2_order_heatmap.png", 60, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>For fun, we could also represent these relationships with a connected graph, where each note is represented by a <i>node</i>, and each connection (<i>edge</i>) represents the relationship between two notes. Each edge is drawn with varying thickness depending on the probability of transition from one note to another.</p>

<p>This type of representation can help us better visualize the different decision pathways the algorithm may take when generating a new note.</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_dotgraph.png", 40, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>But the real question is: how does a second-order automaton sound? Can we hear differences compared to the previous automaton? How significant are these changes?</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/2nd_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>You may notice that as the automaton's order increases, the notes follow one another in a different way, and the profile of this new output melody more closely resembles the original musical material.</p>

<?php h("Higher order automatons");?>

<p>We could take this reasoning even further by analyzing sequences of 3 notes, thus creating a third-order automaton. This automaton can generate a new note based on the two notes previously played.</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_3_order_heatmap.png", 40, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/3rd_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>Similarly for the fourth order:</p>

<div style="text-align: center;">
<?php img("images/graphs_no_duration/old_mc_donald_4_order_heatmap.png", 40, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/4th_no_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>and so on...</p>

<?php h("First considerations");?>

<p>These initial results are interesting in my opinion because they show how, based on statistics and probability, machines can autonomously generate new melodies that still resemble the material provided as the initial dataset.</p>
<p>I can imagine using them in a multimedia installation context where it’s necessary to produce new, always different, but consistent music within a given style. Music that can be continuously and automatically generated (making music by means of designing systems that make music stands at the base of the generative music<?php footnote("wonderful introduction on generative music by Tero Parviainen", "https://teropa.info/loop/#/title");?> concept).</p>

<p>From these early experiments, I’ve noticed that dataset preparation is a crucial phase. For the machine to be reliable and produce results that are both consistent and varied, the dataset must be large and comprehensive. It should contain as many possible note combinations as well as rhythmic and melodic patterns that repeat themselves, allowing the automaton to choose among different possible paths.</p>

<p>I imagine one could, for example, record a long performance and convert it into a MIDI file. By using this MIDI file as the dataset, the automaton would, in a sense, become an alter ego, able to propose new melodies that reflect our own taste and playing style :)</p>

<p>As we mentioned before, we have not yet considered other fundamental aspects of melody generation, such as rhythm or dynamics. What results could we obtain if we did?</p>
<p>What would happen if, for example, our automaton also considered the duration of each note in its statistical analysis of the input score?</p>

<?php h("Adding time | rhythm");?>

<p>If we change the code of our algorithm and add a feature to analyze the duration of each note in addition to its pitch, the first-order heatmap becomes more detailed than the one we encountered earlier. In the melody, notes that share the same pitch now become distinct entities because they have different durations.</p>

<div style="text-align: center;">
<?php img("images/graphs_w_duration/old_mc_donald_1_order_heatmap.png", 80, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>Even though this is a first-order automaton, upon first listening, it becomes clear that the output better reflects the melodic idea of the dataset, respecting not only the pitches but also the durations.</p>

<div style="text-align: center;">
<audio controls="" style="width:80%; margin-bottom: 2ch;"> <source src="sounds/1st_w_duration.ogg" type="audio/ogg"> </audio>
</div>

<p>As we increase the automaton’s order, the corresponding sound result becomes increasingly similar to the original material.<p>

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

<p>You can hear that, as we increase the automaton’s order, the sound result changes. However, the higher the order, the more the variety of possible outputs decreases, and randomness begins to fade away: the resulting melody, especially at higher orders, becomes almost identical to the one provided as input.</p>

<p>While this demonstrates the effectiveness of the algorithm, it also raises questions about this machine's true capability to be versatile enough to generate "new" music that captivates the listener. The risk of generating excessive repetitiveness and monotony is evident.</p>

<p>I also believe that the main reason why higher-order automatons seem less effective is essentially due to the dataset size.</p>

<p>Looking closely, the melody I chose for these early tests is very simple and extremely short.</p>

<p>I can't wait to continue these experiments by subjecting the algorithm to a larger and more varied dataset.</p>

<?php h("The code");?>

<p>You can find the code I wrote on <a href="https://github.com/ariutti/probabilistic_automaton_for_melody_generation">this GitHub repository</a>.</p>

<p>The code is essentially capable of parsing a MIDI file and performing a series of statistical analyses (via the music21 module) to build as many state machines as desired.</p>

<p>The descriptions of the state machines generated in this way are saved in <code>yaml</code> format so that they can easily be interpreted by SuperCollider for the sound generation of the output melody (in the repository, along with the main Python code, you will also find the corresponding SuperCollider code).</p>

<p>In addition, the code can render graphs and images, such as the various heatmaps and the connected graph (via matplotlib and graphviz).</p>

<div style="text-align: center;">
<?php img("images/algorhythm_diagram.svg", 80, "margin-top: 2ch; margin-bottom: 2ch;");?>
</div>

<p>That’s all for now. See you in the next experiment!</p>
