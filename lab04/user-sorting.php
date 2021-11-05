<?php
$submitted = $_POST["submitted"];
$sort_type = $_POST["sort_type"];

function user_sort($a, $b) {
    // smarts is all-important, so sort it first
    if ($b == 'smarts') {
        return 1;
    } else if ($a == 'smarts') {
        return -1;
    }
    return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
}

$values = array(
    'name' => 'Buzz Lightyear',
    'email_address' => 'buzz@starcommand.gal',
    'age' => 32,
    'smarts' => 'some'
);

$sort_methods = array(
    'sort' => 'Standard sort',
    'rsort' => 'Reverse sort',
    'usort' => 'User-defined sort',
    'ksort' => 'Key sort',
    'krsort' => 'Reverse key sort',
    'uksort' => 'User-defined key sort',
    'asort' => 'Value sort',
    'arsort' => 'Reverse value sort',
    'uasort' => 'User-defined value sort'
);
?>

<form action="user-sorting.php" method="post">
    <p><?php
        if (!$sort_type) $sort_type = 'sort';
        foreach ($sort_methods as $t => $v) {
            echo "<input type='radio' name='sort_type' value='$t'";
            if ($t == $sort_type) echo " checked=checked";
            echo "/>$v<br />";
        }
    ?></p>
    <p align="center">
        <input type="submit" value="Sort" name="submitted" />
    </p>
</form>
<p>Values unsorted (before sort):</p>
<ul>
    <?php
    foreach ($values as $key => $value) {
        echo "<li><b>$key</b>: $value</li>";
    }
    ?>
</ul>

<?php
if ($submitted == "Sort") {
    echo "<p>Values sorted by $sort_type</p>";

    if ($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
        $sort_type($values, 'user_sort');
    } else {
        $sort_type($values);
    }

    echo "<ul>";
    foreach ($values as $key => $value) {
        echo "<li><b>$key</b>: $value</li>";
    }
    echo "</ul>";
}
?>
