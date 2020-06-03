<form>
    <input type="text" name="input"><br>
    <input type="submit" value="Color text">

</form>

<?php
if (isset($_GET['input'])){
    $input = str_replace(" ", "",htmlspecialchars($_GET['input']));

    for ($i=0;$i< strlen($input);$i++){
        $letters = ord($input[$i]);

        if ($letters % 2 == 0){

            $output .= "<span style='color: red'>$input[$i]</span>";
        }
        else{
            $output .= "<span style='color: blue'>$input[$i]</span>";
        }

        if ($i !== strlen($input) - 1) {
            $output .= " ";
        }
    }

    echo $output;
}
