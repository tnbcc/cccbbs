<?php

namespace App\Http\Controllers\Home;

use App\Exceptions\InvalidRequestException;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexsController extends Controller
{
    public function index()
    {
        return view('home.indexs.index');
    }
    public function emailVerifyNotice()
    {
         return view('home.indexs.email_verify_notice');
    }
    public function verify(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');

        //如果邮箱token都为空抛出异常
        if (!$token || !$email) {
            throw new InvalidRequestException('验证链接不正确');
        }
        if ($token != \Cache::get('email_verification_'.$email)) {
            throw new InvalidRequestException('验证链接出正确或已过期');
        }
        if (!$user = User::where('email',$email)->first())
        {
            throw new InvalidRequestException('用户不存在');
        }
        \Cache::forget('eamil_verification'.$email);
        $user->update(['email_verified' => true]);
        $msg = '邮箱验证成功';
        return view('home.indexs.success',compact('msg'));

    }

    public function send(Request $request)
    {
        $user = $request->user();

        //判断用户是否已经激活
        if ($user->email_verified) {
            throw new InvalidRequestException('你已经激活过邮箱了');
        }
        $user->notify(new EmailVerificationNotification());
        $msg = '邮件已经发送成功';
        return view('home.indexs.success',compact('msg'));

    }
}
