<?php

namespace App\Company;


class Company
{
    private $data;

    /**
     * Comment constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        if ($data === null) {
            $this->data = [
                'code' => null,
                'jarCode' => null,
                'name' => null,
                'shortName' => null,
                'month' => null,
                'avgWage' => null,
                'avgWage2' => null,
                'numInsured' => null,
                'numInsured2' => null,
                'tax' => null,
                'ecoActName' => null,
                'ecoActCode' => null,
                'municipality' => null,
            ];
        } else {
            $this->setData($data);

        }
    }

    public function setCode($code)
    {

        $this->data['code'] = $code;
    }


    public function getCode()
    {
        return $this->data['code'];
    }

    public function setJarCode($jarCode)
    {

        $this->data['jarCode'] = $jarCode;
    }


    public function getJarCode()
    {
        return $this->data['jarCode'];
    }

    public function setName($name)
    {

        $this->data['name'] = $name;
    }


    public function getName(): string
    {
        return $this->data['name'];
    }

    public function setShortName($shortName)
    {

        $this->data['shortName'] = $shortName;
    }


    public function getShortName()
    {
        return $this->data['shortName'];
    }


    public function getMonth()
    {
        return $this->data['month'];
    }

    public function setMonth($month)
    {
        $this->data['month'] = $month;
    }

    public function getAvgWage()
    {
        return $this->data['avgWage'];
    }

    public function setAvgWage($avgWage)
    {
        $this->data['avgWage'] = $avgWage;
    }

    public function getAvgWage2()
    {
        return $this->data['avgWage2'];
    }

    public function setAvgWage2($avgWage2)
    {
        $this->data['avgWage2'] = $avgWage2;
    }

    public function getNumInsured()
    {
        return $this->data['numInsured'];
    }

    public function setNumInsured($numInsured)
    {
        $this->data['numInsured'] = $numInsured;
    }

    public function getNumInsured2()
    {
        return $this->data['numInsured2'];
    }

    public function setNumInsured2($numInsured2)
    {
        $this->data['numInsured2'] = $numInsured2;
    }

    public function getTax()
    {
        return $this->data['tax'];
    }

    public function setTax($tax)
    {
        $this->data['tax'] = $tax;
    }

    public function getEcoActName()
    {
        return $this->data['ecoActName'];
    }

    public function setEcoActName($ecoActName)
    {
        $this->data['ecoActName'] = $ecoActName;
    }

    public function getEcoActCode()
    {
        return $this->data['ecoActCode'];
    }

    public function setEcoActCode($ecoActCode)
    {
        $this->data['ecoActCode'] = $ecoActCode;
    }

    public function getMunicipality()
    {
        return $this->data['municipality'];
    }

    public function setMunicipality($municipality)
    {
        $this->data['municipality'] = $municipality;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function setId($id)
    {
        $this->data['id'] = $id;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->setCode($data['code']);
        $this->setJarCode($data['jarCode']);
        $this->setName($data['name']);
        $this->setMonth($data['month']);
        $this->setAvgWage($data['avgWage']);
        $this->setAvgWage2($data['avgWage2']);
        $this->setNumInsured($data['numInsured']);
        $this->setNumInsured2($data['numInsured2']);
        $this->setTax($data['tax']);
        $this->setEcoActName($data['ecoActName']);
        $this->setEcoActCode($data['ecoActCode']);
        $this->setMunicipality($data['municipality']);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}