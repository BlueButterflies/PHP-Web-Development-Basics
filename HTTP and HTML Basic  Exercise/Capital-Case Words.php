<form>
    <textarea rows="10" name="text"></textarea><br>
    <input type="submit" name="Extract">
</form>

<?php

if (isset($_GET['text'])){
    $input = $_GET['text'];
    preg_match_all('/\w+/', $input, $words);
    $words = $words[0];

    $givenUpperLetters = array_filter($words, function ($word){
        return strtoupper($word) == $word;
    });

    echo implode(", ", $givenUpperLetters);
}
