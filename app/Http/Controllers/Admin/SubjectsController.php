<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        return view('admin.subjects.index', [
            'subjects' => [
                [
                    'id' => 1,
                    'name' => 'Fulano Silva'
                ],
                [
                    'id' => 2,
                    'name' => 'Ciclano Silva'
                ],
                [
                    'id' => 3,
                    'name' => 'Beltrano Silva'
                ]
            ]
        ]);
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        dd($request->all());

        if (strlen($request->get("name")) == 0) {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        } else {
            return redirect()->route('admin.subjects.index')->with('success', 'Alteração realizada com sucesso!');
        }
    }

    public function detail(string $id)
    {
        return view(
            'admin.subjects.detail',
            [
                'subject' => [
                    'id' => 1,
                    'name' => 'Fulano Silva',
                ]
            ]
        );
    }

    public function edit(string $id)
    {
        return view(
            'admin.subjects.edit',
            [
                'subject' => [
                    'id' => 1,
                    'name' => 'Fulano Silva',
                ]
            ]
        );
    }

    public function update(Request $request)
    {
        if (strlen($request->get("name")) == 0) {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        } else {
            return redirect()->route('admin.subjects.index')->with('success', 'Alteração realizada com sucesso!');
        }
    }
}
