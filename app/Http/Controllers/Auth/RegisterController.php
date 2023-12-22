<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'role_id' => ['required', 'integer'],
            'stores' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['profile_image']) && $data['profile_image'] != null) {
            $imageName = time().'.'.$data['profile_image']->extension();  
            $data['profile_image']->move(public_path('img/profile/'), $imageName);
        }else {
            $imageName = null;
        }

        $store = $data['stores'];

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'=> $data['role_id'],
            'profile_pic' => $imageName,
            'note' => $data['note'],
        ]);

        $user->stores()->attach($store);

        return $user;
    }

    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        // Comment the following line to prevent auto-login
        // $this->guard()->login($user);

        return redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        // Do nothing or add custom logic
    }
}
