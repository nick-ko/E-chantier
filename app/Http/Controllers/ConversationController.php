<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Chief;
use App\Http\Requests\StoreMessage;
use App\Repository\ConversationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    /**
     * @var ConversationRepository
     */
    private $r;

    public function __construct(ConversationRepository $conversationRepository)
    {
        $this->r = $conversationRepository;
    }

    public function index(){

     $admin=DB::table('admins')
         ->first();

     return view('dashboard.chat',
         ['users'=>$this->r->getConversation(session('chief_id')),
             'unread'=>$this->r->unreadCount(session('chief_id'))
         ])
         ->with('admin',$admin);
    }

    public function show(Chief $user){
        $messages=$this->r->getMessagesFor(session('chief_id'), $user->id)->paginate(50);
        $unread=$this->r->unreadCount(session('chief_id'));
        $admin=DB::table('admins')
            ->first();
        if (isset($unread[$user->id])){
            $this->r->readAllFrom($user->id,session('chief_id'));
            unset($unread[$user->id]);
        }

        return view('dashboard/show',['users'=>$this->r->getConversation(session('chief_id')),
            'user'=>$user,
            'messages'=>$messages,
            'unread'=>$unread])
            ->with('admin',$admin);
    }

    public function store(Chief $user,StoreMessage $request){
        $this->r->createMessage(
            $request->get('content'),
            session('chief_id'),
            $user->id
        );
        return redirect(route('conversations.show',['id'=>$user->id]));
    }
}
