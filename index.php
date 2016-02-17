<?php
/*
 * @author Teodor Stamenov
 */
?>
<!doctype html>
<html>
    <head>
        <title>How old are you?</title>
        <meta charset="UTF-8" />
        <style>
            .error
            {
                color: red; 
            }
            .success
            {
                color: green;
            }
        </style>
    </head>
    <body>
        
        <?php require_once 'functions_PHP1_h_1.php'; ?>
        
        <form method="GET">
            <label name="lbl"> 
                <?php
                
                if(!empty($_GET) && is_numeric($_GET['calc']) && calculateYear())
                {
                    $_GET['calc'] = trim($_GET['calc']);

                    showMessage('You are '.calculateYear().' years old!', 'success');
                }
                elseif(is_negative())
                {
                    showMessage('Entered number '.$_GET['calc'].' is negative', 'error');
                }
                else
                {
                    showMessage(
                        'Please enter valid year. <br /> The year range must be in 1800-2015! <br /> '
                        . 'You can use short year but range must be in 16-99 for the last Century<br />'
                        . 'You can use short year range in 0-15 but that will be for people who were born from 2000-2015', 
                        'error'
                    );
                }
                
                ?>
            </label><br />
            <input type="text" name="calc" />
            <input type="submit" value="Calculate" name="submit" />
        </form>
    </body>
</html>