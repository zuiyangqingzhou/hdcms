<li class="my-2">
    <div class="u-info-v1 p-3">
        <div class="row justify-content-sm-between align-items-sm-center">
            <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                <a href="{{route('member.user.show',$activity->causer)}}">
                <img class="u-avatar rounded-circle mr-3" src="{{$activity->causer->avatar}}">
                </a>
                <a href="{{route('member.user.show',$activity->causer)}}" class="text-secondary">
                    {{$activity->causer->name}}
                </a>
                @if($activity->description =='created')
                    <span class="badge badge-light text-secondary small">发表了</span>
                @else
                    <span class="badge badge-light text-secondary small">更新了</span>
                @endif
                <a href="{{route('edu.topic.show',$activity->subject)}}" class="text-dark">
                    {{$activity->subject->title}}
                </a>
            </div>
            <span class="col-sm-2 text-text text-sm-right small text-secondary">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{$activity->created_at->diffForHumans()}}
            </span>
        </div>
    </div>
</li>
