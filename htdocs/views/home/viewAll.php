<?php
echo "<table class='table table-dark'>";
foreach ($model as $key => $student){
    ?>
    <tr>
        <td><?= $student->ID?></td>
        <td><?= $student->FirstName?></td>
        <td><?= $student->LastName?></td>
        <td><?= $student->Birthday?></td>
        <td><?= $student->Email?></td>
        <td>
        <form method="post" action="/home/delete">
            <input type="hidden" name="ID" value="<td><?= $student->ID?></td>">
            <input  class="btn btn-submit" type="submit" value="Delete">
        </form>
        </td>
    </tr>
    <?php
}
echo"</table>";