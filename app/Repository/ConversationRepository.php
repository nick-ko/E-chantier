<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 22/04/2019
 * Time: 22:02
 */

namespace App\Repository;

use App\Chief;
use App\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ConversationRepository{

    /**
     * @var User
     */
    private $user;
    /**
     * @var Message
     */
    private $message;

    public function __construct(Chief $user,Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function getConversation(int $userId){
        $conversations=$this->user->newQuery()->select('chief_name','id')
            ->where('id','!=',$userId)
            ->get();

        return $conversations;
    }

    public function createMessage(string $content,int $from,int $to){

        return $this->message->newQuery()->create([
            'content'=>$content,
            'from_id'=>$from,
            'to_id'=>$to
        ]);

    }

    public function getMessagesFor(int $from,int $to):Builder
    {
        return $this->message->newQuery()
            ->whereRaw("((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
            ->orderBy('created_at','DESC')->with('from');
    }

    /**
     * @param int $userId
     * @return Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function unreadCount(int $userId){

        return $this->message->newQuery()
            ->where('to_id',$userId)
            ->groupBy('from_id')
            ->selectRaw('from_id, COUNT(id) as count')
            ->whereRaw('read_at IS NULL')
            ->get()
            ->pluck('count','from_id');
    }
    public function readAllFrom(int $from,int $to){

        $this->message->where('from_id',$from)->where('to_id',$to)->update(['read_at'=>Carbon::now()]);

    }

}
