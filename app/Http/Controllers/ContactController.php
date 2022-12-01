<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contacts = Contact::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        // return view('home', compact('contacts'));

        $contacts = Contact::all();
        return view('home', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);

        $contacts = new Contact;
        $contacts->name = $request->input('name');
        $contacts->mobile = $request->input('mobile');

        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('media', $fileName, 'public');
        $contacts['photo'] = '/storage/'.$path;

        $contacts->user_id = Auth::user()->id;

        $contacts->save();

        return back()->with('success', 'Item created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = Contact::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view('delete', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view('edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
        ]);
        $contacts = Contact::findOrFail($id);
        $contacts->name = $request->input('name');
        $contacts->mobile = $request->input('mobile');
        if($request->hasfile('photo')){
            
            $path=public_path($contacts->photo);
            if(File::exists($path)){
                File::delete($path);
            }
            
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('media', $fileName, 'public');
            $contacts ['photo'] = '/storage/'.$path;

        }

        $contacts->user_id = Auth::user()->id;
        
        $contacts->save();
        return back()->with('success', 'Item updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = Contact::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        unlink(public_path($contacts->photo));
        $contacts->delete();
        // ls -la |wc -l
        return redirect()->route('contact.index')->with('success', 'Item deleted successfully');
    }
}