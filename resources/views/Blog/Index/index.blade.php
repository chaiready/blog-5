@extends('Blog.Common.base')
@section('main')
<div class="fly-panel fly-column">
  <div class="layui-container">
    <ul class="layui-clear">
      <li  class="layui-this"><a href="">首页</a></li>
        @foreach ($nav_list_2 as $value)
        <li><a href="{{route('article_list',['nav_id'=>$value->nav_id,'create_time'=>'desc'])}}">{{ $value->name }}<span class="{{$value->class_name}}"></span></a></li>
        @endforeach
      <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li>
        <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="{{url('my_article')}}">我发表的贴</a></li>
        <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="{{url('my_article')}}">我收藏的贴</a></li>
    </ul>

    <div class="fly-column-right layui-hide-xs">
      <span class="fly-search"><i class="layui-icon"></i></span>
      <a href="{{route('add_article')}}" class="layui-btn">发表新帖</a>
    </div>
    <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
      <a href="{{route('add_article')}}" class="layui-btn">发表新帖</a>
    </div>
  </div>
</div>

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8">
      <div class="fly-panel">
        <div class="fly-panel-title fly-filter">
          <a>置顶</a>
        </div>
        <ul class="fly-list">
          @foreach($top_list as $v)
          <li>
            <a href="{{route('user_home',['user_no'=>$v->user_no])}}" class="fly-avatar">
              <img src="{{$v->face_img}}" alt="">
            </a>
            <h2>
              <a class="layui-badge">{{$v->name}}</a>
              <a href="{{route('article_detail',['article_id'=>$v->article_id,'nav_id'=>$v->nav_id])}}">{{$v->title}}</a>
            </h2>
            <div class="fly-list-info">
              <a href="{{route('user_home',['user_no'=>$v->user_no])}}" link>
                <cite>{{$v->nick_name}}</cite>
                <i class="iconfont icon-renzheng"></i>
                <i class="layui-badge fly-badge-vip">VIP</i>
              </a>
              <span>{{date('Y-m-d H:i',$v->create_time)}}</span>
              
              <span class=" layui-hide-xs"><i class="iconfont" title="人气">&#xe60b;</i> {{$v->page_views}}</span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="评论"></i> {{$v->comment_num}}
              </span>
            </div>
            <div class="fly-list-badge">
              @if($v->is_top == 1)
                <span class="layui-badge layui-bg-green">置顶</span>
              @endif
              @if($v->is_fine == 1)
                <span class="layui-badge layui-bg-red">精帖</span>
              @endif
            </div>
          </li>
        @endforeach
        </ul>
      </div>
      <div class="fly-panel" style="margin-bottom: 0;">
        <div class="fly-panel-title fly-filter">
          <a href="{{route('index',['create_time'=>'desc'])}}" @if($order == 'create_time') class="layui-this" @endif>最新</a>
          <span class="fly-mid"></span>
          <a href="{{route('index',['page_views'=>'desc'])}}" @if($order == 'page_views') class="layui-this" @endif>热度</a>
          <span class="fly-mid"></span>
          <a href="{{route('index',['comment_num'=>'desc'])}}" @if($order == 'comment_num') class="layui-this" @endif>评论</a>
          <span class="fly-mid"></span>
          <a href="{{route('index',['is_fine'=>'desc'])}}" @if($order == 'is_fine') class="layui-this" @endif>精贴</a>
        </div>

        <ul class="fly-list">
          @foreach ($artile_list as $v)
          <li>
            <a href="{{route('user_home',['user_no'=>$v->user_no])}}" class="fly-avatar">
              <img src="{{$v->face_img}}" alt="">
            </a>
            <h2>
              <a class="layui-badge">{{$v->name}}</a>
              <a href="{{route('article_detail',['article_id'=>$v->article_id,'nav_id'=>$v->nav_id])}}">{{$v->title}}</a>
            </h2>
            <div class="fly-list-info">
              <a href="{{route('user_home',['user_no'=>$v->user_no])}}" link>
                <cite>{{$v->nick_name}}</cite>
                <i class="iconfont icon-renzheng"></i>
                <i class="layui-badge fly-badge-vip">VIP</i>
              </a>
              <span>{{date('Y-m-d H:i',$v->create_time)}}</span>
              
              <span class="layui-hide-xs" ><i class="iconfont" title="人气">&#xe60b;</i> {{$v->page_views}} </span>
              <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
              <span class="fly-list-nums">

                <i class="iconfont icon-pinglun1" title="评论"></i> {{$v->comment_num}}
              </span>
            </div>
            <div class="fly-list-badge">
              @if($v->is_fine == 1)
                <span class="layui-badge layui-bg-red">精帖</span>
              @endif
            </div>
          </li>
         @endforeach

        </ul>
        @if(count($artile_list) >= config('blog.article_page_size'))
        <div style="text-align: center">
          <div class="laypage-main">
           <a href="{{route('article_list',['page'=>'2',$order=>'desc'])}}" class="laypage-next">更多求解</a>
          </div>
        </div>
        @endif()
      </div>
    </div>
    @include('Blog.Common.right_module')
  </div>
</div>
@endsection