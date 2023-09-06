<?php
// 1 - Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line. There will be no hyphen(-) at starting and ending position

$i =1;
while($i<=10){
  
    echo $i++, '-';
}


echo "<br/>";
echo "<br/>";
echo "<br/>";

// 2 - Write a PHP program which iterates the integers from 1 to 50. For multiples of three print "Fizz" instead of the number and for the multiples of five print "Buzz". For numbers which are multiples of both three and five print "FizzBuzz"

$i =1;
while($i<=50){

    if($i % 3 == 0){
        echo "Fizz";
    }elseif($i % 5 == 0) {
        echo "Buzz";
    } elseif($i % 5&3 == 0) {
        echo "FizzBuzz";
    }
     

    echo $i++, " ";
}



echo "<br/>";
echo "<br/>";
echo "<br/>";
// 3 - Create a script using a for loop to add all the integers between 0 and 30 and display the total 

$sum =0; 
for($x=1; $x<=30; $x++){
    $sum +=$x;
}
echo $sum;

echo "<br/>";
echo "<br/>";
echo "<br/>";
// 4 - Write a program to calculate and print the factorial of a number using a for loop. The factorial of a number is the product of all integers up to and including that number
//  Example : the factorial of 4 is 4*3*2*1= 24

$n=6; 
$x=1;
for($i=1; $i<=$n-1; $i++){
    $x*=($i+1);
}
echo $n=$x ;

echo "<br/>";
echo "<br/>";
echo "<br/>";
// Write a PHP program that prints the odd numbers from 1 to 15 using a while loop.
$i =1;
while($i<=15)
{
    if($i % 2 != 0){
    echo $i, " ";
}
$i++;
}

echo "<br/>";
echo "<br/>";
echo "<br/>";


// 6 - Write a PHP program that prints the even numbers from 1 to 15 using a while loop.
$i =1;
while($i<=15)
{
    if($i % 2 == 0){
    echo $i, " ";
}
$i++;
}


echo "<br/>";
echo "<br/>";
echo "<br/>";

// 7 - Write a PHP program that prints all the numbers between 1 and 100 that are divisible by 3 using a do while loop.


$i =1;
do{

    if($i % 3 == 0){
        echo $i, " ";}
    
   
    $i++;
}while($i<=100);



echo "<br/>";
echo "<br/>";
echo "<br/>";


// 8-Make a calculator with these operations using if and else if
$num1 = "jdfkfjd";
$num2 = 0;
$op = "dhjkdsfhjk";
function calc($num1, $num2, $op)
{

    if (is_numeric($num1) && is_numeric($num2)) {
        if ($op == "+") {
            echo $num1 + $num2;
        } elseif ($op == "-") {
            echo $num1 - $num2;
        } elseif ($op == "*") {
            echo $num1 * $num2;
        } elseif ($op == "/") {
            if ($num2 == 0) {
                echo "Not Allowed";
            } else {
                echo $num1 / $num2;
            }
        } elseif ($op == "**") {
            echo $num1 ** $num2;
        } elseif ($op == "%") {
            if ($num2 == 0 || $num2 > $num1) {
                echo "Not Allowed";
            } else {
                echo $num1 % $num2;
            }
        } else {
            echo $num1 + $num2;
        }
    } else {
        echo "Not Allowed Data Type";
    }
}
calc(15,10,"*");

