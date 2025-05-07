<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(Attendance $attendance, Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $file->storeAs('attachments', $file->hashName(), 'public');

            $attendance->attachments()->create([
                'filepath' => $file->hashName(),
            ]);

            return back()->with('success', 'Arquivo enviado com sucesso!');
        }
    }

    public function destroy(Attachment $attachment)
    {
        $attachment->delete();

        return back()->with('success', 'Arquivo removido com sucesso!');
    }
}
