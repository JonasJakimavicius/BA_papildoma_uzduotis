<?php

namespace App\Company;

class Model extends \Core\Database\Model
{

    public function __construct()
    {
        parent::__construct('companies_table', [
//            [
//                'name' => 'id',
//                'type' => self::NUMBER_MED,
//                'flags' => [self::FLAG_NOT_NULL, self::FLAG_PRIMARY, self::FLAG_AUTO_INCREMENT]
//            ],
            [
                'name' => 'code',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],
            [
                'name' => 'jarCode',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],
            [
                'name' => 'name',
                'type' => self::TEXT_SHORT,
                'flags' => []
            ],
            [
                'name' => 'municipality',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],
            [
                'name' => 'ecoActCode',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],
            [
                'name' => 'ecoActName',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],

//            [
//                'name' => 'shortname',
//                'type' => self::TEXT_SHORT,
//                'flags' => []
//            ],
            [
                'name' => 'month',
                'type' => self::NUMBER_LONG,
                'flags' => []
            ],
            [
                'name' => 'avgWage',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],
            [
                'name' => 'numInsured',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],
            [
                'name' => 'avgWage2',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],

            [
                'name' => 'numInsured2',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],
            [
                'name' => 'tax',
                'type' => self::TEXT_LONG,
                'flags' => []
            ],



        ]);
    }
}