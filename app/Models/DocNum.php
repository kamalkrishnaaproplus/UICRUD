<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocNum extends Model
{
    protected $table = 'tbl_docnum';
    protected $primaryKey = 'SLNO';
    public $timestamps = false;

    public static function getDocumentNumber($docType)
    {
        $docnum = self::where('DocType', $docType)->first();
    
        if ($docnum) {
            $prefix = $docnum->Prefix;
            $year = date('Y');
            $currNum = $docnum->CurrNum;
            $length = $docnum->Length;
    
            // Increment CurrNum for the next use
            // $docnum->update(['CurrNum' => $currNum + 1]);
    
            // Left-pad CurrNum with zeros based on the specified length
            $paddedCurrNum = str_pad($currNum, $length, '0', STR_PAD_LEFT);
    
            // Concatenate prefix, year, and padded CurrNum
            $documentNumber = $prefix . $year . '-' . $paddedCurrNum;
            return $documentNumber;
        }
    
        return null;
    }
    


    public static function updateDocumentNumber($docType)
    {
        $docnum = self::where('DocType', $docType)->first();

        if ($docnum) {
            $currNum = $docnum->CurrNum;

            // Increment CurrNum for the next use
            $docnum->update(['CurrNum' => $currNum + 1]);
            
            return true; // Return true to indicate success
        }

        return false; // Return false if document number not found
    }


}
