<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table><tbody><tr>
        <?php for($i=0; $i<10; $i++): ?>
          
            <tr>
            <?php for($i=0; $i<10; $i++): ?>

                <?php $randcol = str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT) . str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT) . str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT); ?>
                <td style="background-color:#'<?php.$randcol.?>';">'<?php.$randcol.?>'<br /><span style="color:#ffffff;">'<?php.$randcol.?>'</span></td>
            <?php endfor?>
            </tr>
        
        <?php endfor; ?>
        </tr></tbody></table>
    </body>
</html>





