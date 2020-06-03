<form>
    Categories: <input type="text" name="categories"><br/>
    Tags: <input type="text" name="tags"><br/>
    Months: <input type="text" name="months"><br/>
    Months: <input type="submit" name="Generate">
</form>



<?php
$output = "";

if (isset($_GET['categories']) && isset($_GET['tags'])&& isset($_GET['months'])){
    $categories = explode(", ", trim($_GET['categories']));
    $tags = explode(", ", trim($_GET['tags']));
    $months = explode(", ", trim($_GET['months']));

    $output .= "<h2>Categories</h2><ul>";

    foreach ($categories as $category) {
        $output .= "<li>$category</li>";
    }
    $output .= "</ul><h2>Tags</h2><ul>";

    foreach ($tags as $tag) {
        $output .= "<li>$tag</li>";
    }

    $output .= "</ul><h2>Months</h2><ul>";

    foreach ($months as $month) {
        $output .= "<li>$month</li>";
    }

    $output .= "</ul>";

    echo $output;
}