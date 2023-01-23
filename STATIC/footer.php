<?php
/*html footer default*/
function htmlFooter($dateCompleted): void
{

    echo "
    </div>
    <footer>
        ";

    $current_file = basename($_SERVER['PHP_SELF']);
    $files = glob('*.php');
    $current_index = array_search($current_file, $files);


    if($current_file && isset($files[$current_index - 1])){
        echo '<a href="' . $files[$current_index - 1] . '" class="previous">Previous Page</a>';
    }

    if ($current_index !== false && isset($files[$current_index + 1])) {
        echo '<a href="' . $files[$current_index + 1] . '" class="next">Next Page</a>';
    }





    echo "</footer>
    </body>
    </html>";
}
?>
