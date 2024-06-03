<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;

class MemberController extends Controller
{
    /**
     * 会員一覧
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $members = Member::orderBy('created_at' , 'asc')->get();
        return view('members.index' , [
            'members' => $members,
        ]);
    }


    //会員登録画面表示

    public function create()
    {
        return view('members.create');
    }


    /**
     * 会員登録実行
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request,[
            'name' => 'required|max:15',
            'phone' => 'required|max:15',
            'email' => 'required|max:254',
        ]);
       
        //     // DBインサート
            //   $member = new Member([←このMemberはModelsのディレクトリをさす
            Member::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);

                // 保存
                // $member->save();


                // リダイレクト
                return redirect()->route('members.index');
                         
    }



    //会員編集画面表示

    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit' , [
            'member' => $member,
        ]);
    }



    /**
     * 会員編集
     * @param Request $request
     * @return Response
     */

    public function update(Request $request )
    {
       $id = $request->id;
        // バリデーション
        $this->validate($request,[
            'name' => 'required|max:15',
            'phone' => 'required|max:15',
            'email' => 'required|max:254',
        ]);
       
         // DBインサート
        // $member = new Member([
                // $id = (int)$member->id;
                $member = Member::find($id);
               
                $member->update([
                    
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                ]);
    
                    // 保存
                    // $member->save();
                    // リダイレクト
                    return redirect()->route('members.index');
                             
        }



        
    /**
     *  会員削除
     * 
     * @param Request $request
     * @return Response
     */

    public function destroy(Request $request )
    {
        // $this->authorize('destroy' , $member);ログイン機能で必要になる
        //dd ($id) にするとこれ以降の処理を止めてコードの中身を見せてくれる(デバック)
        $id = $request->id;
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index');
    }

    
}
    