<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Company;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /*  user added code */

    public function __construct()
    {
        $this->middleware( ['auth', 'verified'] );
    }


    /*  user added code  */

    /*  user added code */
    public function index( ){

        /* for authentication purposes */

        $user = auth()->user();

        /* to display the contacts in the view */

        $companies = Company::userCompanies() ;

        /* $user->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', ''); */

        /* Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '') ; */

        // for debuging queries: \DB::enableQueryLog();

        $contacts = $user->contacts()->with('company')->latestFirst()->paginate(4);  /* .....contacts()->with('company')....  */
        /*  Contact::latestFirst()->paginate(4);  */


        //  for debuging queries: dd(\DB::getQueryLog());
        return view('contacts.index', compact('contacts', 'companies'));
    }

        /*  user added code */
    public function create( ){
        $contact = new Contact();

        $companies = Company::userCompanies(); /* using the local method  $this->  */
        /* oroginal line:  Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '') ;  */

        return view('contacts.create', compact('companies', 'contact'));
    }


    protected function  userCompanies(){
        return auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
    }

    public function store(ContactRequest $request){ /*  Request $request  */

        // $request->validate ( validationRules() );

        Contact::create($request->all() + ['user_id' => auth()->id()]);

        return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");

    }

    public function update(Contact $contact, ContactRequest $request){  /* Request $request   */

        // $request->validate ( validationRules() );

        // $contact = $this->findContact($id); // Contact::findOrFail($id) ;
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been updated successfully");

    }

    /*  protected function validationRules(){

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ];
    }  */

    public function edit(Contact $contact){
        // $contact = $this->findContact($id) ; // Contact::findOrFail($id) ;

        $companies = Company::userCompanies();

        /* auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '') ; */

        /*  oroginal line:  Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '')  */

        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function destroy(Contact $contact){
        // $contact = $this->findContact($id) ; //Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', "Contact has been successfully deleted");
    }

    public function show(Contact $contact){
        // $contact = $id ; // $this->findContact($id); /*   Contact::findOrFail($id);  */
        return view('contacts.show', compact('contact')) ;
    }

    protected function findContact($id){
        return Contact::findOrFail($id);
    }

}
