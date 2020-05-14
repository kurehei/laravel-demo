<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('messages.index',[
          'messages' => $messages
          // 左側の'messages'は、view側で使う変数でview側の場合、$messageになる
        ]);   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // form用に空のインスタンスを用意する
      $message = new Message;
      return view('messages.create',[
        'message' => $message
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required|max:20'
        ]);
        $message = new Message;
        // input()は、連想配列で返す
        //input('カラム')でリクエストクラスに入った値を取得すr
        $message->content = $request->input('content');
        // hasは、リクエストに値が存在しているかどうかチェックするための関数
        // $request->has('content')
        $message->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // showには、もともと、$idが与えられている
       $message = Message::find($id);
       return view('messages.show',[
           'message' => $message
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        return view('messages.edit',[
            'message'=>$message
        ]);
        //
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
            'content' => 'required|max:20'
        ]);
        //
        $message = Message::find($id);
        $message->content = $request->input('content');
        $message->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect('/');
        //
    }
}
