<?php

namespace App\Http\Controllers\Company\Repository\Interface;

interface IRepositoryCompany
{
    /**
     * get company
     * @params
     * array $where
     *
     * @return
     * object | null
     */
    public function getCompany(
        array $where
    ) : object | null;

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
    ) : object;

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
    ) : int | bool;

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
    ) : int | bool;
}
