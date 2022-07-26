<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUserByUserType(Request $request)
    {
        if ($request->usertype == 'doctor_id') {
            $users = Doctor::get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == 'admin') {
            $users = User::admin()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == '[patient]') {
            $users = User::patient()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == '[rays]') {
            $users = User::rays()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == '[ticket]') {
            $users = User::ticket()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == '[output]') {
            $users = User::output()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == 'nurse') {
            $users = User::nurse()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == 'pharmacist') {
            $users = User::pharmacist()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == 'laboratorist') {
            $users = User::laboratorist()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        } elseif ($request->usertype == 'receptionist') {
            $users = User::receptionist()->get();
            $TS = collect();
            foreach ($users as $user) {
                $TS->push($user);
            }
            $json = $TS->toJson();
            return response()->json(['html' => $json]);
        }
    }
}
