<?php 
//echo '<pre>';print_r($donnees); echo '</pre>';
?>
<div class="container">
    <table class="table table-bordered  col-md-4 offset-md-4 text-center">
        <?php foreach($donnees as $key => $value):?>
            
                <tr>
                <td><?=$key?> : <?=$value?></td>
                </tr>

    <?php endforeach;?>
</table>
</div>