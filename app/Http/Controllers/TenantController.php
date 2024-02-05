<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Problems;
use App\Models\Requests;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    //Authorization based on the user's role
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
    //Getting problems reported by renters
    public function getProblems()
    {
        $problems = Problems::all();
        return view("getproblems", ['problems' => $problems]);
    }
    //Page to request addition to system
    public function getAccess()
    {
        return view("request");
    }
    //Admin receives requests to get system access
    public function receiveReq()
    {
        $requests = Requests::all();
        return view("display", ['requests' => $requests]);
    }
    //Storing details of person making request to join system
    public function storeAccess(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'national_ID' => 'required',
            'house_no' => 'required',
            'email' => 'required'

        ]);
        Requests::create($data);
        return redirect(route('login'));
    }
    // Get list of all renters in system
    public function rent()
    {
        return view("renters");
    }
    // Form for renters to make payment of rent
    public function payment()
    {
        return view("payment");
    }
    //Collecting and storing to database information on payment
    public function storePayment(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phoneNo' => 'required',
            'amount' => 'required',
            'houseNo' => 'required'

        ]);
        Payment::create($data);
        return redirect(route('renters'));
    }
    // Admin views problems raised by Renters
    public function problems()
    {
        return view("problems");
    }
    // Renter's problem raised stored to the database
    public function storeProblems(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'apartmentNo' => 'required',
            'issue' => 'required',
            'information' => 'required'

        ]);
        Problems::create($data);
        return redirect(route('renters'));
    }
    //Admin can create system users and give permissions
    public function create()
    {
        return view("addUsers");
    }
    //Information on renters stored in the database
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
        Tenant::create($data);
        return redirect(route('dashboard'));
    }
    //Edit tenant information by Admin
    public function edit(Tenant $tenant)
    {
        return view('edit', ['tenant' => $tenant]);
    }
    //Update tenant information after editing in the database
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
    //deleting a renter from the system 
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect(route('dashboard'))->with('Success', 'Tenant deleted successfully!!!');
    }
    //Getting a CSV report from database
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
// public function sendEmail(Requests $request)
// {
//     //$requests = Requests::all();
//     $email = "";
//     $subject = '';
//     $message = '';
//     mail($email, $subject, $message);
//     return redirect(route('receive'));
// }
