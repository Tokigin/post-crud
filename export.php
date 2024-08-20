<?php
require_once "./posts.php";

use Posts\Post;

$pid = 1;
$dataArray = Post::GetData();
$fileName = "export_" . date('Y-m-d-H:i:s') . ".xls";
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"> Post ID</th>
            <th scope="col">Title</th>
            <th scope="col">Data</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataArray as $row) { ?>
            <tr>
                <td><?php echo $pid++ ?></td>
                <td><?php echo $row["PostId"]; ?></td>
                <td><?php echo $row["PostTitle"]; ?></td>
                <td><?php echo $row["PostData"]; ?></td>
                <td><?php echo $row["DateTime"]; ?></td>
            </tr>
        <?php
        } ?>
    </tbody>
</table>