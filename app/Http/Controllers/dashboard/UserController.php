<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(5);
        return view('dashboard.pages.User.index', compact('users'));
    }
    public function customersIndex()
    {
        $customers = User::where('user_type', 'customer')->get();
        $customersCount = $customers->count();
        return view('dashboard.pages.User.customers-index', compact('customers', 'customersCount'));
    }
    public function moderatorsIndex()
    {
        $moderators = User::where('user_type', 'moderator')->get();
        $moderatorsCount = $moderators->count();
        return view('dashboard.pages.User.moderators-index', compact('moderators','moderatorsCount'));
    }
    public function adminsIndex()
    {
        $admins = User::where('user_type', 'admin')->get();
        $adminsCount = $admins->count();
        return view('dashboard.pages.User.admins-index', compact('admins','adminsCount'));
    }

    public function create()
    {
        return view('dashboard.pages.User.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'user_type' => 'required',
        ];

        if(auth()->user()->user_type === "admin"){
            $rules['user_type'] .= '|in:customer,moderator,admin';
        }elseif(auth()->user()->user_type === "moderator"){
            $rules['user_type'] .= '|in:customer,moderator';
        }else{
            return abort(403);
        }

        $request->validate($rules);
        $request->merge([
            'password' => bcrypt('123456789'),
        ]);
        User::create($request->all());
        return redirect()->route('users.index')->with('success', "The user has been created successfully.");
    
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id) ;// Eloquent ORM 
        return view('dashboard.pages.User.show' ,compact('user')) ;
    }

    public function edit( int $id)
    {
        $user = User::findOrFail($id);
        if(auth()->user()->id == $user->id || (auth()->user()->user_type == 'admin' && $user->user_type != 'admin')){
            return view('dashboard.pages.User.edit' , compact('user'));
        }elseif(auth()->user()->user_type == 'admin' && $user->user_type == 'admin' &&  auth()->user()->id != $user->id){
            // return abort(403);
            return redirect()->back()->with('success', "You are unauthorized to edit this user!");
        }else{
            return redirect()->route('users.edit', auth()->user()->id);
        }
    }

    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'name'  => 'required|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_type' => 'required',
        ];

        if(auth()->user()->user_type === "admin"){
            $rules['user_type'] .= '|in:customer,moderator,admin';
        }elseif(auth()->user()->user_type === "moderator"){
            $rules['user_type'] .= '|in:customer,moderator';
        }else{
            // return abort(403);
            return redirect()->back()->with('success', "You are unauthorized to edit this user!");
        }

        $request->validate($rules);
        if($request->has('password')){
            $request->merge([
                'password' => bcrypt('123456789'),
            ]);
        }
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', "The user has been created successfully.");
    }

    public function destroy(int $id)
    { 
       $user = User::findOrFail($id);
       if(auth()->user()->user_type == 'admin' && $user->user_type != 'admin' &&  auth()->user()->id != $user->id){
            $user->delete();
            return redirect()->route('users.index');
       }
        //    return abort(403);
        return redirect()->back()->with('success', "You are unauthorized to delete this user!");
    }
}
