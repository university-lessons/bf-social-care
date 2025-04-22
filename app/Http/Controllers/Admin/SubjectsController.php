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

    public function detail(Subject $subject)
    {
        return view(
            'admin.subjects.detail',
            [
                'subject' => $subject
            ]
        );
    }

    public function edit(Subject $subject)
    {
        return view(
            'admin.subjects.edit',
            [
                'subject' => $subject
            ]
        );
    }

    public function update(Subject $subject, UpdateSubjectRequest $request)
    {
        $data = $request->validated();

        try {
            $subject->update($data);
            return redirect()->route('admin.subjects.index')->with('success', 'Alteração realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        }
    }
}
