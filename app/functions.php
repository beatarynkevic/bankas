<?php
//nuskaito duomenys is JSON failo
function readData() : array
{
    if(file_exists(DIR.'/data/bankAccounts.json')) {
        $data = json_encode([]);
        file_put_contents(DIR.'/data/bankAccounts.json', $data);
    }
    $data = file_get_contents(DIR.'/data/bankAccounts.json');
    return json_decode($data, 1);
}




?>