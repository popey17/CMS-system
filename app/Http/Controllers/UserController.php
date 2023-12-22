<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::orderBy('name', 'ASC')->paginate(12);
        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('_components.user.detail',['user'=>$user]);
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $users = User::orderBy('name', 'ASC')->paginate(12);
            return view('_components.user.card', compact('users'))->render();
            // return $users;
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', "User <span class='text-primary'>$user->name</span> has been deleted");
    }

    public function edit($id)
    {
        $user = User::find($id);
        $selectedStores = $user->stores()->pluck('stores.id')->toArray(); // Get the IDs of the selected stores

        return view('user.edit', ['user' => $user, 'selectedStores' => $selectedStores]);
    }

    public function update($id, Request $request)
    {
        $request->validate([

            'name' => 'required',
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'role_id' => ['required', 'integer'],
            // 'store_id' => ['required'],
        ]);

        if(isset($request['profile_image']) && $request['profile_image'] != null) {
            $imageName = time().'.'.$request['profile_image']->extension();  
            $request['profile_image']->move(public_path('img/profile/'), $imageName);
        }else {
            $imageName = null;
        }

        $store = $request->states;

        $user = User::find($id);
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        if(isset($request['profile_image']) && $request['profile_image'] != null) {
            $user->profile_pic = $imageName;
        }
        $user->note = $request->note;
        $user->stores()->sync($store);

        $user->save();

        return redirect('/user')->with('success', "User <span class='text-primary'>$user->name</span> has been updated");
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
        $users = User::where('name', 'like', '%' . $query . '%')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);

        if ($users->isEmpty()){
            return response()->json('<div class="no-data">No Data For this User</div>');
        }        

        return view('_components.user.card', compact('users'))->render();
        }
    }

    public function sort(Request $request)
    {
        if ($request->ajax()) {
            $sort = $request->get('sort');
            $order = $request->get('order');
            $users = User::orderBy($sort, $order)->paginate(12);
            return view('_components.user.card', compact('users'))->render();
        }
    }
}
