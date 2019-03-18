<?php
echo "<table class='table table-dark'>";
foreach ($model as $key => $subject){
    ?>
    <tr>
        <td><?= $subject->ID?></td>
        <td><?= $subject->Name?></td>
        <td><?= $subject->Duration?></td>
    </tr>
    <?php
}
echo"</table>";