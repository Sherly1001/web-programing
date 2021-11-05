<?php
$sort_type = $_POST["sort_type"];
$submitted = $_POST["submitted"];

function get_file_info($path) {
    $files = array_diff(scandir($path), array('.', '..'));
    $files_info = Array();
    foreach ($files as $f) {
        $file_info = Array(
            'name' => $f,
            'type' => pathinfo($path . '/' . $f)["extension"],
            'size' => filesize($path . '/' . $f),
            'date' => filemtime($path . '/' . $f)
        );
        array_push($files_info, $file_info);
    }
    return $files_info;
}

$files_info = get_file_info('./uploaded');
?>

<table>
    <tr>
        <th>File Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Uploaded Date</th>
    </tr>
    <?php
        if ($sort_type == 'name') usort($files_info, function($a, $b) {
            return $a['name'] <=> $b['name'];
        });
        else if ($sort_type == 'date') usort($files_info, function($a, $b) {
            return $a['date'] <=> $b['date'];
        });
        foreach ($files_info as $info) {
            echo "<tr>";
            echo "<td>" . $info['name'] . "</td>";
            echo "<td>" . $info['type'] . "</td>";
            echo "<td>" . $info['size'] . " bytes</td>";
            echo "<td>" . date('H:i Y/m/d', $info['date']) . "</td>";
            echo "</tr>";
        }
    ?>
</table>

<form action="file-list.php" method="post">
    <input type="radio" name="sort_type" value="name" <?= $sort_type != 'date' ? 'checked' : '' ?> /> sort by name<br />
    <input type="radio" name="sort_type" value="date" <?= $sort_type != 'name' ? 'checked' : '' ?> /> sort by date<br />
    <input type="submit" name="submitted" value="sort">
</form>
