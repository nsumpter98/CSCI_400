<?php
/*html footer default*/
function htmlFooter(): void
{
    //add current date and time to footer
    $date = date("m/d/Y");
    echo "
    </div>
    <footer>
        <p>Current date: $date</p>
    </footer>
    </body>
    </html>";
}
?>
