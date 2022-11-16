<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        //$companies = Company::all();
        $companies = DB::table('companies')->get();
        if(count($companies)>0){
            return response()->json([
                "data" => $companies
            ]);
        }else{
            return response()->json([
                "message" => "No data found",
            ],404);
        }
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->role == 2 || $user->role == 1 ){
            if (Request::capture()->expectsJson())
            {  
                $request->validate([
                    'name' => ['required'],
                    'company_code' => ['required'],
                    'type' => ['required', Rule::in(['UAB','uab','VsI','vsi','VšĮ','všį'])],
                    'email' => ['required'],
                    'city' => ['required'],
                    'postal_code' => ['required'],
                    'address' => ['required']
                ]);
                //Iterpia i duomenu baze
                $temp =  Company::create($request->all());

                return response()->json([
                    "data" => array_merge($request->all(), ['id'=> $temp["id"]])
                ],201);
            }
            else
            {  
                return response()->json([
                    "message" => "Miss header accept application/json",
                ],403);    
            }
        }else{
            return response()->json([
                "unauthorized"
            ],403);
        }
    }
    public function show($company)
    {
        $temp = Company::find($company);
        if(is_null($temp)){
            return response()->json([
                "message" => "Data not found"
            ],404);
        }else{
            return response()->json([
                "data" => $temp
            ]);
        }
    }
    public function update($id,Request $request)
    {
        $user = Auth::user();
        if($user->role == 2 || $user->role == 1 ){
            if (Request::capture()->expectsJson()  )
            {  
                $temp = Company::find($id);
                if(is_null($temp)){
                    return response()->json([
                        "message" => "Company not found"
                    ],404);
                }

                json_decode($request->getContent());

                if (json_last_error() != JSON_ERROR_NONE) {
                    // There was an error
                    return response()->json([
                        "message" => "Bad json"
                    ],400);
                }

                $request->validate([
                    'name' => ['sometimes','required', 'string'],
                    'company_code' => ['sometimes','required', 'int'],
                    'type' => ['sometimes','required', Rule::in(['UAB','uab','VsI','vsi','VšĮ','všį'])],
                    'email' => ['sometimes','required', 'mail'],
                    'city' => ['sometimes','required', 'string'],
                    'postal_code' => ['sometimes','required', 'int'],
                    'address' => ['sometimes','required', 'string']
                ]);

                $temp->update($request->all());

                return response()->json([
                    "data" => $request->all(),
                    "UpdatedCompany" =>   $temp
                ]);
            }
            else
            {  
                return response()->json([
                    "message" => "Miss header accept application/json",
                ],403);    
            }
        }else{
            return response()->json([
                "unauthorized"
            ],403);
        }
        // $company->update( $request->all());
        // return new \Illuminate\Http\JsonResponse([
        //     'data' => 'updated'
        // ]);
    }
    public function destroy($id, Company $company)
    {
        $user = Auth::user();
        if($user->role == 2){
            $temp = Company::find($id);
            if($temp){
                $result = $temp->forceDelete();
                return new \Illuminate\Http\JsonResponse([
                    'message'=> 'company deleted',
                    'data' => $temp
                ]);
            }else{
                return new \Illuminate\Http\JsonResponse([
                    'message'=> 'Company not found'
                ],404);
            }
        }else{
            return response()->json([
                "unauthorized"
            ],403);
        }
    }
























}
