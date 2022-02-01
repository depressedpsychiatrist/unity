<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('users')->get();
        return view('company.index', compact(['companies']));
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
        $company_data = $request->validated();
        $company = Company::create($company_data);
        return redirect(route('company.show', $company->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', compact(['company']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.update', compact(['company']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company_data = $request->validated();
        $company->update($company_data);
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     * Remove all the attached users first
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        foreach ($company->users as $user) {
            $this->detachUser($company, $user);
        }
        $company->delete();
        return redirect()->back();
    }

    /**
     * Show the form for attaching users to company.
     *
     * @return \Illuminate\Http\Response
     */
    public function addUsers(Company $company)
    {
        $users = User::orderBy('name', 'DESC')->get();
        return view('company.addUsers', compact(['company', 'users']));
    }

    /**
     * Attach every user from the array to the company
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function attachUsers(Request $request, Company $company)
    {
        $users = $request->validate(['users' => 'required']);
        $company->users()->sync($users['users']);
        return redirect(route('company.show', $company));
    }

    /**
     * Detach user from the company
     *
     * @param  \App\Models\Company  $company
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function detachUser(Company $company, User $user)
    {
        $company->users()->detach($user);
        return redirect()->back();
    }
}
