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
        <table><tbody>
        <?php for($i=0; $i<10; $i++):?>
            <tr>
            <?php for($j=0; $j<10; $j++): ?>
			<?php /*$randcol randomly generates a hex value to represent value. The following line creates the table cells using the color as it's background */?>
                <?php $randcol = str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT) . str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT) . str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT); ?>
                <td style="background-color:#<?php echo $randcol ?>;">'<?php echo $randcol ?>'<br /><span style="color:#ffffff;">'<?php echo $randcol ?>'</span></td>
            <?php endfor;?>
            </tr>
            
         <?php endfor;?>   
      
        </tbody></table>
    </body>
</html>





