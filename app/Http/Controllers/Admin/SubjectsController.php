<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubjectRequest;
use App\Http\Requests\Admin\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        return view('admin.subjects.index', [
            'subjects' => Subject::all()
        ]);
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        $data = $request->validated();

        try {
            Subject::create($data);
            return redirect()->route('admin.subjects.index')->with('success', 'Alteração realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        }
    }

    public function detail(string $id)
    {
        return view(
            'admin.subjects.detail',
            [
                'subject' => Subject::find($id)
            ]
        );
    }

    public function edit(string $id)
    {
        return view(
            'admin.subjects.edit',
            [
                'subject' => Subject::find($id)
            ]
        );
    }

    public function update($id, UpdateSubjectRequest $request)
    {
        $data = $request->validated();

        $subject = Subject::find($id);

        try {
            $subject->update($data);
            return redirect()->route('admin.subjects.index')->with('success', 'Alteração realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        }
    }
}
