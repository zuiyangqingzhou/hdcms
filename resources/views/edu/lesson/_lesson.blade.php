{{--后台发表课程--}}
<div class="row small" id="app">
    <div class="card col-sm-12">
        <div class="card-body border-bottom-0">
            <ul class="nav nav-tabs nav-overflow nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route('edu.lesson.index')}}" class="nav-link">
                        课程列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.lesson.create')}}" class="nav-link active">
                        课程管理
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">课程标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="field.lesson.title" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">课程类型</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type1" v-model="field.lesson.type" class="custom-control-input"
                               value="system">
                        <label class="custom-control-label" for="type1">系统课程</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type2" v-model="field.lesson.type" class="custom-control-input" checked
                               value="video">
                        <label class="custom-control-label" for="type2">视频播客</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">课程介绍</label>
                <div class="col-sm-10">
                    <textarea v-model="field.lesson.description" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">课程图片</label>
                <div class="col-sm-10">
                    <div class="input-group mb-1">
                        <input class="form-control form-control" readonly="" v-model="field.lesson.thumb">
                        <div class="input-group-append">
                            <button @click="uploadLessonThumb(this)" class="btn btn-secondary" type="button">单图上传
                            </button>
                        </div>
                    </div>
                    <div style="display: inline-block;position: relative;">
                        <img :src="field.lesson.thumb" class="img-responsive img-thumbnail" width="150">
                        <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                            onclick="removeImg(this)">×</em>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">下载地址</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="field.lesson.download_address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">查看次数</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="field.lesson.click" value="{{old('click',0)}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">状态</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="status1" v-model="field.lesson.status" class="custom-control-input"
                               value="1" checked>
                        <label class="custom-control-label" for="status1">上架</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="status2" v-model="field.lesson.status" class="custom-control-input"
                               value="0">
                        <label class="custom-control-label" for="status2">下架</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">收费方式</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="free1" v-model="field.lesson.free" class="custom-control-input"
                               value="1">
                        <label class="custom-control-label" for="free1">免费</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="free2" v-model="field.lesson.free" class="custom-control-input"
                               value="0" checked>
                        <label class="custom-control-label" for="free2">收费</label>
                    </div>
                </div>
            </div>
            <div class="card" v-if="field.lesson.free==0">
                <div class="card-header">
                    收费课程设置
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">课程售价</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" v-model="field.lesson.price"
                                       value="{{old('price',0)}}" aria-label="Recipient's username"
                                       aria-describedby="price" value="100">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="price">元</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">订阅用户免费</div>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subscribe_free_play1" v-model="field.lesson.subscribe_free_play"
                                       class="custom-control-input" value="1">
                                <label class="custom-control-label" for="subscribe_free_play1">是</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subscribe_free_play2" v-model="field.lesson.subscribe_free_play"
                                       class="custom-control-input" value="0" checked>
                                <label class="custom-control-label" for="subscribe_free_play2">否</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">免费观看数量</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="field.lesson.free_num"
                                   value="{{old('free_num',3)}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-sm-12">
        <div class="card-header">课程属性</div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2">特殊属性</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" v-model="field.lesson.is_commend"
                               id="is_commend" value="1">
                        <label class="custom-control-label" for="is_commend">推荐</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" v-model="field.lesson.is_hot" id="is_hot"
                               value="1">
                        <label class="custom-control-label" for="is_hot">热门</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">课程标签</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="is_commend11">
                        <label class="custom-control-label" for="is_commend11">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="is_hot22">
                        <label class="custom-control-label" for="is_hot22">LINUX</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-sm-12">
        <div class="card-header mb-2">课程视频</div>
        <div class="card-body">
            <div class="row">
                <div class="card col-sm-12" v-for="(v,k) in field.videos">
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <input type="text" v-model="v.title" class="form-control" placeholder="课程标题"
                                   aria-describedby="helpId" required>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<div class="input-group mb-3">--}}
                                {{--<input type="text" class="form-control" v-model="v.duration" placeholder="播放时长"--}}
                                       {{--required>--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<span class="input-group-text">秒</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <input type="text" v-model="v.path" class="form-control" placeholder="视频链接"
                                   aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-white btn-sm" type="button" @click="delVideo(k)">删除</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <textarea name="field" hidden cols="30" rows="10">@{{field}}</textarea>
            <button class="btn btn-white btn-sm" type="button" @click="addVideo()">添加视频</button>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-sm">保存发布</button>
        </div>
    </div>
</div>

@push('js')
    <script>
        require(['vue', 'hdjs', 'jquery'], function (Vue, hdjs, $) {
            let vm = new Vue({
                el: "#app",
                data: {
                    field:{!! old('field',json_encode($field)) !!},
                },
                methods: {
                    addVideo() {
                        this.field.videos.push({title: '', path: '', duration: 0})
                    },
                    delVideo(index) {
                        this.field.videos.splice(index, 1)
                    },
                    uploadLessonThumb() {
                        hdjs.image((images) => {
                            this.field.lesson.thumb = images[0];
                        }, {})
                    }
                }
            })
        })
    </script>
@endpush
