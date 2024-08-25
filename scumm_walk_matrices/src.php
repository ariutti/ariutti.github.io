<?php  genheader("SCUMM walk matrices", "July 19, 2017"); ?>

What are boxes? Everything started when I tried to understand the walking algorithm in SCUMM<br><br>

On every player click, the SCUMM engine identifies a path and the actor starts to move following it, bypassing obstacles along the road and eventually arriving to its destination without any problem. How is all this possible?<br><br>

Computer science literature<?php footnote("Millington, I., & Funge J. (2009). 'Artificial Intelligence for Games' (2nd ed.). Morgan Kaufmann", "https://www.sciencedirect.com/book/9780123747310/artificial-intelligence-for-games");?><?php footnote("'Artificial Intelligence for Games' book companion code reposiotry", "https://github.com/idmillington/aicore");?> handle the topic broadly, highlighting different types of algorithms used to solve these kind of problems which are called <i>pathfinding</i> problems. The best known of these algorithms is the <b>A*</b>, a natural evolution of the simpler <b>Dijkstra</b>'s one, often used to solve <i>tactical decision making</i> problems rather that <i>pathfinding</i> problems.<br><br>

<div>
<!--<img alt="Edsger Dijkstra" src="{{site.baseurl}}/assets/images/scumm/Dijkstra.jpg" style="float: right; padding:20px;"/>-->
<?php img("images/Dijkstra.jpg", 21, "float:right;margin-bottom: 2ch; margin-left: 2ch; margin-right:1ch;");?>
<p>The Dijkstra algorithm is named after its discoverer, the mathematician Edsger Dijkstra and, despite the algorithm was originally designed to solve the <em>shortest path</em> problem (a particular problem in mathematical graph theory), it was later used in videogames.</p>
<p>Dijkstra is also famous for his 1968 well-known article "<em>GOTO statement considered harmful</em>"<?php footnote("Go-to statement considered harmful", "https://www.cs.utexas.edu/users/EWD/ewd02xx/EWD215.PDF");?> where he fought against the so called <a href="https://en.wikipedia.org/wiki/Spaghetti_code">spaghetti code</a>, low quality programs which were difficult to read or modify because of the extreme use of <em>GOTO</em> statement.</p>
</div>


The <i>A*</i> algorithm is quite complex and it is very useful in situation where the AI engine is frequently asked to find the best way throw a series of point in space always changing dynamically. However SCUMM does not use it for its internal pathfinding mechanism; the <i>A*</i> algorithm is too much sophisitcated, especially considering that the "<i>walkable area</i>" inside a SCUMM room stays pretty the same throughout the game, in addition to that I think probably the <i>A*</i> would have been too CPU hungry for old computers.<br><br>

SCUMM instead uses a relatively simple system which is pretty elegant in my opinion!

<?php h("Fingolfin docet");?>

In order to better understand what we are talking about, let's examine a post by <b>Max "Fingolfin" Horn</b> (an ex-member of the ScummVM development team by now) where he talks about SCUMM pathfinding on the ScummVM forum<?php footnote("ScummVM Forum pathfinding topic", "http://forums.scummvm.org/viewtopic.php?t=4532"); ?>:<br><br>

<blockquote>
ScummVM doesn't using anything complicated like A* at all!<br/><br/>
Rather, the game screen is divided into so-called "<i>boxes</i>" (which in the later SCUMM versions could essentially be almost arbitrary non-overlapping quadrangles).<br/><br/>
Normally, an "<i>actor</i>" (like e.g. Guybrush in Monkey Island) is confined to movement within those boxes. So at any time, an actor has a "<i>current box</i>" attribute assigned to it. Let's assume the actor is in box 1.<br/><br/>
When the user clicks somewhere, the engine first determines which box the click was in. If it's the same as the actor to be moved is in anyway, it can just be walked there. That's easy. Now assume the click was in a different box, e.g. box 5. Then the engine first determines how to get to that box.<br/><br/>
For this, it looks in the "<i>box matrix</i>", which is essentially a precomputed n*n matrix, where n is the total number of boxes in the room. For each pair (i,j) of boxes, it contains a value k which says: "If you are in box i and want to get to get to box j, first go to box k". Note that "k" could equal j if box i and j are adjacent.<br/><br/>
Now, equipped with this value, the engine will first compute a path for the actor to walk from its current position to the new box k. This depends on how the boxes i and k "touch".<br/><br/>
Anyway, so the actor walks a bit and reaches box k. If this was the same as the box of our final destination, then we just walk to the final destination, and are done. If not, we rince and repeat: Look up the entry (k,j) in the box matrix to find the next box; walk to that; etc...
</blockquote>

Fingolfin essentially says that the walkable area of a room is subdivided into a series of quadrilateral non-overlapping areas called <b>boxes</b>.<br><br>

<b>Actor</b> movements (as those of Indy in "<i>Indiana Jones and the Fate of Atlantis</i>") are bordered inside those boxes and actor has also an attribute to keep track of what is the box he is currently in.<br><br>

When the player clicks on a point on the screen, the engine acts differnetly according on where this point is in relation with the boxes:

<ol>
<li>if the point is inside the same box where the actor is, then the actor simply starts to move toward the point;</li>
<li>if the point is inside a different box instead, the engine computes a path in order for the actor to leave his current box and move towards the destination one. This same kind of computation happens when the point is outside all of the boxes, in which case the engine must find the nearest box to the player click first.</li>
</ol><br>

If <i>current box</i> and <i>destination box</i> are different, the engine will refer to the <b>box matrix</b> (also called <b>walk matrix</b>) to find the <i>next box</i> the actor has to walk trough in order to reach the destination. The <i>walk matrix</i> is essentially a precomputed matrix made of <code>n x n</code> elements, where <code>n</code> is the total number of boxes inside the room.<br><br>

For each pair of boxes, <code>i</code> and <code>j</code>, the matrix contains a value <code>k</code> which means "<i>If you are in box <b>i</b> now and you want to reach box <b>j</b>, you mast go to box <b>k</b> first!</i>"<br><br>

When the actor arrives in box <code>k</code> and this box doesn't correspond to the desired final destination, this process will repeat. On the other hand, when <code>k == j</code> (i.e. boxes <code>i</code> and <code>j</code> are adjacent), the actor is arrived and no more calculation are needed.

<?php h("in practice...");?>

Let's do a practical example: we can use ScummVM and its debugger to make some tests.<br>
Let's load a savegame from "<i>Indiana Jone and the Fate of Atlantis</i>":

<?php img("images/tikal.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>


Here we are in <i>Tikal</i>, inside the Maya temple! So let's call the ScummVM debugger with the <code>CTRL</code> + <code>D</code> keys combination.

The ScummVM debugger offers 2 different commands in order to show and examine the information we talked about. Here they are:
<ul>
  <li>the <code>box</code>command;</li>
  <li>the <code>matrix</code> command;</li>
</ul>

<!-- TODO: video -->

Let's examine them in depth.

<div class="note">
Pay attention, this is a SCUMM version 5 game and these information may be different for different games.<br/><br/>In addition to that I should mention that these data (walk matrix in particular) can change during the game so, if are using this commands yourself you could get different results.
</div>

<?php h("Box command");?>

The <code>box</code> command shows a schematic report about the current room boxes, let's try to insert it at the debugger prompt and see what happens:

<?php img("images/console-01.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

The 12 rows of text output, one for each of the boxes, show information about their geometry and more. Let's put aside for the moment the row/box number <code>0</code> (it is used as a sort of walk-matrix header and doesn't contain useful information really), and take a look at the other rows; here we see numerical values corresponding to<br/><br/>

<table>
<tr>
<td>Upper Left Coords</td><td>Lower Left Coords</td><td>Upper Right Coords</td><td>Lower Right Coords</td><td>Mask</td><td>Flags</td><td>Scale</td>
</tr>
</table>

<br/><br/>
Let's omit the last three values for now, they represent <code>mask</code>, <code>flags</code> and <code>scale</code> values we will cover in details in future posts. Now let's concentrate to the first 4 pairs of coordinates.

<?php img("images/box-new.png", 50, "float:right; margin-top: 2ch; margin-bottom: 2ch;");?>

Each of these pair represents one of the 4 box vertices, expressed in <i>pixels</i>. In order we have the upper left vertex first and then the lower left one and so on with the upper and lower right vertices.

Tracing vertices and lines on the room background image we obtain a visual representation of the walkable area, very useful for our study.

<?php img("images/tikal-boxes-02.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

From the image we note indeed an interesting fact: some of these boxes may show up differently than a quadrilateral and solve as a simple segment as it happens for box 7, 8, and 9!

<?php h("Matrix command");?>

Now let's try the <code>matrix</code> command instead an see what the debugger shows up:

<?php img("images/console-02.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

These values are quite criptical to interpret but fortunately the ScummVM wiki<?php footnote("ScummVM, SCUMM technical reference for Box", "http://wiki.scummvm.org/index.php/SCUMM/Technical_Reference/Box_resources");?><?php footnote("ScummVM, SCUMM technical reference for Matrix", "http://wiki.scummvm.org/index.php/SCUMM/Technical_Reference/Box_resources#BOXM");?> comes in handy. From here we read that the matrix has a line for each box, and for each one it lists a triad of values for each adjacent box to the one we are considering.<br><br>

The first two values of the triad define a range (<code>start</code> and <code>end</code> values) of boxes which, in order to be reached, they force the actor to visit another box, which is the one represented by the third value.<br><br>

As an example lets examine row number <code>4</code>: the first triad is represented like this <code>[1-3=>2]</code> which means that if the actor current box is 4 and he is asked to go to box 1 through 3, he must first visit the second box. Now the second triad <code>[4-4=>4]</code> is easier to understand, if we already are on box 4 and the player click is still on this box, we should remain here!<br><br>

The same kind of thinking can be used for all the boxes in the room eventually creating something like the table below (which i think is easier to read than the debugger output!)<br><br>

<table class="walk-matrix">
    <tr>
        <th class="gray1"> </th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
    </tr>
    <tr>
        <th>1</th>
        <td class="gray1">1</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray2">//</td>
        <td>10</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>2</th>
        <td>1</td>
        <td class="gray1">2</td>
        <td>3</td>
        <td>4</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td class="gray2">//</td>
        <td>10</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>3</th>
        <td>2</td>
        <td>2</td>
        <td class="gray1">3</td>
        <td>2</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>7</td>
        <td class="gray2">//</td>
        <td>2</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>4</th>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray1">4</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray2">//</td>
        <td>2</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>5</th>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td class="gray1">5</td>
        <td>6</td>
        <td>3</td>
        <td>3</td>
        <td class="gray2">//</td>
        <td>3</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>6</th>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>5</td>
        <td class="gray1">6</td>
        <td>7</td>
        <td>7</td>
        <td class="gray2">//</td>
        <td>3</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>7</th>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>3</td>
        <td>6</td>
        <td class="gray1">7</td>
        <td>8</td>
        <td class="gray2">//</td>
        <td>3</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>8</th>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td>7</td>
        <td class="gray1">8</td>
        <td class="gray2">//</td>
        <td>7</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>9</th>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray1">9</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>10</th>
        <td>1</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td class="gray2">//</td>
        <td class="gray1">10</td>
        <td class="gray2">//</td>
    </tr>
    <tr>
        <th>11</th>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray2">//</td>
        <td class="gray1">11</td>
    </tr>
</table>

<?php h("Practicals");?>

Let's pretend we are the SCUMM engine and let's try to solve some SCUMM "<i>real</i>" pathfinding problem!<br><br>
Here's again the image showing the walkable area:

<?php img("images/tikal-boxes-02.png", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>

Now suppose Indy is on box 1 and the player clicks on a point which is inside the 4th box. We the engine must refer to the walk matrix a see what we get from here. We get 2, the number which is on the crossing between the first row and the fourth column.<br><br>

Great! This is perfectly reasonable, especially looking at the picture, from the moment that box 1 and 2 are adjacent and that if we move to box 2 we are closer to our destination.<br><br>

So Indy now is walking to box 2 and, once he arrives here, because box 2 is not the original destination we wanted, we must consult the walk matrix again. Now we look at the crossing of row 2 and column 4 and we read 4!<br><br>

So one last stroll will suffice for Indy to reach his final destination on box 4!<br><br>

So try youself, imagine the user is clicking near box 6, are you able to find the route using the walk matrix?

<?php h("Other references");?>

<ul>
  <li><a href="https://en.wikipedia.org/wiki/Spaghetti_code">Spaghetti Code</a> and <a href="https://en.wikipedia.org/wiki/Structured_programming">Structured programming</a>;
  </li>
  <li><a href="https://www.google.com/patents/US5425139?dq=sierra+on-line+path+finding&hl=en&sa=X&ved=0ahUKEwiqyuHVjZXVAhUF7xQKHfecCOYQ6AEIKzAB">Here</a>'s another way of looking at the pathfinding problem by <b>Sierra On-Line</b>;
  </li>
</ul>
