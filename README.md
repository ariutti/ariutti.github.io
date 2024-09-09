# README

This is a repo about code used to generate my website. This code is essentially a copy of the original code by Fabien Sanglard.
You can read more about him on [his](https://fabiensanglard.net) website where you can find also a copy of his code (and also read more about his website techs) [here](https://fabiensanglard.net/ilike/index.html) and [here](https://fabiensanglard.net/html/index.html).




## keep in mind that

These are notes written especially for me in order not to forget some installation and settings procedures I made. Also because (as the time of writing) I'm not so good at php.

### dependencies | installation

1. install php command line interpreter `sudo apt install php-cli`;
2. install php SimpleXML module `sudo apt install php-xml`;

### php synthax

I noticed that Fabien's original code gave me an error due to some lines of php code starting like this `<?h ` or `<?echo `.
I then noticed that by changing them like this `<?php h ` or `<?php echo `, the code started to work correctly.

### fonts

TODO

### generate website

1. navigate inside the root of the code folder and run the command `php gen.php`;
2. now, in order to see the just-compiled-website working run the command `python3 -m http.server 8000` and go to a browser reaching the url `localhost:8000`.

The usage of a local webserver is important in order to prevent CORS issues and also to have fonts rendered correctly and also have the _wavesurfer.js_ module working as expected.


## How does it work?

Using Fabien words: "The HTML pages are statically generated from php. There is a "master" script called gen.php which iterates over all sub-folders and searches for files named article.php. Upon hit, the master runs the article script, wrapping it into a header and a footer, and redirects the output to a file named index.html.

There is one helper function, footnote(), which stores references so they can be listed in the footer."

We have indeed subfolders with article material inside. Single note is that the source code file for the article should be named `src.php` and not `article.php`.

## Content preparation

### Header

Every article shoud start with a header. In order to do This you should call the proper php function passing it the _title_ and the _date_ of you article as arguments:

```
<?php genheader("How the Dreamcast copy protection was defeated", "December 11, 2018");?>
```

### Headers like "h"

Call the php specific function <?php h("my section title here");?>

### Images

TODO


### Image creation

When working with SVG for image creation keep in mind these :

* la larghezza del cavas deve essere:

### Footnotes

In order to make footnotes in your article you have to use thie php function in your article php src: `<?php footnote("note title", "URL link");?>`

## Favicon

I'm using the same favicon as the one from [Melissa Pons](https://www.melissapons.com/) website. I like it!


## from MD to HTML

In using Pulsar text editor in order to edit old articles written in md format use the follogin regular expressions:

* search for: '\*\*(.*?)\*\*' and replace with: '<b>$1</b>';
* search for: '_(.*?)_' and replace with: '<i>$1</i>';
* search for: '\$\$(.*?)\$\$' and replace with: '<code>$1</code>', same with `(.*?)`;
