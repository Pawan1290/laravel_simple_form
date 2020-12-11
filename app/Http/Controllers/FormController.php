<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
    public function index()
    {
        $formData = Form::all();
        // $formData = '';
        return view('index', compact('formData'));
    }

    public function store(Request $request, $id = '')
    {
        if (empty($id)) {
            $data = Form::create($request->all());
            $row = '<tr onclick="update(\'' . $data->id . '\')" id="' . $request->key . '">
                <td>' . $request->key . '</td>
                <td id="firstName">' . $request->firstName . '</td>
                <td id="lastName">' . $request->lastName . '</td>
                <td id="address">' . $request->address . '</td>
                <td id="email">' . $request->email . '</td>
                <td id="phone">' . $request->phone . '</td></tr>';
            return json_encode(array('type' => 'insert', 'data' => $row));
        } else {
            Form::where('id', $id)
                ->update(array(
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ));
            return json_encode(array(
                'type' => 'update',
                'data' => array(
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                )
            ));
        }
    }
}
