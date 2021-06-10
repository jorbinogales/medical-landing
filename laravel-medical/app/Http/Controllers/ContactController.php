<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Document;
use Validator;
use Mail;
use App\Mail\EmailReceived;
use App\Mail\EmailSend;


class ContactController extends Controller
{
    // LISTA DE CONTACTOS //
	public function index(){

        

        $contacts = Contact::orderBy('id', 'desc')->paginate(7);


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
            'business' => 'required',
            'businessType' => 'required',
            'email' => 'required|unique:contacts,email',
            'phone' => 'required|unique:contacts,phone'
        ]);

        $contact = Contact::create(request()->all());

        $document = Document::latest()->first();

        try{
             $owner = Mail::to('juan@amedicalcdr.com')->send(new EmailReceived($contact));
        } catch (Exception $e){
            echo $e;
        }
        
        try{
             $user = Mail::to($contact->email)->send(new EmailSend($document, 'Descarga nuestro Catálogo'));
        } catch (Exception $e){
            echo $e;
        }

        return $contact;
    }

}


