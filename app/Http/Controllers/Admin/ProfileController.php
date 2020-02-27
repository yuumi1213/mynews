<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    
     public function add()
    {
        return view('admin.profile.create');
    }

    public function create()
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}

/*「http://XXXXXX.jp/XXX というアクセスが来たときに、 
   AAAControllerのbbbというAction に渡す
   Routingの設定」を書いてみてください。*/

Route::get('XXX', 'Admin\AAAController@bbb');

/*【応用】 前章でAdmin/ProfileControllerを作成し、
add Action, edit Actionを追加しました。web.phpを編集して、
admin/profile/create にアクセスしたら ProfileController の add Action に、
admin/profile/edit にアクセスしたら ProfileController の edit Action に
割り当てるように設定してください。*/

Route::group(['prefix' => 'admin'], function() {
    Route::get('/profile/create', 'Admin\ProfileController@add');
    Route::get('/profile/edit', 'Admin\ProfileController@edit');

});

?>
