<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('coach.list-resources', compact('resources'));
    }

    public function create()
    {
        return view('coach.create-resources');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:50',
        ]);

        // Création de la ressource
        Resource::create($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('resources.list')->with('success', 'Resource added successfully.');
    }

    public function show($id)
    {
        $resource = Resource::findOrFail($id);
        return view('coach.show-resource', compact('resource'));
    }

    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        return view('coach.edit-resource', compact('resource'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:50',
        ]);

        $resource = Resource::findOrFail($id);
        $resource->update($request->all());

        return redirect()->route('resources.list')->with('success', 'Resource updated successfully.');
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();

        return redirect()->route('resources.list')->with('success', 'Resource deleted successfully.');
    }
}
