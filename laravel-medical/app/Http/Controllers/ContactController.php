<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;

class ContactController extends Controller
{
    // LISTA DE CONTACTOS //
	public function index(){

        $contacts = Contact::Paginate(20);


        return view('index')->with([
             'contacts' => $contacts
        ]);
		
	}

    // PARA CREAR CONTACTO //
    /*
    @request son los datos traidos por el front 
     */
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subname' => 'required',
            'email' => 'required|unique:contacts,email',
            'phone' => 'required|unique:contacts,phone'
        ]);

        if($validator->fails()){
    
            return 'Telefono o correo existentes';

        } else {

            $contact = Contact::create(request()->all());

            return $contact;
        }
    }

}



