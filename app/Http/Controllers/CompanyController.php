<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{

    /*  user added code:  */
    public function __construct() {
        $this->middleware( ['auth', 'verified'] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  user added code  */
        $companies = auth()->user()->companies()->withCount('contacts')->latest()->paginate(5);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*  user added code  */
        $company = new Company();

        return view('companies.create', compact('company'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        /*  user added code  */
        $request->user()->companies()->create($request->all());

        return redirect()->route('companies.index')->with('message', 'Company has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        /*  user added code  */
        return view('companies.show', compact('company') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        /*  user added code  */
        return view('companies.edit', compact('company') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        /*  user added code  */
        $company->update( $request->all() );

        return redirect()->route('companies.index')->with('message', 'Company has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        /*  user added code  */

        $company->delete();

        return redirect()->route('companies.index')->with('message', 'Company has been removed successfully');
    }
}
