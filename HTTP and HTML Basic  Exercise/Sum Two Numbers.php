<form>
    <div>First Number:</div>
    <input type="number" name="num1"/>
    <div>Second Number:</div>
    <input type="number" name="num2"/>
    <div><input type="submit"/></div>
</form>

<?php

if (isset($_GET['num1']) && isset($_GET['num2'])){
    $numberOne = htmlspecialchars($_GET['num1']);
    $numberTwo = htmlspecialchars($_GET['num2']);

    $result = $numberOne + $numberTwo;

    echo $numberOne. ' + ' .$numberTwo. ' = ' . $result;
}

