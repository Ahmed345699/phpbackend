<?php
// 1.	A program that calculates the average of the numbers in an array of n elements. The array is filled with random numbers. 

$num = [10,20 ,30,40,50];
echo array_sum($num)/count($num);

echo "<br/>";
echo "<br/>";
echo "<br/>";
// 2.	A program in which an array contains 10 numbers and another array 2D of size 2x5. What is required is that the second array is dictated by the first array.
echo "<br/>";
echo "<br/>";
echo "<br/>";


// 3.	A program in which an array of a group of numbers and print the largest and smallest number
// INPUT: 
// $array = [ 1,10,5,2,11]
// OUTPUT: 
// Largest number is: 11
// Smallest number is: 1

$array = [ 1,10,5,2,11];

$min= min($array);
echo "Smallest number is: ".$min;
echo "<br/>";
$max= max($array);
echo "Largest number is: ".$max;


echo "<br/>";
echo "<br/>";
echo "<br/>";
// 4.	The program, in which an array contains 10 numbers, and you store a number and calculates how many numbers are greater  than or equal and how many numbers are smaller  than this number inside.
// INPUT: 
// $array = [ 1,10,5,2,11]
// $x = 3
// OUTPUT: 
// Numbers Smaller than (3) = 2 
// Numbers Greater then (3) = 3
echo "<br/>";
echo "<br/>";
echo "<br/>";


// 5.	Create a function that takes an array of names and returns an array where only the first letter of each name is capitalized.
// INPUT: 
// Array_of_names(["eraasoft", "eraasoft", "group313"]) 
// OUTPUT: 
//  ["EraaSoft", "Backend", "Group313"]


$Array_of_names = ['eraasoft', 'eraasoft', 'group313'];

$newArr = [];

foreach ($Array_of_names as $str) {
    $newArr[] = ucfirst($str);
}

print_r($newArr);

echo "<br/>";
echo "<br/>";
echo "<br/>";


// 6.	Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements. Note that you must do this in-place without making a copy of the array.
// INPUT: 
// nums = [0,1,0,3,12] 
// OUTPUT:
//  nums = [1,3,12,0,0]


function pushZerosToEnd(&$arr, $n)
{
    $count = 0;
 
  
    for ($i = 0; $i < $n; $i++)
        if ($arr[$i] != 0)
           
            $arr[$count++] = $arr[$i];
 
    while ($count < $n)
        $arr[$count++] = 0;
}
 

$arr = array(0,1,0,3,12);
$n = sizeof($arr);
pushZerosToEnd($arr, $n);
echo " nums = " ;
   
 
for ($i = 0; $i < $n; $i++)
echo $arr[$i] . " ";

echo "<br/>";
echo "<br/>";
echo "<br/>";


// 7.	Write a function that searches an array of names (unsorted) for the name "Bob" and returns the location in the array. If Bob is not in the array, return -1.
// INPUT: 
// $names = ["Alice", "Bob", "Charlie", "Dave"]
// $names = ["Alice", "Charlie", "Dave"]
// OUTPUT:
// 1
// -1


$names1 = ["Alice", "Bob", "Charlie", "Dave"];
$names2 = ["Alice", "Charlie", "Dave"];

$result=array_diff($names1,$names2);
print_r($result);
 if($names1[0][1]){
    echo "1";
 }else{
    
 }
 



 echo "<br/>";
 echo "<br/>";
 echo "<br/>";
 

 
// 8.	Create a function that takes a array of numbers and returns the second largest number.
// INPUT: 
// $numbers = [11, 55, 2, 3, 4, 5, 6, 7, 8, 9, 10]
// OUTPUT:
// 11



function findSecondLargest(array $arr){

  sort($arr);

  $secondLargest = $arr[sizeof($arr)-2];
  
  return $secondLargest;
}


$numbers = array(11, 55, 2, 3, 4, 5, 6, 7, 8, 9, 10);

echo "number : ".findSecondLargest($numbers);
    
// 9.	A program containing an array of different numbers and store a number $x If the number is not in the array prints not found and if it exists prints found and prints this number characteristics like
// ●	Positive or Negative 
// ●	How many digits are in this number 
// ●	Is-Prime or not. 
// ●	odd or even
// ●	read from the right as the left or not such as "505"
// INPUT: 
// $numbers = [11, 55, 24, 43, 44, 545, 6, 777, 810, 94, 140] $ x = 545
// $numbers = [11, 55, 24, 43, 44, 545, 6, 777, 810, 94, 140] $ x = 1000
// OUTPUT:
// Found, Positive, not prime, odd , Yes 🡺 read from the right as the left

