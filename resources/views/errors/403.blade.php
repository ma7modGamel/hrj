<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Simple HttpErrorPages | MIT X11 License | https://github.com/AndiDittrich/HttpErrorPages -->

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>whoops</title>

    <style type="text/css">
html {
    font - family: sans - serif;
    line - height: 1.15;
    - ms - text - size - adjust: 100 %;
    - webkit - text - size - adjust: 100 %
}

body {
    margin: 0
}

article,
aside,
footer,
header,
nav,
section {
    display: block
}

h1 {
    font - size: 2e m;
    margin: .67e m 0
}

figcaption,
figure,
main {
    display: block
}

figure {
    margin: 1e m 40 px
}

hr {
    box - sizing: content - box;
    height: 0;
    overflow: visible
}

pre {
    font - family: monospace, monospace;
    font - size: 1e m
}

a {
    background - color: transparent;
    - webkit - text - decoration - skip: objects
}

a: active,
a: hover {
    outline - width: 0
}

abbr[title] {
    border - bottom: none;
    text - decoration: underline;
    text - decoration: underline dotted
}

b,
strong {
    font - weight: inherit
}

b,
strong {
    font - weight: bolder
}

code,
kbd,
samp {
    font - family: monospace, monospace;
    font - size: 1e m
}

dfn {
    font - style: italic
}

mark {
    background - color: #ff0;
    color: #000
}

small {
    font-size: 80%
}

sub,
sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline
}

sub {
    bottom: -.25em
}

sup {
    top: -.5em
}

audio,
video {
    display: inline-block
}

audio:not([controls]) {
    display: none;
    height: 0
}

img {
    border-style: none
}

svg:not(:root) {
    overflow: hidden
}

button,
input,
optgroup,
select,
textarea {
    font-family: sans-serif;
    font-size: 100%;
    line-height: 1.15;
    margin: 0
}

button,
input {
    overflow: visible
}

button,
select {
    text-transform: none
}

[type=reset],
[type=submit],
button,
html[type=button] {
    -webkit - appearance: button
}

[type=button]::-moz - focus - inner,
[type=reset]::-moz - focus - inner,
[type=submit]::-moz - focus - inner,
button::-moz - focus - inner {
    border - style: none;
    padding: 0
}

[type=button]: -moz - focusring,
[type=reset]: -moz - focusring,
[type=submit]: -moz - focusring,
button: -moz - focusring {
    outline: 1 px dotted ButtonText
}

fieldset {
    border: 1 px solid silver;
    margin: 0 2 px;
    padding: .35e m .625e m .75e m
}

legend {
    box - sizing: border - box;
    color: inherit;
    display: table;
    max - width: 100 %;
    padding: 0;
    white - space: normal
}

progress {
    display: inline - block;
    vertical - align: baseline
}

textarea {
    overflow: auto
}

[type=checkbox],
[type=radio] {
    box - sizing: border - box;
    padding: 0
}

[type=number]::-webkit - inner - spin - button,
[type=number]::-webkit - outer - spin - button {
    height: auto
}

[type=search] {
    -webkit - appearance: textfield;
    outline - offset: -2 px
}

[type=search]::-webkit - search - cancel - button,
[type=search]::-webkit - search - decoration {
    -webkit - appearance: none
}

::-webkit - file - upload - button {
    -webkit - appearance: button;
    font: inherit
}

details,
menu {
    display: block
}

summary {
    display: list - item
}

canvas {
    display: inline - block
}

template {
    display: none
}

[hidden] {
    display: none
}


/*! Simple HttpErrorPages | MIT X11 License | https://github.com/AndiDittrich/HttpErrorPages */

body,
html {
    width: 100 %;
    height: 100 %;
}

body {
    color: #fff;
    text - align: center;
    padding: 0;
    min - height: 100 %;
    - webkit - box - shadow: inset 0 0 75 pt rgba(0, 0, 0, .8);
    box - shadow: inset 0 0 75 pt rgba(0, 0, 0, .8);
    display: table;
    font - family: "Open Sans", Arial, sans - serif
}

h1 {
    font - family: inherit;
    font - weight: 500;
    line - height: 1.1;
    color: inherit;
    font - size: 36 px
}

h1 small {
    font - size: 68 %;
    font - weight: 400;
    line - height: 1;
    color: #fffafa;
}

a {
    text-decoration: underline;
    color: #fff;
    font-size: 18px;
}

.lead {
    color: #fff4f2;;
    font-size: 21px;
    line-height: 1.4
}

.lead2 {
    color: silver;
    font-size: 17px;
    line-height: 1.4
}

.cover {
    display: table-cell;
    vertical-align: middle;
}

footer {
    position: fixed;
    width: 100%;
    height: 40px;
    left: 0;
    bottom: 0;
    color: # a0a0a0;
    font - size: 14 px
}

#page-header {
    text-align: center;
    padding: 90px 0;
    margin-bottom: 120px;
    background: #fe5e3e url(/wp-content/themes/dakota-theme/layouts/images/pattern.png) repeat top left;
    color: #fff;
    position: fixed;
    width: 100%;
}

    </style>
</head>

<body>
    <div class="cover">
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <div id="page-header">
          <div class="container">
              <div class="errorStr">
                <img src="https://elryad.com/wp-content/themes/dakota-theme/layouts/images/logo.png" class="logo">
                  <h2> عفوا </h2> 
                  <p class="lead">... هذه النسخة من سكربت حراج هي خاصة بموقع : {{getSettings()}}</p>
                  <h1><small>مقدمة من </small>شركة الرياض <small> لتصميم الموقع </small></h1>
                  <p class="lead2"><a href="http://elryad.com/haraj-web-site-design">... أحصل علي نسختك الخاصة أضغط هنا</a></p>
              </div>
          </div>
      </div>
      <script !src="">
        setTimeout(function () {
            window.location.href = "http://elryad.com/haraj-web-site-design"; //will redirect to your blog page (an ex: blog.html)
        }, 6000); //will call the function after 2 secs.

    </script>

</div>


</body>
</html>
