<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $users = User::all();
        $users = User::paginate(10);
        return view('user.index', compact('users'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if there are any validation errors in the session data
        $users = User::All();

        // If there are validation errors, pass them to the view
        return view('user.modal-create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        // Create a new user with the validated data
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Alert::toast('Created Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
         return view('user.modal-edit', compact('user'));
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
    $user = User::findOrFail($id);
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        'password' => 'nullable|min:8|max:255',
    ]);
    
    // Update the user with the validated data
    $user->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
    ]);
    
    Alert::toast('Updated Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
    return redirect()->back();
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::toast('Deleted Successfully', 'success')->autoClose(3000)->timerProgressBar()->width('20rem')->padding('1.5rem');
        return redirect()->back();
    }
}
