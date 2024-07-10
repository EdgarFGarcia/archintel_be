<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * service concrete class
 */
use App\Http\Controllers\Company\Service\ServiceCompany;

/**
 * validation inject
 */
use App\Http\Controllers\Company\Validation\AddCompany;

class CompanyController extends Controller
{
    /**
     * class properties
     */
    protected $service_company;

    /**
     * DIP
     * @App\Http\Controllers\Company\Service\ServiceCompany
     */
    function __construct(
        ServiceCompany $service_company
    ){
        $this->service_company = $service_company;
    }

    /**
     * add a company
     * @params
     * Request $request
     *
     * @inject
     *
     * @return
     * object
     */
    public function addCompany(
        AddCompany $request
    ) : object | null{
        try{
            $add_company = $this->service_company->addCompany($request->validated());
            if($add_company){
                return response()->json([
                    'response'  => true,
                    'message'   => 'Adding a company, successful!'
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => "something went wrong!"
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * get company list
     * @params
     * none
     *
     * @return
     * object
     */
    public function getCompanies() : object | array{
        try{
            $companies = $this->service_company->getCompany();
            if($companies){
                return response()->json([
                    'response'  => true,
                    'data'      => $companies
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'data'      => []
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * get company
     * @urlparans
     * int $company_id
     *
     * @return
     * object
     */
    public function getCompany(
        int $company_id
    ) : object | array{
        try{
            $companies = $this->service_company->getCompany(['id' => $company_id]);
            if($companies){
                return response()->json([
                    'response'  => true,
                    'data'      => $companies
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'data'      => []
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }
}
