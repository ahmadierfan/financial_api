<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Models\m_checkbook;

class MCheckbookController extends Controller
{
    public function justCreate($record)
    {
        $check = m_checkbook::create(
            [
                "fk_registrar" => auth()->user()->id,
                "fk_financialrequesttype" => $record['fk_financialrequesttype'],
                "bank" => $record['bank'],
                "fk_bank" => $record['fk_bank'] ?? null,
                "branch" => $record['branch'],
                "description" => $record['description'],
                "fk_checkbankaccount" => !empty($record['fk_checkbankaccount']) ? $record['fk_checkbankaccount'] : null,
                "fk_payer" => !empty($record['fk_payer']) ? $record['fk_payer'] : null,
                "checknumber" => $record['checknumber'],
                "sayadnumber" => $record['sayadnumber'],
                "checkprice" => $record['price'],
                "duedate" => $record['duedate'],
            ]
        );
        return $check;
    }
    public function justUpdate($record)
    {
        if (isset($record['pk_checkbook']) && !empty($record['pk_checkbook'])) 
        {
            $check = m_checkbook::findOrFail($record['pk_checkbook']);
        

            $check->update(
                [
                    
                    "bank" => $record['bank'],
                    "fk_bank" => $record['fk_bank'] ?? null,
                    "branch" => $record['branch'],
                    "description" => $record['description'],
                    "fk_checkbankaccount" => !empty($record['fk_checkbankaccount']) ? $record['fk_checkbankaccount'] : null,
                    "fk_payer" => !empty($record['fk_payer']) ? $record['fk_payer'] : null,
                    "checknumber" => $record['checknumber'],
                    "sayadnumber" => $record['sayadnumber'],
                    "checkprice" => $record['price'],
                    "duedate" => $record['duedate'],
                ]
            );
            return $check;
        }
    }
}
