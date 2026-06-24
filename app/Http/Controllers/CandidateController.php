<?php

namespace App\Http\Controllers;

use Filament\Notifications\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Candidate; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'phone'       => ['required', 'regex:/^0[0-9]{9}$/'], 
            'email'       => 'nullable|email|max:150',
            'major_id'    => 'nullable|exists:majors,id', 
            'note'        => 'nullable|string|max:1000',
            'message'     => 'nullable|string|max:1000',
            'form_anchor' => 'nullable|string',
        ], [
            'name.required'     => 'Vui lòng nhập họ và tên của bạn.',
            'phone.required'    => 'Vui lòng nhập số điện thoại.',
            'phone.regex'       => 'Số điện thoại phải gồm 10 số và bắt đầu bằng số 0.',
            'email.email'       => 'Email không đúng định dạng.',
            'major_id.exists'   => 'Ngành học không tồn tại trên hệ thống.',
        ]);


        $anchor = $request->input('form_anchor', $request->has('major_id') ? 'form-dang-ky' : 'contact-form');

        try {
            DB::transaction(function () use ($request, $validated) {
    
            $content = $request->input('note') ?? $request->input('message') ?? 'Đăng ký nhận tư vấn';

            $candidate = Candidate::create([
                'name'     => $validated['name'],
                'phone'    => $validated['phone'],
                'email'    => $validated['email'] ?? null,
                'major_id' => $validated['major_id'] ?? null,
                'message'  => $content,
                'status'   => 'new',
            ]);

            Notification::make()
                ->title('🎯 Có hồ sơ đăng ký mới!')
                ->body("Thí sinh {$candidate->name} vừa đăng ký xét tuyển. SĐT: {$candidate->phone}")
                ->success()
                ->sendToDatabase(User::all()); 
            });

            return redirect(url()->previous() . '#' . $anchor)
                ->with('success', 'Gửi thông tin thành công! Nhà trường sẽ liên hệ với bạn sớm nhất.');

        } catch (\Exception $e) {
            Log::error('Lỗi lưu form Candidate: ' . $e->getMessage());

            return back()
                ->withInput()
                ->withErrors(['error' => 'Hệ thống đang bận, vui lòng thử lại sau ít phút!'])
                ->withFragment($anchor);
        }
    }
}