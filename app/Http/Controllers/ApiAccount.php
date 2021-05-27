<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ApiAccount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = Account::join('role', 'account.role_id', '=', 'role.id')->get();

        return $account;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => ['required', 'email', 'unique:account,email', 'max:128'],
            'pass' => ['required', 'same:pass_confirm'],
            'pass_confirm' => ['required', 'same:pass'],
            'name' => ['required', 'max:32'],
            'joe' => ['required', 'max:128'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'pict' => ['mimes:jpeg,png'],
            'role_id' => ['required', 'exists:role,id'],
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {

            if ($req->hasFile('pict')) {
                $ext = $req->pict->extension();
                $name = time() . '.' . $ext;
                $req->pict->storeAs('/public/account', $name);
                $url = '/storage/account/' . $name;
            } else {
                $url = "";
            }

            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $token = substr(str_shuffle(str_repeat($pool, 5)), 0, 32);

            $account = Account::create([
                'email' => $req->email,
                'pass' => password_hash($req->pass, PASSWORD_DEFAULT),
                'name' => $req->name,
                'joe' => $req->joe,
                'gender' => $req->gender,
                'pict' => $url,
                'role_id' => $req->role_id,
                'token' => $token,
            ]);

            return $account;
        } catch (QueryException $e) {
            $response = [
                'message' => 'New account did not register!',
                'data' => $e,
            ];

            return $response;
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $account = Account::where('id', $id)->first();

        if ($account == null) {
            $response = [
                'message' => 'Account does not exist!'
            ];

            return $response;
        }

        $validator = Validator::make($req->all(), [
            'name' => ['required', 'max:32'],
            'joe' => ['required', 'max:128'],
            'gender' => ['in:Male,Female,Other'],
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $account->update([
                'name' => $req->name,
                'joe' => $req->joe,
                'gender' => $req->gender,
            ]);

            return $account;
        } catch (QueryException $e) {
            $response = [
                'message' => 'New account did not register!',
                'data' => $e,
            ];

            return $response;
        }
    }

    public function changePassword(Request $req, $id)
    {
        $account = Account::where('id', $id)->first();

        if ($account == null) {
            $response = [
                'message' => 'Account does not exist!'
            ];

            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $validator = Validator::make($req->all(), [
            'pass' => ['required', 'same:pass_confirm'],
            'pass_confirm' => ['required', 'same:pass'],
            'pass_old' => ['required'],
        ]);

        if ($validator->fails()) {
            $response = [
                'message' => 'Please fill the form with valid value!',
                'data' => $validator->errors(),
            ];

            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (password_verify($req->pass_old, $account['pass'])) {
            try {
                $account->update([
                    'pass' => password_hash($req->pass, PASSWORD_DEFAULT),
                ]);

                return $account;
            } catch (QueryException $e) {
                $response = [
                    'message' => 'New account did not register!',
                    'data' => $e,
                ];

                return $response;
            }
        } else {
            $response = [
                'message' => 'Wrong old password!',
            ];

            return $response;
        }
    }

    public function changeProfilePicture(Request $req, $id)
    {
        $account = Account::where('id', $id)->first();

        if ($account == null) {
            $response = [
                'message' => 'Account does not exist!'
            ];

            return $response;
        }

        $validator = Validator::make($req->all(), [
            'pict' => ['required', 'mimes:jpeg,png'],
        ]);

        if ($validator->fails()) {
            $response = [
                'message' => 'Please fill the form with valid value!',
                'data' => $validator->errors(),
            ];

            return $response;
        }

        try {

            if ($account['pict'] != "") {
                $path = explode("/", $account['pict']);
                $pictname = end($path);
                unlink(storage_path('app/public/account/' . $pictname));
            }

            $ext = $req->pict->extension();
            $name = time() . '.' . $ext;
            $req->pict->storeAs('/public/account', $name);
            $url = '/storage/account/' . $name;

            $account->update([
                'pict' => $url,
            ]);

            return $account;
        } catch (QueryException $e) {
            $response = [
                'message' => 'Profile picture fail to change!',
                'data' => $e,
            ];

            return $response;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::where('id', $id)->first();

        if ($account == null) {
            $response = [
                'message' => 'Account does not exist!'
            ];

            return $response;
        }

        if ($account['pict'] != "") {
            $path = explode("/", $account['pict']);
            $pictname = end($path);
            unlink(storage_path('app/public/account/' . $pictname));
        }

        try {
            $account->delete();

            $response = [
                'message' => 'Account deleted!',
            ];

            return $response;
        } catch (QueryException $e) {
            $response = [
                'message' => 'Profile picture fail to delete!',
                'data' => $e,
            ];

            return $response;
        }
    }

    public function login(Request $req)
    {
        $account = Account::where('email', $req->email)->join('role', 'account.role_id', '=', 'role.id')->first();

        if ($account == null) {
            $response = [
                'message' => 'Email does not registered!'
            ];

            return $response;
        }

        $validator = Validator::make($req->all(), [
            'email' => ['required', 'email'],
            'pass' => ['required'],
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        if (password_verify($req->pass, $account['pass'])) {
            return $account;
        } else {
            $response = [
                'message' => 'Wrong password!',
            ];

            return $response;
        }
    }
}
