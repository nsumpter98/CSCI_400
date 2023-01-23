<?php
/*html header default*/
function htmlHeader($title = "PHP Practice", $css = "common.css"): void
{
    echo "<!DOCTYPE html> 
    <html lang=\"en\">
    <head>
        <meta charset=\"utf-8\"/>
        <title>$title</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"$css\"/>
    </head>
    <body>
    <header>
        <h1>$title</h1>
    </header>
    <div class=\"content\">
    ";
}
?>
