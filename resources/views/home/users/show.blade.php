@extends('home.layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <!--左部分-->
    <div class="four wide column ">
        <div class="ui stackable cards">
            <div class="ui card">
                <div class="image">
                    <img src="{{$user->avatar}}">
                </div>
                <div class="content">
                    <div class="header">
                        {{ $user->name }}
                    </div>

                    <p class="meta">
                            <i class="non binary transgender icon"></i>{{ \App\Models\User::$sexMap["$user->gender"] }}
                    </p>

                    @if ($user->github_name)
                        <p class="meta">
                            <a href="{{$user->github_url}}" target="_blank">
                                <i class="icon github alternate grey"></i>
                                {{$user->github_name}}
                            </a>
                        </p>
                    @endif

                    <div class="description"></div>
                </div>

                @if ($user->remark)
                    <div class="extra content">
                        <i class="marker icon"></i>{{$user->remark}}
                    </div>
                @endif

                <div class="extra content">
                    <user-followers-button user="{{$user->id}}"></user-followers-button>
                </div>
            </div>
        </div>
    </div>
    <!--右部分-->
    {{-- 用户发布的内容 --}}
    <div class="twelve wide column">
        <div class="ui stacked segment">
            <div class="ui teal ribbon label"><i class="trophy icon"></i>贡献 {{$user->contribution_count}}</div>
            <div class="content extra-padding">
                <div class="ui attached tabular menu stackable">
                    <a class="item " data-tab="first" href="{{ route('users.show', $user->id)}}"><i class="icon list layout"></i>话题</a>
                    <a class="item " href=""><i class="icon comments"></i>回复</a>
                    {{--<a class="item {{ active_class(if_route('users.replies',$user->id)}}" href="https://tiicle.com/kenuocn/items"><i class="icon file text outline"></i> 编程知识<span class="counter">0</span> </a>--}}
                    {{--<a class="item {{ active_class(if_route('users.replies',$user->id)}}" href="https://tiicle.com/kenuocn/followers" ><i class="icon user"></i> 关注者 <span class="counter">0</span> </a>--}}
                    {{--<a class="item {{ active_class(if_route('users.replies',$user->id)}}" href="https://tiicle.com/kenuocn/stars"><i class="icon thumbs up"></i> 赞过 <span class="counter">2</span> </a>--}}
                </div>

            </div>
        </div>
    </div>
    <!--end右部分-->
@stop