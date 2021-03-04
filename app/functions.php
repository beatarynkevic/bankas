<?php
//nuskaito duomenis is JSON failo
function readData() : array
{
    if(!file_exists(DIR.'data/bankAccounts.json')) {
        $data = json_encode([]);
        file_put_contents(DIR.'data/bankAccounts.json', $data);
    }
    $data = file_get_contents(DIR.'data/bankAccounts.json');
    return json_decode($data, 1);
}
//iraso duomenis
function writeData(array $data) : void
{
    file_put_contents(DIR.'data/bankAccounts.json', json_encode($data));
}
// paimam indeksa
function getNextId()
{ //kai neegzistuoja
    if(!file_exists(DIR.'data/indexes.json')) {
        $index = json_encode(['id' => 1]);
        file_put_contents(DIR.'data/indexes.json', $index);
    }
    $index = file_get_contents(DIR.'data/indexes.json');
    $index = json_decode($index, 1);
    $id = (int) $index['id'];
    $index['id'] = $id +1;
    $index = json_encode($index);
    file_put_contents(DIR.'data/indexes.json', $index);
    return $id;
}

function create(int $count) : void
{
    $bankAccounts = readData();
    $id = getNextId();
    $account = ['id' => $id, 'saskaitoje' => $count];
    $bankAccounts[] = $account;
    writeData($bankAccounts);

}

// saskaita, pinigai
/*
[
    ['id'=>1, 'saskaitoje'=> 123],
    ['id'=>2, 'saskaitoje'=> 1],
    ['id'=>3, 'saskaitoje'=> 300]
]*/


?>