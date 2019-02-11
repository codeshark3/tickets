<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use App\Category;
use DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    public function index()
    {
        //
          $tickets = Tickets::orderBy('id','desc')->paginate(10); 
        return view('tickets.index')->with('tickets', $tickets);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $categories = Category::orderBy('title', 'asc')->get();
         return view('tickets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

         //validation
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            // 'amount'=>'nullable',
            // 'location'=>'nullable',
            // 'category'=>'nullable',
            // 'contact'=>'nullable',
            'slug'=>'nullable',
            'cover_image' => 'image|nullable|max:1999'

        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
                //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename only
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get extension only
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension; 

            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //create ticket
        $ticket = new Tickets;
        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->user_id = auth()->user()->id;
        $ticket->cover_image = $fileNameToStore;
        $ticket->amount = $request->input('amount');
        $ticket->location = $request->input('location');
        $ticket->category = $request->input('category');
         $ticket->slug = $request->input('slug');
        $ticket->contact = $request->input('contact');
        $ticket->save();

        return redirect('/')->with('success', 'ticket created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $categories = Category::orderBy('title', 'asc')->get();
        $ticket = Tickets::find($id);
        return view('tickets.show', compact('categories'))->with('ticket', $ticket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          $categories = Category::orderBy('title', 'asc')->get();
        $ticket = Tickets::find($id);

        //check for correct user
        if(auth()->user()->id !== $ticket->user_id){
            return redirect('/tickets')->with('error', 'Unauthorized');
        }
        return view('tickets.edit', compact('categories'))->with('ticket', $ticket);
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
            $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);
          //Handle file upload
        if($request->hasFile('cover_image')){
                //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename only
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get extension only
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension; 

            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }


        //update      
        $ticket = Tickets::find($id);
        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
         if($request->hasFile('cover_image')){
            $ticket->cover_image = $fileNameToStore;
         }
        $ticket->save();

        return redirect('/')->with('success', 'ticket updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $ticket = Tickets::find($id);

          if(auth()->user()->id !== $ticket->user_id){
            return redirect('/tickets')->with('error', 'Unauthorized');
        }

         if($ticket->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/cover_images'.$ticket->cover_image);
        }
        $post->delete();
         return redirect('/')->with('success', 'ticket Canceled');

    }


    public function close(Request $request, $id){
          $this->validate($request,[
            'status'=>'required',
            'evaluation'=>'required'
        ]);

          $ticket = Tickets::find($id);
        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
         if($request->hasFile('cover_image')){
            $ticket->cover_image = $fileNameToStore;
         }
        $ticket->save();

        return redirect('/')->with('success', 'ticket updated');
    }
}
