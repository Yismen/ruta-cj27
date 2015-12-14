<?php

namespace App\Http\Controllers;


// use App\Http\Requests;
use Mail;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessagesRequest;

class MessagesController extends Controller
{

    public function __construct() {
        $this->middleware("authorization:staff", ['except'=>['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Message $messages, Request $requests)
    {
        if ($requests->has('status')) {
            if ($requests->get('status') == 'pending') {
                $messages = $messages->where('viewed', 0);
            } elseif ($requests->get('status') == 'viewed') {
                $messages = $messages->where('viewed', 1);
            }            
        } else {
            $messages = $messages->where('viewed', 0);
        }

       $messages = $messages->paginate(15)->appends(['status' => $requests->get('status')]);

        return view('messages.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Message $newmessage, MessagesRequest $requests)
    {
        // return $requests->all();
        // $data = ['subject'=>'Some Subject'];

        $sent = Mail::send('emails.website', ['data' => $requests->all()], function ($message) use ($requests) {
            $message->from($requests->get('email'), $requests->get('name'))
                ->to('cperchaz@hotmail.com', 'Carlos Perez') // Main receiver should be carlos
                ->cc('yismen.jorge@gmail.com', 'Yismen Jorge') // Copy me jus tin case
                ->subject(ucwords($requests->get('subject')));
        });

        $newmessage = $newmessage->create($requests->all());

        if ($requests->ajax()) {
           return response()->json(['success'=>1, 'message'=>$newmessage]);
        }
        
        return redirect()->route('site.route')
            ->withSuccess("Your message has been received and we will get in touch with you shortly!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Message $message)
    {
       $toggle = $message->viewed ? 0 : 1;
        $message->viewed = $toggle;
        $message->save();

        return redirect()->route('admin.messages.index')
            ->withSuccess("The Message [$message->message] has been marked as viewed. ");
    }

    public function search(Request $request, Message $messages)
    {
        $searchs = explode(' ', $request->get('search'));

        foreach ($searchs as $key => $value) {
            $messages = $messages
                ->orWhere('name', 'like', "%$value%")
                ->orWhere('subject', 'like', "%$value%")
                ->orWhere('phone', 'like', "%$value%")
                ->orWhere('email', 'like', "%$value%")
                ->orWhere('message', 'like', "%$value%")
                ;
        }

        $messages = $messages->paginate(10)->appends(['search' => $request->get('search')]);
        
        $request->flash();
        return view('messages.index', compact('messages'));
    }
}
