<form>
    <input type="text" name="input">
    <input type="submit" value="Count Words">

</form>

<?php
if (isset($_GET['input'])) {
    $input = strtolower($_GET['input']);

    $input = preg_split("/[^a-zA-Z]+/", $input, -1, PREG_SPLIT_NO_EMPTY);

    $arr = [];

    foreach ($input as $item) {
        if (array_key_exists($item, $arr)) {
            $arr[$item]++;
        } else {
            $arr[$item] = 1;
        }
    }

$output = "<table border='2'>";

foreach ($arr as $words => $counter){
    $output .= "<tr><td>$words</td><td>$counter</td></tr>";
}

$output .= "</table>";

echo $output;
}
?>



