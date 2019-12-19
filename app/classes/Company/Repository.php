<?php

namespace App\Company;




class Repository
{

    protected $model;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->model = new \App\Company\Model;
    }

    /**
     * Checks if $company exists
     * @param company $company
     * @return bool
     */
    public function exists(company $company)
    {
        if ($this->model->load($company->getData())) {
            return true;
        }
        return false;
    }


    /**
     * Inserts company to database if it does not exist
     * @param company $company
     * @return mixed jei irase - negrazins nieko, jei neirase grazins false
     */
    public function insert(Company $company)
    {

        return $this->model->insertIfNotExists(
            $company->getData(), ['code','jarCode']);
    }

    /**
     * @param array $array
     * @return array
     */
    public function load($array = [])
    {

        $rows = $this->model->load($array);
        $companies = [];

        foreach ($rows as $row) {

            $company = new  Company($row);
            $companies[] = $company;
        }


        return $companies;
    }

    /**
     * @return array
     */
    public function loadAll()
    {
        $rows = $this->model->load();
        $companies = [];

        foreach ($rows as $row) {
            $company = new company($row);
            $company->setId($row['id']);
            $companies[] = $company;
        }

        return $companies;
    }

    /**
     * Updates user in database based on its id
     * @param Company $company
     * @return boolean true jei irase, false jei ne
     */
    public function update(company $company)
    {
        return $this->model->update($company->getData(), [
            'id' => $company->getId()
        ]);
    }

    /**
     * Deletes user from database based on its email
     * @param Company $company
     * @return boolean true jei irase, false jei ne
     */
    public function delete(Company $company)
    {
        return $this->model->delete([
            'id' => $company->getId()
        ]);
    }

    /**
     * Deletes all users from database
     */
    public function deleteAll()
    {
        return $this->model->delete();
    }


    public function export($name,$array = [])
    {
        $rows = $this->model->exportToCsv($name,$array = []);
    }

}