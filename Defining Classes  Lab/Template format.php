<?php
function CreateTemplate(string $question, string $answer): string {
    return "
  <question>
    $question
  </question>
  <answer>
    $answer
  </answer>";
}

$input = explode(", ", readline());

echo '<?xml version="1.0" encoding="UTF-8"?>
<quiz>';

for($i = 0; $i < count($input); $i+=2){
    $question = $input[$i];
    $answer = $input[$i + 1];

    echo CreateTemplate($question, $answer);
}

echo "
</quiz>";