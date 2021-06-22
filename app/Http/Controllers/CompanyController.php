<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('public');
    }

    public function public()
    {
        $companies = Company::where('public', 1)->get();
        return view('company.public')->with('companies', $companies);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        
        $company->vat_number = $request->get('vat_number');
        $company->name = $request->get('name');

        // comprobamos si se envía una imagen en el formulario y la gestionamos en caso de existir. Formamos el nombre según la estructura 'company{id}.extension'
        if($request->hasFile('image')){
            $image = $request->file('image');

            //traemos el id de la última entrada y le sumamos 1
            $lastEntry = Company::all()->last();
            $newId = $lastEntry->id + 1;

            $imageName = 'company' . $newId . '.' . $image->guessExtension();
            $path = storage_path('app/public/');
            $image->move($path, $imageName);
            $company->image = $imageName;
        }

        // mira el estado del checkbox y guarda un boolean en la columna public
        $checkbox = $request->get('public');
        if(isset($checkbox)){
            $company->public = 1;
        }
        else{
            $company->public = 0;
        }

        $company->save();

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::where('company_id', $id)->get();  
        return view('employee.showEmployeesByCompany')->with('employees', $employees);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        
        $company->vat_number = $request->get('vat_number');
        $company->name = $request->get('name');
        
        // comprobamos si se envía una imagen en el formulario y la gestionamos en caso de existir. Formamos el nombre según la estructura 'company{id}.extension'
        if($request->hasFile('image')){
            $image = $request->file('image');

            $imageName = 'company' . $id . '.' . $image->guessExtension();
            $path = storage_path('app/public/');
            $image->move($path, $imageName);
            $company->image = $imageName;
        }
        //dd($company->image);

        // mira el estado del checkbox y guarda un boolean en la columna public
        $checkbox = $request->get('public');
        if(isset($checkbox)){
            $company->public = 1;
        }
        else{
            $company->public = 0;
        }

        $company->save();

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect('/companies');
    }
}
