<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller

{
     public function add()
    {
return view('admin.profile.create');
    }

public function create(Request $request)
    {
$this->validate($request, Profile::$rules);

$profile = new Profile;
$form = $request->all();

$profile->fill($form);
$profile->save();
    
    return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        $history = new ProfileHistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/edit');
    }

 public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

public function delete(Request $request)
  {
      // 該当するProfile Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
  }  
}
?>
