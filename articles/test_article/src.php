<?php genheader("How the Dreamcast copy protection was defeated", "December 11, 2018");?>
<p>
    <?php img("Dreamcast_logo.svg", 20, "float:right;margin-bottom: 1ch; margin-left: 2ch;");?>
  </picture>
  After I shipped the <a href="../gebbdoom">DOOM Black Book</a>, I took some vacation in Japan where I was able to play Ikaruga on a real arcade at Taito HEY in Akihabara. The experience reignited my interest in SEGA's ultimate video game console, the Dreamcast.<br/>
  <br/>There is a lot of documentation available online which made the studying process easier than expected. Marcus Comstedt's excellent <a href="http://mc.pp.se/dc/">website</a> which describes everything down to the GPU registers and Jockel's <a href="https://www.neogaf.com/threads/lets-build-a-sega-dreamcast-game-from-scratch-breakout.916501/">Let's build a Sega Dreamcast game from scratch</a> are two excellent resources which will rapidly bring anyone up to date.<br/>
  <br/> Studying the machine revealed the fascinating story of how hackers cracked the game copy protection early on and doomed SEGA's last hardware hopes.<br/>
    </p>

  <?php h("First protection level: GD-ROM");?><p style="margin-bottom: 0;">
   On paper the SEGA Dreamcast's copy protection mechanism looked strong. Games shipped on a special medium called GD-ROM which only SEGA was able to manufacture. With the GD part standing for "Gigabyte Disc", its higher density brought the max capacity to 1 GiB, which was beyond what normal CD-ROM were able to provide (700 MiB).<br/>
   <br/>
   <picture  >
    <source srcset="ikaruga_gdrom.webp" type="image/webp">
    <?php img("ikaruga_gdrom.png", 21, "float:left;margin-bottom: 2ch; margin-left: 2ch; margin-right:1ch;");?>
  </picture>
    <?php img("gd-rom.svg", 21, "float:left;margin-bottom: 2ch; margin-right: 2ch;");?>
    A GD-ROM had the same physical dimensions as a CD-ROM but at the macro level it was made of two areas visible with naked eyes.<br/>
   <br/> The first (dark) section was a low density, CD-ROM compatible, area holding up to 35 MiB. It contained a voiceover audio track reminding user that the content was intended for SEGA Dreamcast and not for a CD player<?php footnote("SEGA GD Workshop", "https://www.consolecopyworld.com/dc/gd-ws/gdws_big/sld009.htm");?>.

    Developer also included a track with text files such as copyright and sometimes goodies such as artwork.<br/>
   <br/>
 </p>
<div style="clear:both;"></div>
<p>
    The (clear) high density section storing up to 984 MiB<?php footnote("segaretro.org: GD-ROM", "https://segaretro.org/GD-ROM");?> is where all the game's content was located.

   As far as hackers were concerned, it seemed there was no way to extract the game from its support and there was no way to burn it back for distribution either.
  </p>




 <?php h("Booting from a GD-ROM: IP.BIN and 1ST_READ.BIN");?><p>
      Before describing how pirates managed to copy games, we need to understand the boot sequence. The Dreamcast had no operating system. A common misconception is that it ran Windows CE but in fact Microsoft's OS was only an optional static library which Dreamcast developers could link against in order to use DirectX, DirectInput, and DirectSound<?php footnote("Microsoft Announces Windows CE Toolkit for Dreamcast", "https://news.microsoft.com/1999/03/16/microsoft-announces-windows-ce-toolkit-for-dreamcast/");?>. Some games used WinCE<?php footnote("Dreamcast games utilising Windows CE", "https://segaretro.org/Windows_CE");?> but many (like Ikaruga) did not. Regardless of what a developer used, a game was a fully-linked OS and a Dreamcast always booted in the same way.<br/>
    <br/>
    Under normal usage, running an official game, a freshly powered up Dreamcast's BOOTROM started by loading the bootstrap from the GD-ROM to the RAM. Located in the last track on the GD-ROM and known in the community as "IP.BIN", the tiny program was in charge of displaying SEGA's license screen and ran two bootstrap level to setup the hardware registers, create the CPU stack, and initialize the VBR<?php footnote("IP.BIN and 1ST_READ.BIN", "http://mc.pp.se/dc/ip.bin.html");?>.<br/>
    <br/>
    More importantly, IP.BIN contained the name of the game executable. This name was looked up in the GD-ROM file-system and loaded in RAM at 0x8C010000 before execution was transfered there. Usually the filename of the game executable was "1ST_READ.BIN".<br/>
       <br/>
    <?php img("gd-rom_loading.svg", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>
   <br/>
   With the CPU jumping to 0x8C010000, the game started as intended.<br/>
 </p>
  <div style="clear:both;"></div>



 <?php h("Second protection level: Scrambler");?><p>
  The "foot in the door" came from a seemingly obscure capability of the Dreamcast to boot not from a GD-ROM but from a CD-ROM.  Originally intended to add multimedia functions to music CDs, the functionality called "MIL-CD" was never used much, accounting for a mere seven karaoke applications.<br/>
  <br/>
    SEGA engineers knew that MIL-CD booting could be used as an attack vector so they added a protection. When the console detected a CD-ROM, the BOOTROM loaded IP.BIN normally but scrambled 1ST_READ.BIN, seemingly at random. A valid executable was therefore turned into mashed potatoes which promptly crashed the console.<br/>
    <?php img("cd-rom_loading.svg", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>
   From there it looked like the console was safe. The Dreamcast was able to recognize a pirated game, corrupt the executable at load time, and defeated pirates.<br/>
  </p>



   <?php h("Give me my long sword, ho!");?><p>
    The mashed potatoes problem was solved when a Katana SDK (the official Sega SDK for the Dreamcast) was stolen<?php footnote("Let's build a Sega Dreamcast game from scratch", "https://www.neogaf.com/threads/lets-build-a-sega-dreamcast-game-from-scratch-breakout.916501/page-3#post-216433495");?> by the hacking team "Utopia" in late 1999. It turned out that the scrambler was nothing more than "security through obscurity". The SDK contained a reverse-scrambler which transformed a valid executable into reverse-mashed-potatoes so it would be valid again when loaded and scrambled by the Dreamcast when booting from a CD-ROM.<br/>
    <?php img("cd-rom_loading_reverse.svg", 100, "margin-top: 2ch; margin-bottom: 2ch;");?>
   <br/>
 </p>
  <div style="clear:both;"></div>




 <?php h("Extracting a game from its GD-ROM");?><p>
  The stolen SDK was all pirates needed. With the ability to run code on the machine, the Dreamcast was re-purposed to act not as a game console but as a GD-ROM drive. The SDK's "Coder's Cable"<?php footnote("PC Serial Adaptor", "http://mc.pp.se/dc/serifc.html");?> allowed to connect the console to a PC and establish a physical connection. To trigger the console to dump the GD track content, a special executable was written, reverse-scrambled and burned onto a CD-ROM in order to output the whole 1 GiB via the console's serial port. It was an error prone process which took up to 18 hours<?php footnote("A more accurate and in-depth look at the Dreamcast's security", "https://www.reddit.com/r/dreamcast/comments/15pww3/a_more_accurate_and_indepth_look_at_the/");?> to complete<?php footnote("Faster ways were designed latter, using the DC's broadband connector", "https://assemblergames.com/threads/dumping-dreamcast-gd-rom-gd-r-discs.16679/");?>. The result was stored in a custom made format called ".gdi".<pre>ikaruga.gdi            153 bytes
track01.bin     13,982,640 bytes
track02.raw      2,088,576 bytes
track03.bin  1,185,760,800 bytes</pre>
<p>
<b>Trivia</b>: You will notice that the total account for 1.2 GiB and not the 1.0 GiB mentioned earlier. This is because GD-ROM 2,352-byte sectors follow the "Red Book" format where 12 bytes are used for synchronization, 4 bytes for the header, 2048 bytes for the payload, and 288 bytes are for Error Detection Code/Error Correcting Code<?php footnote("Dreamcast Myth: GD-ROM Storage Capacity", "https://xiaopang333.wordpress.com/2008/08/06/dreamcast-myth-gd-rom-storage-capacity/");?>.<br/>
<pre>$ cat ikaruga.gdi
3
1     0 4 2352 track01.bin 0
2  5945 0 2352 track02.raw 0
3 45000 4 2352 track03.bin 0</pre>
  </p>

 <?php h("Making a 1000 MiB GD-ROM fit inside a 700 MiB CD-ROM");?><p>
  To make the game fit on a 700 MiB CD-ROM, game's assets were reworked. The ISO-9660 file-system used on GD-ROM made it easy to down-sample/remove video sequences and musics. For most games however there was no need for such a complicated process since they did not use the whole 1 GiB space. For example, Treasure's Ikaruga was only 150 MiB and padded most of its content with zeros. In these cases, only adjusting the padding was enough.<br/>
  <br/>
  In fact, ISO-9660 is such a well-known format that simple python scripts (such as <a href="https://sourceforge.net/projects/dcisotools/">gditools.py</a>) were written to <a href="gditools.txt">explore</a> the content of .gdi archives.<br/>
  </p>




<?php h("Packing and Distribution");?><p>
The last two steps of the process were to reverse-scramble 1ST_READ.BIN and pack everything into a .cdi archive so <a href="https://legacy.padus.com/">DiscJuggler</a> could burn the image on a CD-R. The result ran flawlessly on any vanilla Dreamcast without need for a modification chip.<br/>







 <?php h("Response from SEGA and after-match");?><p>
    SEGA quickly released a DC v2 which disabled MIL-CD altogether but unfortunately damage had been done. With revenues plummeting and the PS2 ogre coming out, developers abandoned the Dreamcast and SEGA retired from the hardware manufacturing business in order to focus on software.<br/>
  </p>

 <?php h("Corrections");?><p>
  Long-time Dreamcast explorer, "newchiefgaming", provided corrections for this article. They can be found <a href="corrections/corrections.pdf">here</a>.
 </p>
