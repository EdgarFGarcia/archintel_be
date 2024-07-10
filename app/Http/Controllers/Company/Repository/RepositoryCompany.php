<?php

namespace App\Http\Controllers\Company\Repository;

/**
 * repository interface
 */
use App\Http\Controllers\Company\Repository\Interface\IRepositoryCompany;

/**
 * model class
 */
use App\Models\Company;

class RepositoryCompany implements IRepositoryCompany
{
    /**
     * get company list
     * @params
     * array $where
     *
     * @return
     * object | null
     */
    public function getCompany(
        array $where = null
    ) : object | null{
        return Company::where($where);
    }

    /**
     * add company
     * @params
     * array $data
     *
     * @return
     * object
     */
    public function addCompany(
        array $data
    ) : object{
        return Company::create($data);
    }


    /**
     * update company information
     * @params
     * array $data,
     * int $company_id
     *
     * @return
     * int | bool
     */
    public function updateCompany(
        array $data,
        int $company_id
    ) : int | bool{
        return Company::where('id', $company_id)
        ->update($data);
    }

    /**
     * delete company
     * @params
     * int $company_id
     *
     * @return
     * int | bool
     */
    public function deleteCompany(
        int $company_id
    ) : int | bool{
        return Company::where('id', $company_id)->delete();
    }
}
