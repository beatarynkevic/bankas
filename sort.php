<?php
$ar1= [
    "id" => 4,
    "balance" => 0,
    "name" => "Beata",
    "surname" => "Rynkevi",
    "id_number" => "1111",
    "account_number" => "2222"];
$ar2= [
    "id" => 4,
    "balance" => 0,
    "name" => "Beata",
    "surname" => "Abz",
    "id_number" => "3333",
    "account_number" => "4444"];
$ar3= [
    "id" => 4,
    "balance" => 0,
    "name" => "Beata",
    "surname" => "Cmdm",
    "id_number" => "555",
    "account_number" => "666"
];
$tuscias1= [$ar1, $ar2, $ar3];
echo "<pre>";
print_r($tuscias1);
usort($tuscias1, function($a, $b){
    return $a['surname'] <=> $b['surname'];
});
// array_multisort(array_column($tuscias1, 'surname'),SORT_ASC, $tuscias1);
print_r($tuscias1);

?>