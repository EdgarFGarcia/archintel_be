<?php

namespace App\Http\Controllers\Company\Service;

/**
 * service interface
 */
use App\Http\Controllers\Company\Service\Interface\IServiceCompany;

/**
 * repository concrete class
 */
use App\Http\Controllers\Company\Repository\RepositoryCompany;

class ServiceCompany implements IServiceCompany
{
    /**
     * class properties
     */
    protected $repo_company;

    /**
     * DIP
     * @App\Http\Controllers\Company\Repository\RepositoryCompany
     */
    function __construct(
        RepositoryCompany $repo_company
    ){
        $this->repo_company = $repo_company;
    }

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
        if(is_null($where)){
            return $this->repo_company->getCompany([])->with('getStatus')->get();
        }
        return $this->repo_company->getCompany($where)->with('getStatus')->first();
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
        return $this->repo_company->addCompany($data);
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
        return $this->repo_company->updateCompany($data, $company_id);
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
        return $this->repo_company->deleteCompany($company_id);
    }
}
