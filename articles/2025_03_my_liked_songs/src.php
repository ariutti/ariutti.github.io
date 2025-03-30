<?php genheader("My Loved Song exploration toolkit", "March 23, 2025");?>

<p>On why I've created the toolkit, and on how I'm currently sad.</p>

<?php h("Introduction");?>

<p>Some time ago I encountered an interesting challenge for the first time: putting together a playlist of songs to play during a DJ set with some friends.</p>

<p>There are many songs I like, and when I listen to them, I can easily identify the right one to set the mood I have in mind for a particular moment.</p>

<p>However, I’m not the kind of person who can instantly recall the title, artist, or album of a specific track when prompted. I struggle to remember melodies unless I actively reconstruct the context, and I find it difficult to make connections between a musical motif - perhaps just briefly hinted at - and another melody I might have heard in the past.</p>

<p>Lacking these intuitive skills, I decided to create a tool to help me with the task.</p>

<p>I particularly liked the idea of visualizing all my favorite songs in a spatial format, arranging them in an organized way on a two-dimensional plane, making it easier to explore and navigate them in new ways.</p>

<?php h("The toolkit");?>

<p>It was from these thoughts that the "<b>My Loved Song Exploration Toolkit</b>" was born.</p>

<p>The toolkit, which can be seen in action <a href="https://ariutti.github.io/spotify_myLikedSongs_viz/">here</a> and is also available as open-source code on GitHub<?php footnote("My Loved Song Exploration Toolkit Github repo", "https://github.com/ariutti/spotify_myLikedSongs_viz");?> displays a kind of "<i>Clustered Force Layout graph</i>" within a two-dimensional chart, featuring circular entities of different sizes and colors.</p>

<div style="text-align: center;">
<?php img("images/viz.png", 80, "margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>Each circle corresponds to a song I have liked on Spotify. Its position in the two-dimensional space is determined by the song's <i>tempo</i> (X-axis) and <i>danceability</i> parameter (Y-axis), while its size and color are mapped to the <i>energy</i> and <i>valence</i> parameters, respectively.</p>

<p>Specifically, by outlining the meaning of each parameter below, we can see that, at least according to Spotify's definition<?php footnote("Spotify reference: audio features", "https://developer.spotify.com/documentation/web-api/reference/get-audio-features");?>:</p>

<p><b>tempo</b>: The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.</p>

<p><b>danceability</b>: Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.</p>

<p><b>energy</b>: Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy. For example, death metal has high energy, while a Bach prelude scores low on the scale. Perceptual features contributing to this attribute include dynamic range, perceived loudness, timbre, onset rate, and general entropy.</p>

<p><b>valence</b>: A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track. Tracks with high valence sound more positive (e.g. happy, cheerful, euphoric), while tracks with low valence sound more negative (e.g. sad, depressed, angry).</p>

<p>These four parameters are just some of the indices used in the field of <b>music information retrieval</b><?php footnote("Music Information Retrieval (MIR) wiki page", "https://en.wikipedia.org/wiki/Music_information_retrieval");?> Other parameters that would have been interesting to analyze in future versions of the toolkit (unfortunately no longer possible, see below) and that were available through Spotify’s API included <i>loudness</i>, <i>key</i>, <i>mode</i>, and <i>time_signature</i>, as well as <i>speechiness</i>, <i>acousticness</i>, and <i>liveness</i>.</p>

<?php h("Filter section");?>

<p>From the <b>filters</b> section of the toolkit, you can refine your search by focusing only on tracks that fall within the defined characteristic ranges.</p>

<div style="text-align: center;">
<?php img("images/filters.png", 80,"margin-top: 1ch; margin-bottom: 2ch;");?>
</div>

<p>Alternatively, using the search field, you can find all tracks that belong to a specific artist, a particular album, or share the same word in the title!</p>

<p>In my opinion, the search field is essential for answering that classic question: "<i>What was the name of that track by artist XY? I'm sure I had saved it among my favorites...</i>"</p>

<?php h("playlist creation");?>

<p>By hovering the mouse over each circle, you can listen to a preview of the track (made available via the Spotify API). Finally, by clicking, you can "select" the given track.</p>

<p>The selected track will appear at the bottom of the site as a row in the table labeled "<i>Selected Songs</i>". Here, you can collect a subset of songs to later export in JSON format for future post-processing.</p>

<?php h("Deprecated");?>

<p>Unfortunately, I've just realized that the tool will never be updated again, nor will the display of my liked songs be able to include the new tracks that, over the past two years, I've added to my liked song Spotify playlist.</p>

<p>This is due to Spotify's decision<?php footnote("Spotify Audio features deprecation", "https://developer.spotify.com/blog/2024-11-27-changes-to-the-web-api ");?><?php footnote("Spotify Audio features deprecation - discussion", "https://github.com/spotipy-dev/spotipy/issues/1172");?> to discontinue certain APIs on which the tool relied.</p>

<p>This makes me a little sad because I would have been curious to continue with this personal experiment, perhaps even using it in the future to build new playlists for other DJ sets.</p>

<p>However, I'm glad to preserve a sort of "snapshot" of my favorite songs as they were during my last push.</p>

<?php h("Further elements to explore on the topic");?>

<p>A non-exhaustive list of things I would like to explore regarding the topic of Music Information Retrieval:</p>

<ul>
<li><a href="https://librosa.org/doc/latest/index.html">librosa</a> - a python package for music and audio analysis. It provides the building blocks necessary to create music information retrieval systems.</li>
<li><a href="https://essentia.upf.edu/">essentia</a> - Open-source library and tools for audio and music analysis, description and synthesis by PompeuFabra university <3</li>
<li><a href="https://www.flucoma.org/">FluCoMa</a> - Fluid Corpus Manipulation project</li>
</ul>
