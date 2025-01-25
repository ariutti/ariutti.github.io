<?php genheader("SCUMM: FOA room image and palette extractor", "Genuary 25, 2025");?>

<p>While working on the content for the upcoming post about the musical resources of the LucasArts video game <b>Indiana Jones and the Fate of Atlantis</b><?php footnote("Indiana Jones and the Fate of Atlantis wiki page", "https://en.wikipedia.org/wiki/Indiana_Jones_and_the_Fate_of_Atlantis");?> (or simply FOA), I wanted to develop a small tool to extract the color palettes and background images from the game.</p>

<p>I thought that having the background images for each environment in the game would eventually be useful to quickly recall the events of the game at any given moment in the story.</p>

<?php h("Python tool");?>

<p>The Python code I wrote to export these images is hosted on my GitHub page, here<?php footnote("Custom python FOA palette and background images extraction tool", "https://github.com/ariutti/SCUMM_experiments/tree/main/01_room_images_and_palettes_reader");?>. To make it work, you need to have the original FOA game files: the index file <code>ATLANTIS.000</code> and the resource file <code>ATLANTIS.001</code>.</p>

<hr />

<p>Below a table with alle the room images and palettes extracted with the tool:</p>

<table id="image_backgrounds_palettes_table">
	<tr>
	<td><b>Room Number</b></td>
	<td><b>Room Name</b></td>
	<td><b>Background Image</b></td>
	<td><b>Color Palette</b></td>
	</tr>
	<tr><td>1</td><td>col-offic</td>
	<td>
	<?php img("images/backgrounds/room1_off497.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room1_off497.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>2</td><td>col-hall_</td>
	<td>
	<?php img("images/backgrounds/room2_off260063.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room2_off260063.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>3</td><td>col-basem</td>
	<td>
	<?php img("images/backgrounds/room3_off347232.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room3_off347232.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>4</td><td>col-attic</td>
	<td>
	<?php img("images/backgrounds/room4_off429648.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room4_off429648.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>5</td><td>col-store</td>
	<td>
	<?php img("images/backgrounds/room5_off533059.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room5_off533059.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>6</td><td>col-archi</td>
	<td>
	<?php img("images/backgrounds/room6_off626941.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room6_off626941.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>7</td><td>col-catro</td>
	<td>
	<?php img("images/backgrounds/room7_off723042.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room7_off723042.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>8</td><td>wallet___</td>
	<td>
	<?php img("images/backgrounds/room8_off822485.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room8_off822485.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>9</td><td>natl-geo_</td>
	<td>
	<?php img("images/backgrounds/room9_off865052.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room9_off865052.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>10</td><td>sop-theat</td>
	<td>
	<?php img("images/backgrounds/room10_off908661.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room10_off908661.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>11</td><td>sop-stage</td>
	<td>
	<?php img("images/backgrounds/room11_off1138418.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room11_off1138418.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>12</td><td>sop-sides</td>
	<td>
	<?php img("images/backgrounds/room12_off1231886.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room12_off1231886.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>13</td><td>de-ice-ex</td>
	<td>
	<?php img("images/backgrounds/room13_off1363928.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room13_off1363928.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>14</td><td>dig-top__</td>
	<td>
	<?php img("images/backgrounds/room14_off1408516.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room14_off1408516.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>15</td><td>sop-study</td>
	<td>
	<?php img("images/backgrounds/room15_off1447097.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room15_off1447097.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>16</td><td>a2-skelet</td>
	<td>
	<?php img("images/backgrounds/room16_off1596510.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room16_off1596510.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>17</td><td>a2-digger</td>
	<td>
	<?php img("images/backgrounds/room17_off1728350.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room17_off1728350.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>18</td><td>a2-rube__</td>
	<td>
	<?php img("images/backgrounds/room18_off1799475.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room18_off1799475.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>19</td><td>de-azores</td>
	<td>
	<?php img("images/backgrounds/room19_off1885289.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room19_off1885289.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>20</td><td>sahara___</td>
	<td>
	<?php img("images/backgrounds/room20_off1990911.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room20_off1990911.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>21</td><td>a3-pit-to</td>
	<td>
	<?php img("images/backgrounds/room21_off2148275.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room21_off2148275.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>22</td><td>a3-god-ma</td>
	<td>
	<?php img("images/backgrounds/room22_off2210811.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room22_off2210811.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>23</td><td>a3-center</td>
	<td>
	<?php img("images/backgrounds/room23_off2252100.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room23_off2252100.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>24</td><td>deadroom_</td>
	<td>
	<?php img("images/backgrounds/room24_off2662244.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room24_off2662244.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>25</td><td>sub-volca</td>
	<td>
	<?php img("images/backgrounds/room25_off2696906.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room25_off2696906.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>26</td><td>de-ice-in</td>
	<td>
	<?php img("images/backgrounds/room26_off2761357.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room26_off2761357.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>27</td><td>mc-hotel_</td>
	<td>
	<?php img("images/backgrounds/room27_off2824132.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room27_off2824132.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>28</td><td>mc-seance</td>
	<td>
	<?php img("images/backgrounds/room28_off3066524.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room28_off3066524.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>29</td><td>af-cas-fl</td>
	<td>
	<?php img("images/backgrounds/room29_off3160901.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room29_off3160901.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>30</td><td>a3-god-hi</td>
	<td>
	<?php img("images/backgrounds/room30_off3386140.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room30_off3386140.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>31</td><td>a2-cu-rob</td>
	<td>
	<?php img("images/backgrounds/room31_off3423506.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room31_off3423506.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>32</td><td>bal-deser</td>
	<td>
	<?php img("images/backgrounds/room32_off3520551.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room32_off3520551.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>33</td><td>lab-crete</td>
	<td>
	<?php img("images/backgrounds/room33_off3687016.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room33_off3687016.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>35</td><td>a1-2-bot_</td>
	<td>
	<?php img("images/backgrounds/room35_off3784435.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room35_off3784435.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>36</td><td>a1-o-mach</td>
	<td>
	<?php img("images/backgrounds/room36_off3891622.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room36_off3891622.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>37</td><td>a1-o-pool</td>
	<td>
	<?php img("images/backgrounds/room37_off4015420.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room37_off4015420.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>39</td><td>sub-1-ins</td>
	<td>
	<?php img("images/backgrounds/room39_off4075856.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room39_off4075856.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>40</td><td>sub-2-ins</td>
	<td>
	<?php img("images/backgrounds/room40_off4138544.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room40_off4138544.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>41</td><td>sub-conn-</td>
	<td>
	<?php img("images/backgrounds/room41_off4277944.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room41_off4277944.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>42</td><td>sal-surfa</td>
	<td>
	<?php img("images/backgrounds/room42_off4429043.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room42_off4429043.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>43</td><td>cr-bro-ex</td>
	<td>
	<?php img("images/backgrounds/room43_off4528746.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room43_off4528746.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>44</td><td>cr-bro-in</td>
	<td>
	<?php img("images/backgrounds/room44_off4640411.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room44_off4640411.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>45</td><td>digger-ri</td>
	<td>
	<?php img("images/backgrounds/room45_off4687152.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room45_off4687152.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>46</td><td>a1-canal_</td>
	<td>
	<?php img("images/backgrounds/room46_off4801210.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room46_off4801210.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>47</td><td>cu-uberma</td>
	<td>
	<?php img("images/backgrounds/room47_off4971833.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room47_off4971833.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>48</td><td>a1-darkro</td>
	<td>
	<?php img("images/backgrounds/room48_off5009394.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room48_off5009394.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>49</td><td>th-dock__</td>
	<td>
	<?php img("images/backgrounds/room49_off5134158.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room49_off5134158.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>50</td><td>labyrinth</td>
	<td>
	<?php img("images/backgrounds/room50_off5337435.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room50_off5337435.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>51</td><td>catacombs</td>
	<td>
	<?php img("images/backgrounds/room51_off5589307.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room51_off5589307.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>52</td><td>labwat-1_</td>
	<td>
	<?php img("images/backgrounds/room52_off5805140.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room52_off5805140.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>53</td><td>lab-subwa</td>
	<td>
	<?php img("images/backgrounds/room53_off5837765.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room53_off5837765.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>54</td><td>lab-hide_</td>
	<td>
	<?php img("images/backgrounds/room54_off5870084.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room54_off5870084.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>55</td><td>a3-maze__</td>
	<td>
	<?php img("images/backgrounds/room55_off5905083.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room55_off5905083.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>56</td><td>lab-eleva</td>
	<td>
	<?php img("images/backgrounds/room56_off6036224.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room56_off6036224.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>57</td><td>lab-three</td>
	<td>
	<?php img("images/backgrounds/room57_off6075903.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room57_off6075903.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>58</td><td>transit__</td>
	<td>
	<?php img("images/backgrounds/room58_off6124755.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room58_off6124755.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>59</td><td>lab-mapro</td>
	<td>
	<?php img("images/backgrounds/room59_off6212460.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room59_off6212460.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>60</td><td>lab-goldb</td>
	<td>
	<?php img("images/backgrounds/room60_off6293990.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room60_off6293990.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>61</td><td>labwat-2_</td>
	<td>
	<?php img("images/backgrounds/room61_off6337506.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room61_off6337506.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>62</td><td>nazi-labo</td>
	<td>
	<?php img("images/backgrounds/room62_off6379790.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room62_off6379790.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>63</td><td>th-landsc</td>
	<td>
	<?php img("images/backgrounds/room63_off6573876.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room63_off6573876.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>64</td><td>af-cas-st</td>
	<td>
	<?php img("images/backgrounds/room64_off6619394.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room64_off6619394.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>65</td><td>af-cas-ho</td>
	<td>
	<?php img("images/backgrounds/room65_off6720766.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room65_off6720766.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>66</td><td>sub-under</td>
	<td>
	<?php img("images/backgrounds/room66_off6771758.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room66_off6771758.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>67</td><td>af-atl-ex</td>
	<td>
	<?php img("images/backgrounds/room67_off6887497.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room67_off6887497.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>68</td><td>logo_____</td>
	<td>
	<?php img("images/backgrounds/room68_off6973834.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room68_off6973834.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>69</td><td>th-dig-ex</td>
	<td>
	<?php img("images/backgrounds/room69_off7064910.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room69_off7064910.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>70</td><td>mc-chase_</td>
	<td>
	<?php img("images/backgrounds/room70_off7121444.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room70_off7121444.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>71</td><td>mc-smashu</td>
	<td>
	<?php img("images/backgrounds/room71_off7197730.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room71_off7197730.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>72</td><td>th-dig-in</td>
	<td>
	<?php img("images/backgrounds/room72_off7267832.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room72_off7267832.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>73</td><td>af-atl-in</td>
	<td>
	<?php img("images/backgrounds/room73_off7368825.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room73_off7368825.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>74</td><td>cu-microt</td>
	<td>
	<?php img("images/backgrounds/room74_off7442194.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room74_off7442194.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>75</td><td>map-world</td>
	<td>
	<?php img("images/backgrounds/room75_off7519500.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room75_off7519500.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>76</td><td>de-yuc-ex</td>
	<td>
	<?php img("images/backgrounds/room76_off7619140.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room76_off7619140.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>77</td><td>de-yuc-in</td>
	<td>
	<?php img("images/backgrounds/room77_off7869519.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room77_off7869519.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>78</td><td>af-cas-ov</td>
	<td>
	<?php img("images/backgrounds/room78_off7960910.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room78_off7960910.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>79</td><td>cu-neckla</td>
	<td>
	<?php img("images/backgrounds/room79_off8014657.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room79_off8014657.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>80</td><td>af-launch</td>
	<td>
	<?php img("images/backgrounds/room80_off8122530.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room80_off8122530.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>81</td><td>lockrock_</td>
	<td>
	<?php img("images/backgrounds/room81_off8173074.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room81_off8173074.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>82</td><td>sal-under</td>
	<td>
	<?php img("images/backgrounds/room82_off8294865.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room82_off8294865.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>83</td><td>cu-plato_</td>
	<td>
	<?php img("images/backgrounds/room83_off8343135.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room83_off8343135.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>84</td><td>cu-rube__</td>
	<td>
	<?php img("images/backgrounds/room84_off8393191.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room84_off8393191.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>85</td><td>a1-nw-top</td>
	<td>
	<?php img("images/backgrounds/room85_off8440191.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room85_off8440191.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>86</td><td>a1-ne-top</td>
	<td>
	<?php img("images/backgrounds/room86_off8517077.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room86_off8517077.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>87</td><td>a1-sw-top</td>
	<td>
	<?php img("images/backgrounds/room87_off8552801.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room87_off8552801.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>88</td><td>a1-se-top</td>
	<td>
	<?php img("images/backgrounds/room88_off8586212.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room88_off8586212.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>89</td><td>end-volca</td>
	<td>
	<?php img("images/backgrounds/room89_off8624242.png", 2, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room89_off8624242.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>90</td><td>end-v2___</td>
	<td>
	<?php img("images/backgrounds/room90_off8685692.png", 2, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room90_off8685692.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>91</td><td>a1-2-dark</td>
	<td>
	<?php img("images/backgrounds/room91_off8756566.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room91_off8756566.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>92</td><td>atlan-1__</td>
	<td>
	<?php img("images/backgrounds/room92_off8887401.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room92_off8887401.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>93</td><td>atlan-2__</td>
	<td>
	<?php img("images/backgrounds/room93_off9038785.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room93_off9038785.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>94</td><td>a2-generi</td>
	<td>
	<?php img("images/backgrounds/room94_off9136753.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room94_off9136753.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>95</td><td>bal-sea__</td>
	<td>
	<?php img("images/backgrounds/room95_off9233989.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room95_off9233989.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>96</td><td>endscene_</td>
	<td>
	<?php img("images/backgrounds/room96_off9319350.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room96_off9319350.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>97</td><td>a1-cagero</td>
	<td>
	<?php img("images/backgrounds/room97_off9460992.png", 80, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room97_off9460992.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

	<tr><td>98</td><td>_________</td>
	<td>
	<?php img("images/backgrounds/room98_off9646305.png", 2, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	<td>
	<?php img("images/palettes/room98_off9646305.png", 100, "margin-top: 2ch; margin-bottom:2ch;");?>
	</td>
	</tr>

</table>

<?php h("Glitches");?>

<p>The images from LucasArts video games were stored in the resource file in a compressed format. They were "<i>sliced</i>" into vertical strips, each 8 pixels wide, and then the strip data was compressed using a sort of custom RLE algorithm<?php footnote("RLE algorithm wiki page", "https://en.wikipedia.org/wiki/Run-length_encoding");?>, which could change depending on the graphic content of each strip.</p>

<p>Building the decoder wasn’t exactly straightforward because I found few references online, and in some cases, even conflicting ones. During my experiments, I encountered interesting glitch effects, such as those caused by an incorrect increment of the color pointer within the palette in the <code>codec1</code>.</p>

<p>If the <i>codec1</i> implementation is as follows</p>

<pre>
while pixel_left > 0:
  if bitReader.read_bit():
    if not bitReader.read_bit():
      color_index = bitReader.read_bits( palette_index_size )
      inc = -1
    else:
      if bitReader.read_bit():
        inc = -inc
      color_index += inc

  image_writer.write_pixel( i, COLOR_LOOKUP_TABLE[ color_index ], 1, direction )
  pixel_left -= 1
</pre>

<p>... everything works correctly, but if instead of <code>inc = -1</code> we use <code>inc = +1</code>, here's what happens:</p>


<table id="image_backgrounds_codec1_glitch_table">
	<tr>
	<td>Codec1 glitch Image</td>
	</tr>
	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room1_off497.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room2_off260063.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room3_off347232.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room4_off429648.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room5_off533059.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room6_off626941.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room7_off723042.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room8_off822485.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room9_off865052.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room10_off908661.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room11_off1138418.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room12_off1231886.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room13_off1363928.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room14_off1408516.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room15_off1447097.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room16_off1596510.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room17_off1728350.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room18_off1799475.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room19_off1885289.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room20_off1990911.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room21_off2148275.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room22_off2210811.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room23_off2252100.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room24_off2662244.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room25_off2696906.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room26_off2761357.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room27_off2824132.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room28_off3066524.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room29_off3160901.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room30_off3386140.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room31_off3423506.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room32_off3520551.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room33_off3687016.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room35_off3784435.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room36_off3891622.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room37_off4015420.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room39_off4075856.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room40_off4138544.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room41_off4277944.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room42_off4429043.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room43_off4528746.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room44_off4640411.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room45_off4687152.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room46_off4801210.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room47_off4971833.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room48_off5009394.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room49_off5134158.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room50_off5337435.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room51_off5589307.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room52_off5805140.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room53_off5837765.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room54_off5870084.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room55_off5905083.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room56_off6036224.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room57_off6075903.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room58_off6124755.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room59_off6212460.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room60_off6293990.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room61_off6337506.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room62_off6379790.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room63_off6573876.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room64_off6619394.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room65_off6720766.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room66_off6771758.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room67_off6887497.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room68_off6973834.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room69_off7064910.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room70_off7121444.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room71_off7197730.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room72_off7267832.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room73_off7368825.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room74_off7442194.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room75_off7519500.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room76_off7619140.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room77_off7869519.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room78_off7960910.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room79_off8014657.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room80_off8122530.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room81_off8173074.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room82_off8294865.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room83_off8343135.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room84_off8393191.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room85_off8440191.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room86_off8517077.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room87_off8552801.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room88_off8586212.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room91_off8756566.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room92_off8887401.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room93_off9038785.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room94_off9136753.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room95_off9233989.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room96_off9319350.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

	<tr>
	<td>
	<?php img("images/backgrounds_codec1_glitch/room97_off9460992.png", 100, "margin-top: 1ch; margin-bottom:1ch;");?>
	</td>
	</tr>

</table>

<?php h("Curiosities");?>

<ul>
  <li>The game data does not include rooms 34 and 38;</li>
  <li>The room 15 (<i>sop-study</i>) contains a section that will never be visited within the game;</li>
  <li>I suspect that room 51 (<i>catacombs</i>) is never visited during the game, as if it were a work-in-progress that was mistakenly saved in the resources;</li>
  <li>What are the these three vertical strips 89, 90, and 98?</li>
</ul>

<?php h("Main references and inspirations");?>

<p>The tool I developed was heavily inspired by other similar tools that can be found with a simple web search.</p>

<p>Moreover, it wouldn't have been possible to implement it without the vast amount of resources and documentation available on the ScummVM project website and elsewhere. Below is a non-exhaustive list:</p>

<ul>
  <li>Some tool I found here and there: <a href="https://github.com/scummvm/scummex">ScummEx</a>, <a href="https://web.archive.org/web/20080824015212/http://scumm.mixnmojo.com/?page=utils#scummrev">ScummRevisited</a>, and <a href="https://web.archive.org/web/20081222140420/http://scumm.mixnmojo.com/?page=downloads" target="_blank" rel="noopener noreferrer">LucasRipper</a> to name a few;</li>
  <li>ScummVM tech ref: <a href="https://wiki.scummvm.org/index.php?title=SCUMM/Technical_Reference/Room_resources" target="_blank" rel="noopener noreferrer">Room resources (Scumm V1)</a>;</li>
  <li>ScummVM tech ref: <a href="https://wiki.scummvm.org/index.php?title=SCUMM/Technical_Reference/Image_resources" target="_blank" rel="noopener noreferrer">Image resources</a>;</li>
  <li>Super useful <a href="https://web.archive.org/web/20090727144325/http://scumm.mixnmojo.com/?page=articles/article1" target="_blank" rel="noopener noreferrer">article</a> with a deep dive into image encoding and decoding;</li>
</ul>


<!-- LOAD a local CSS inside the head ----------------------------------------->
<script>
    // Create a new link element
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'styles/additional.css'; // Replace with your actual CSS file path

    // Append the link element to the body (although it's typically added in the <head>)
    document.body.appendChild(link);
</script>
