<?php

$footnote_text = array();
$footnote_url = array();
$footnote_count = 0;
function footnote($text, $url) {
  global $footnote_text;
  global $footnote_url;
  global $footnote_count;
  $footnote_count = $footnote_count + 1;
  $footnote_text[$footnote_count] = $text;
  $footnote_url[$footnote_count] = $url;

  echo "<a name=\"back_", $footnote_count, "\" style=\"text-decoration: none;\" href=\"#footnote_", $footnote_count, "\"><sup>[", $footnote_count, "]</sup></a>" ;

}

function footnotes_reset() {
  global $footnote_count;
  $footnote_count = 0;
}

function footnote_gen_references() {
  global $footnote_text;
  global $footnote_url;
  global $footnote_count;

  if ($footnote_count == 0) {
    return;
  }
  echo "<style type='text/css'>td.ref {  padding-bottom: 0ch; width:0;}</style>";
  h("References");
  echo "<p id='paperbox' style='text-align:left;'>";
  echo "<table class='references'><tbody style='vertical-align: top;'>";
  for( $i = 1; $i <= $footnote_count; $i++ ) {
    echo "<tr>";
    $target = "<a href=\"" . $footnote_url[$i]  . "\">" . $footnote_text[$i] . "</a>";
    if ($footnote_url[$i] == "") {
      $target = $footnote_text[$i] . ".";
    }
    $index = $i;
    if ($i < 10 && $footnote_count > 9) {
      $index = " " . $index;
    }
    echo "<td class='ref' style='width:1ch;'><a name=\"footnote_", $i, "\"></a><a href=\"#back_", $i, "\">^</a></td><td  class='ref' style='width:4ch;'> [", $index, "]</td><td style='width:100%;text-align:left;' class='ref'>",  $target, "</td>";
    echo "</tr>";
  }
  echo "</tbody></table>";
  echo "</p>";
}

function h($text) {
  echo "<div class='heading'>";
  echo $text;
  echo "</div><hr/>";
}

function getSvgImageSize($path) {
  $xml = simplexml_load_file($path) or die("Cannot load " . $path);
  $width = $xml[0]["width"];
  $height = $xml[0]["height"];
  $viewBox = $xml[0]["viewBox"];
  $box = explode(" ", $viewBox);
  if (empty($width) && empty($height) && count($box) == 4) {
    $width = $box[2];
    $height= $box[3];
  }
  return array($width, $height);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

function getDim($path) {
  if (endsWith($path, ".svg")) {
    return getSvgImageSize($path);
  }
  return getimagesize($path);
}

function img($path, $width, $style, $class = '') {
	img_with_id($path, $width, $style, "", $class);
}

function img_with_id($path, $width, $style, $id, $class = "") {
    $dimension = getDim($path);
    $as_aspect = strpos($style, 'aspect-ratio') !== false;
    // echo '<img src="', $path, '"';
    // loading="lazy" <- works well on Chrome but not so much on Firefox
    echo '<img loading="lazy" src="', $path, '"';
    if (!empty($class)) {
      echo ' class="', $class, '"';
    }

    if (!$as_aspect) {
    echo ' width="', $dimension[0], '" height="', $dimension[1], '"';
    }

    if (!empty($id)) {
    	echo ' id="', $id, '"';
    }
    echo ' style="width: ', $width, '%;';
    if (!$as_aspect) {
      echo' height: auto; ';
    }
    echo "", $style, '"/>' ;
}

function picture_with_id($path, $width, $style, $id, $class = "") {
  echo '<picture>';
  echo '<source srcset="', pathinfo($path, PATHINFO_FILENAME), '.webp" type="image/webp"/>';
  img_with_id($path, $width, $style, $id, $class);
  echo '</picture>';
}

function picture($path, $width, $style, $class = "") {
  picture_with_id($path, $width, $style, "", $class);
}

include("header.php");

function generate($src_dir) {
  $dst = $src_dir . "/index.html";
  $src = $src_dir . "/src.php";
  $footer_date = filemtime("footer.php");
  $header_date = filemtime("header.php");

  /*
  $generator_date = filemtime("g.php");

  if (file_exists($dst)) {
    $src_date = filemtime($src);
    $dst_date = filemtime($dst);
    // Skip if
    if ($src_date       < $dst_date &&     // Src is older than Dst.
        $header_date    < $dst_date &&  // Header is older than Dst.
        $footer_date    < $dst_date &&   // Footer is older than Dst.
        $generator_date < $dst_date) {

      return;
    }
  }
  */


  $cwd = getcwd();
  footnotes_reset();
  ob_start();
  chdir($src_dir);
  include($src);
  include("footer.php");
  $contents = ob_get_contents();
  chdir($cwd);
  ob_end_clean();
  file_put_contents($dst, $contents);
  echo("Generated $dst\n");
}

generate(".");
generate("about");
generate("contact");


/*
I want all my articles to be collected inside a folder which is named '_posts'
*/
//generate("articles/test_article");
generate("articles/first_article");
generate("articles/wavesurfer_test");
generate("articles/scumm_walk_matrices");
generate("articles/scumm_versions");
generate("articles/scumm_first");
// Add articles here as you write them...
?>
