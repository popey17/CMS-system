<?php

namespace App\Http\Controllers;
use App\Models\company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function showCompanyRegistrationForm()
    {
        if (Company::exists()) {
            return redirect()->route('customer');
        }
        return view('company.register');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'address' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'website' => ['string', 'max:255'],
        ]);


        if(isset($request['logo']) && $request['logo'] != null) {
            $imageName = time().'.'.$request['logo']->extension();  
            $request['logo']->move(public_path('img/company/'), $imageName);
        }else {
            $imageName = null;
        }
            $company = new company();
            $company->name = $request->name;
            $company->logo = $imageName;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->phone = $request->phone;
            $company->website = $request->website;
            $company->save();

        return redirect('/customer');
    }

    public function edit($id)
    {
        $company = company::find($id);
        return view('company.edit',['company'=>$company]);
    }

    public function update($id ,Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'website' => ['string', 'max:255'],
        ]);


        if(isset($request['logo']) && $request['logo'] != null) {
            $imageName = time().'.'.$request['logo']->extension();  
            $request['logo']->move(public_path('img/company/'), $imageName);
        }else {
            $imageName = null;
        }

            $company = company::find($id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->phone = $request->phone;
            $company->website = $request->website;
            if(isset($request['logo']) && $request['logo'] != null) {
                $company->logo = $imageName;
            }
            $company->save();

        return redirect('/dashboard')->with('success', 'Company data has been updated');
    }
}
