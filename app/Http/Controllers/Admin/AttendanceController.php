<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function detail(string $id, string $attendanceId)
    {
        return view(
            'admin.attendances.detail',
            [
                'attendance' => Attendance::find($attendanceId)
            ]
        );
    }

    public function create(string $id)
    {
        return view(
            'admin.attendances.create',
            [
                'subject' => Subject::find($id)
            ]
        );
    }

    public function store(string $id, StoreAttendanceRequest $request)
    {
        $data = $request->validated();

        $attendance = new Attendance($data);
        $attendance->user_id = Auth::user()->id;
        $attendance->subject_id = $id;

        $demands = $data['demands'];

        if ($attendance->save()) {
            if ($demands) {
                $attendance->demands()->attach($demands);
            }

            return redirect()->route('admin.subjects.detail', ['id' => $id])->with('success', 'Alteração realizada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        }
    }

    public function setForwarding(string $attendanceId, Request $request)
    {
        $attendance = Attendance::find($attendanceId);

        $data = $request->validate([
            'description' => ['required', 'string']
        ]);

        $success = $attendance->forwarding()->upsert([
            ['description' => $data['description'], 'attendance_id' => $attendance->id, 'user_id' => Auth::user()->id],
        ], ['attendance_id'], ['description', 'user_id']);

        if ($success) {
            return redirect()->route('admin.attendances.detail', ['id' => $attendance->subject->id, 'attendanceId' => $attendance->id])->with('success', 'Alteração realizada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao realizar a operação!');
        }
    }
}
