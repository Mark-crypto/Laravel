<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Problems;
use App\Models\Requests;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                return view('renters');
            } else if ($usertype == 'admin') {
                $tenants = Tenant::all();
                return view("dashboard", ['tenants' => $tenants]);
            } else {
                return redirect()->back();
            }
        }
    }
    public function getProblems()
    {
        $problems = Problems::all();
        return view("getproblems", ['problems' => $problems]);
    }
    public function getAccess()
    {
        return view("request");
    }
    public function receiveReq()
    {
        $requests = Requests::all();
        return view("display", ['requests' => $requests]);
    }
    public function storeAccess(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'national_ID' => 'required',
            'house_no' => 'required',
            'email' => 'required'

        ]);
        $newRequest = Requests::create($data);
        return redirect(route('login'));
    }
    // public function index()
    // {
    //     $tenants = Tenant::all();
    //     return view("dashboard", ['tenants' => $tenants]);
    // }
    public function rent()
    {
        return view("renters");
    }
    public function payment()
    {
        return view("payment");
    }
    public function storePayment(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phoneNo' => 'required',
            'amount' => 'required',
            'houseNo' => 'required'

        ]);
        $newPayment = Payment::create($data);
        return redirect(route('renters'));
    }
    public function problems()
    {
        return view("problems");
    }
    public function storeProblems(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'apartmentNo' => 'required',
            'issue' => 'required',
            'information' => 'required'

        ]);
        $newProblem = Problems::create($data);
        return redirect(route('renters'));
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
    public function sendEmail(Requests $request)
    {
        //$requests = Requests::all();
        $email = "mark.onyango@strathmore.edu";
        $subject = 'APPROVAL TO JOIN MADARAKA APT TENANT SYSTEM';
        $message = 'Your request has been approved you will receive a password change email within 24 hours.';
        mail($email, $subject, $message);
        return redirect(route('receive'));
    }
}
