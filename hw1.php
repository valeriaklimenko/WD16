<?php
function sayHello()
{
    echo "Привет!<br>";
}
sayHello();

function sum($a, $b)
{
    return $a + $b;
}
echo sum(100, 300);

function greet($name="Valeria")
{
   echo "<br>Hello, $name!<br>";
}
greet();

function multiplyByTwo($num)
{
    return $num * 2;
}
echo multiplyByTwo(25). "<br>";

$multiplyByTwoArrow = fn($num): int => $num * 2;
echo $multiplyByTwoArrow(50) . "<br>";

$array = [
    "a" => [1, 2, 3, 4],
    "b" => [5, 6]
];
function traverseArray($arr) {
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            traverseArray($value);
        } else {
            echo "$value <br>";
        }
    }
}
traverseArray($array);

$numbers = [1, 2, 3, 4, 5];
$incrementedNumbers = array_map(fn(int $num): int => $num + 1, $numbers);
print_r($incrementedNumbers);
echo "<br>";

$string = "Hello World";
echo strlen($string) . "<br>";
echo strtoupper($string) . "<br>";
echo strtolower($string) . "<br>";

$stack = ["apple", "banana"];
array_push($stack, "cherry");
echo array_pop($stack) . "<br>";
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$mergedArray = array_merge($array1, $array2);
print_r($mergedArray);
echo "<br>";

var_dump(is_string("Hello"));
echo "<br>";
var_dump(is_numeric(123));
echo "<br>";
var_dump(is_array([1, 2, 3]));
echo "<br>";

echo abs(-10) . "<br>";
echo sqrt(16) . "<br>";
echo round(4.6) . "<br>";
echo ceil(4.2) . "<br>";
echo floor(4.8) . "<br>";
echo rand(1, 100) . "<br>";
echo mt_rand(1, 100) . "<br>";

echo date("Y-m-d H:i:s") . "<br>";
echo date("d-m-Y") . "<br>";
echo date("l, F j, Y") . "<br>";

?>

