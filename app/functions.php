<?php
//nuskaito duomenis is JSON failo
function sortByLastName($a, $b) {
    return $a['surname'] <=> $b['surname'];
}

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
    
    usort($data, 'sortByLastName');
    file_put_contents(DIR.'data/bankAccounts.json', json_encode($data));
}
// paimam indeksa
function getNextId() : int
{
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

function create(array $data) 
{
    $bankAccounts = readData();
    $id = getNextId();
    $account = ['id' => $id, 'balance' => 0];

    $newArray = array_merge($account, $data);

    $bankAccounts[]= $newArray;
    writeData($bankAccounts);
}

function update(int $id, int $count) : void 
{
    $accounts = readData();
    $account = getAccount($id);
    if(!$account) {
        return;
    }
    $account['balance'] = $count;
    deleteAccount($id);
    $accounts = readData();

    $accounts[] = $account;
    writeData($accounts);
}

function deleteAccount(int $id) : void
{
    $accounts = readData();
    foreach($accounts as $key => $account) {
        if ($account['id'] == $id) {
            unset($accounts[$key]);
            writeData($accounts);
            return;
        }
    }

}
function getAccount(int $id) : ?array //grazina array arba null
{
    foreach(readData() as $account) {
        if ($account['id'] == $id) {
            return $account;
        }
    }
    return null;
}

function get_client_info(int $id) : ?string
{
    foreach(readData() as $account) {
        if ($account['id'] == $id) {

            $a= "";
            $a .= $account['name']." ";
            $a .= $account['surname']. " ";
            $a .= $account['balance'];
            return $a;
        }
    }
    return null; 
}

function ibam_generator()
{
    $letter_code = 'LT';
    $bank_code = '70440';
    $two_control_nr = rand(10, 99);
    $IBAN = $letter_code.strval($two_control_nr).$bank_code;
    foreach(range(1,11) as $_) {
        $IBAN .= rand(0,9);
    }

    return $IBAN;
}

// saskaita, pinigai
/*
[
    ['id'=>1, 'saskaitoje'=> 123],
    ['id'=>2, 'saskaitoje'=> 1],
    ['id'=>3, 'saskaitoje'=> 300]
]*/

?>