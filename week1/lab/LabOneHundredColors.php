<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
function random_color_part() 
        {
            return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
        }

        function random_color() 
        {
            return random_color_part() . random_color_part() . random_color_part();
        }

        
        
        function colorUnit()
        {
            $randcol = random_color();
            echo '<td style="background-color:#'.$randcol.';">'.$randcol.'<br /><span style="color:#ffffff;">'.$randcol.'</span></td>';
        }
        
        function lineOfTenRandomColors()
        { 
            echo "<tr>";
            for($i=0; $i<10; $i++)
            {
            colorUnit();
            }
            echo "</tr>";
        }
?>




<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table><tbody><tr>
        <?php  
        for($i=0; $i<10; $i++)
        {
        lineOfTenRandomColors();
        }
        ?>
        </tr></tbody></table>
    </body>
</html>
