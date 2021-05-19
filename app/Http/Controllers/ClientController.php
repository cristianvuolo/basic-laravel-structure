<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class ClientController extends Controller
{
    public function listClients()
    {
        $clients = Client::all();
        return view('panel.clients.table', compact('clients'));
    }
    public function newClientForm()
    {
        $client = new Client;
        return view('panel.clients.form', compact('client'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:clients'],
            'birth_date' => 'required',
        ];

        $validated = $this->validate($request, $rules);

        Client::create($validated);

        return redirect()->route('panel.client.list')->with('success', 'Client registered successfully');
    }

    public function editClientForm($id)
    {
        $client = Client::findOrFail($id);

        return view('panel.clients.form', compact('client'));
    }

    public function deleteClient($id)
    {
        Client::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Client removed successfully');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('clients')->ignore($id)],
            'birth_date' => 'required',
        ];

        $validated = $this->validate($request, $rules);

        Client::findOrFail($id)->update($validated);

        return redirect()->route('panel.client.list')->with('success', 'Client registered successfully');
    }
}
