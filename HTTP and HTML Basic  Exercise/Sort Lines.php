<?php
if (isset($_GET['lines'])) {
    $input = array_map("trim", explode("\n", htmlspecialchars($_GET['lines'])));
    $input = array_filter($input);
    sort($input, SORT_STRING);
    $sortedLines = implode("\n", $input);
}
?>

<form>
    <textarea rows="10" name="lines"><?= $sortedLines ?></textarea><br>
    <input type="submit" value="Sort"/>
</form>