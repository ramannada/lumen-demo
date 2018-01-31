<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class UserController extends Controller
{
    const MODEL = "App\Models\User";

    use RESTActions;

    

    // public function getAll() {
    //     return response()->json(User::all())->header('Content-Type','Application/json');
    // }
    //
    // public function getById($id) {
    //     return response()->json(User::find($id));
    // }
    //
    // public function create(Request $request) {
    //     $user = new User;
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->password = Hash::make($request->input('password'));
    //
    //     if ($user->save()) {
    //         return response()->json($user);
    //     }
    //
    //     $data = [
    //         "message" => "failed to save",
    //     ];
    //
    //     return response()->json($data, 409);
    // }
    //
    // public function update(Request $request) {
    //     $user = User::find($request->input('id'));
    //
    //     if ($user != null) {
    //         $user->name = $request->input('name');
    //         $user->email = $request->input('email');
    //
    //         $user->save();
    //
    //         return response()->json($user);
    //     }
    //
    //     return response("data not found!", 404);
    // }
    //
    // public function delete(Request $request) {
    //     $user = User::find($request->input('id'));
    //
    //     if ($user != null) {
    //         $user->post()->delete();
    //
    //         if ($user->delete()) {
    //             return response("success deleted");
    //         }
    //     }
    //
    //     return response("data not found!", 404);
    // }
}
