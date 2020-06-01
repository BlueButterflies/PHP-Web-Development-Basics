<?php
$personAge = [];
$personSalary = [];
$personPosition = [];

 while (true){
     $input = explode(" -> ", readline());

     if ($input[0] == "filter base"){
         break;
     }
     $name = $input[0];

     if(filter_var($input[1], FILTER_VALIDATE_INT)){
         $age = $input[1];
         $personAge[$name] = $age;
     }
     elseif(filter_var($input[1], FILTER_VALIDATE_FLOAT)){
         $salary = $input[1];
         $personSalary[$name] = $salary;
     }
     else{
         $position = $input[1];
         $personPosition[$name] = $position;
     }
 }

 $filter = readline();

 switch ($filter){
     case"Age":
         foreach ($personAge as $name => $age) {

             echo "Name: ". $name . PHP_EOL;
             echo "Age: ". $age . PHP_EOL;
             echo str_repeat("=", 20).PHP_EOL;
         }
         break;
     case"Position":
         foreach ($personPosition as $name => $position) {

             echo "Name: ". $name . PHP_EOL;
             echo "Position: ". $position . PHP_EOL;
             echo str_repeat("=", 20).PHP_EOL;
         }
         break;
     case"Salary":
         foreach ($personSalary as $name => $salary) {

             echo "Name: ". $name . PHP_EOL;
             printf("Salary: %.02f" . PHP_EOL, $salary);
             echo str_repeat("=", 20). PHP_EOL;
         }
         break;
 }