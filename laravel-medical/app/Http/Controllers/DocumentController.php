<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Contact;
use Mail;
use App\Mail\EmailReceived;
use App\Mail\EmailSend;

class DocumentController extends Controller
{
    // LISTA DE CONTACTOS //
	public function index(){

        $documents = Document::orderBy('id', 'desc')->paginate(7);


        return view('documents.index')->with([
             'documents' => $documents
        ]);
		
	}

    public function create(Request $request){

        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = time().'.'.$request->file->extension();  
  
        $request->file->move(public_path('uploads'), $fileName);
        

        $document = Document::create([
            'originalName' => $request->file->getClientOriginalName(),
            'serverName' => $fileName,
        ]);

        return back()
            ->with('success','El archivo se ha cargado con exito.')
            ->with('file',$fileName);
    }


    public function send(Request $request){

        $host = request()->getHost(); 

        $document = Document::where('id', $request->documentID)->first();

        if($request->businessType != 'all'){
            
            $contacts = Contact::where('businessType', $request->businessType)->get();

        } else {

            $contacts = Contact::all();

        }

        $message = 'Hemos Actualizado nuestro Catálogo';

        try{

            foreach($contacts as $contact): 
                $user = Mail::to($contact->email)->send(new EmailSend($document['serverName'], $message, $host));

            endforeach;

        } catch(Exception $e){
            echo $e;
        }

        return back()
            ->with('success','El archivo se ha enviado con exito');
                
    }


    public function downloadFile($fileName)
    {
        $myFile = public_path("uploads/".$fileName);
        $headers = ['Content-Type: application/pdf'];
        $newName = 'nicesnippets-pdf-file-'.time().'.pdf';

        return response()->download($myFile, $newName, $headers);
    }	

}

