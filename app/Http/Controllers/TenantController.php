<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view("dashboard", ['tenants' => $tenants]);
    }
    public function create()
    {
        return view("addUsers");
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'national_ID' => 'required',
            'house_no' => 'required',
            'date_joined' => 'required',
            'balance' => 'required',

        ]);
        $newTenant = Tenant::create($data);
        return redirect(route('dashboard'));
    }
    public function edit(Tenant $tenant)
    {
        return view('edit', ['tenant' => $tenant]);
    }
    public function update(Tenant $tenant, Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'national_ID' => 'required',
            'house_no' => 'required',
            'date_joined' => 'required',
            'balance' => 'required',

        ]);
        $tenant->update($data);
        return redirect(route('dashboard')); //->with('Success', 'Tenant updated successfully!!!');
    }
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect(route('dashboard'))->with('Success', 'Tenant deleted successfully!!!');
    }
    public function generateCsv()
    {
        $tenants = Tenant::all();
        $filename = "Tenants.csv";
        $fp = fopen($filename, 'w+');
        fputcsv($fp, array('First name', 'Last name', 'National ID', 'House No', 'Balance'));

        foreach ($tenants as $tenant) {
            fputcsv($fp, array($tenant->fname, $tenant->lname, $tenant->national_ID, $tenant->house_no, $tenant->balance));
        }
        fclose($fp);
        $headers = array('Content-Type' => 'text/csv');
        return response()->download($filename, "Tenants.csv", $headers);
    }
}
