@extends('home.auth.app')
@section('title', '注册用户')
@section('content')

    <div class="six wide column mt150 mb100">
        <div class="ui stacked segment">
            <div class="content">
                <h2>注册新用户</h2>
                <div class="ui divider"></div>
                @include('home.common.error')
                <form class="ui form" role="form" method="POST" action="{{ route('register') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="name" placeholder="用户名" value="{{old('name')}}" required="">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="envelope icon"></i>
                            <input type="text" name="email" placeholder="邮箱" value="{{old('email')}}" required="">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="envelope icon"></i>
                            <input type="text" name="phone" placeholder="手机" value="{{old('phone')}}" required="">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="密码" required="">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password_confirmation" placeholder="确认密码" required="">
                        </div>
                    </div>

                    <button class="ui primary teal button fluid" type="submit">
                        <i class="save icon"></i>立即注册
                    </button>
                    <div class="ui horizontal divider">Or</div>

                    <a class="ui basic teal button fluid" href=""><i class="icon github alternate"></i> Github 注册</a>
                </form>
            </div>
        </div>
    </div>
@stop
