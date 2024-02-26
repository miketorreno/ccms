<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lawyer.document');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'document' => 'required|mimes:csv,txt,xlx,xls,doc,docx,pdf|max:2048'
        // ]);
        // dd($request->file('document'));
        $fileModel = new Document;
        if($request->file('document')) {
            $fileName = time().'_'.$request->file('document')->getClientOriginalName();
            $filePath = $request->file('document')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$request->file('document')->getClientOriginalName();
            $fileModel->path = '/storage/' . $filePath;
            $fileModel->court_case_id = $request->get('court_case_id');
            $fileModel->description = $request->get('description');
            $fileModel->save();

            // return redirect()->back();
            return redirect()->route('lawyer.cases.show', [$request->get('court_case_id')]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
