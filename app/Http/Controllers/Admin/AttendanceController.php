<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SetForwardingRequest;
use App\Http\Requests\Admin\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function detail(Attendance $attendance)
    {
        return view(
            'admin.attendances.detail',
            [
                'attendance' => $attendance
            ]
        );
    }

    public function create(Subject $subject)
    {


        return view(
            'admin.attendances.create',
            [
                'subject' => $subject
            ]
        );
    }

    public function destroy(Attendance $attendance, Request $request)
    {
        if ($request->user()->cannot('destroy', $attendance)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $attendance->delete();
        return redirect()->route('admin.subjects.detail', ['subject' => $attendance->subject_id])->with('success', 'Atendimento excluido com sucesso!');
    }

    public function store(Subject $subject, StoreAttendanceRequest $request)
    {
        $data = $request->validated();

        $attendance = new Attendance($data);
        $attendance->user_id = Auth::user()->id;
        $attendance->subject_id = $subject->id;

        $demands = $data['demands'] ?? null;

        if ($attendance->save()) {
            if ($demands != null) {
                $attendance->demands()->attach($demands);
            }

            return redirect()->route('admin.subjects.detail', ['subject' => $subject->id])->with('success', 'Alteração realizada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        }
    }

    public function setForwarding(Attendance $attendance, SetForwardingRequest $request)
    {
        $data = $request->validated();

        $success = $attendance->forwarding()->upsert([
            ['description' => $data['description'], 'attendance_id' => $attendance->id, 'user_id' => Auth::user()->id],
        ], ['attendance_id'], ['description', 'user_id']);

        if ($success) {
            return redirect()->route('admin.attendances.detail', ['attendance' => $attendance->id])->with('success', 'Alteração realizada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        }
    }
}
