                        <div class="form-body">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-sm-12 control-label">user name</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-8 col-xs-8 ">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        {!! FORM::text("username", null ,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">الإسم بالكامل</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        {!! FORM::text("name", null ,['class'=>'form-control']) !!}
                                        {!! FORM::text("admin", null ,['class'=>'hidden']) !!}
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">رقم الهاتف</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </span>
                                        {!! FORM::text("phone",null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('men') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">الجنس</label>
                                <div class="col-md-3">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </span>
                                        {!! FORM::select("men",['1'=>'ذكر','0'=>'أنثى'], null ,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('men'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('men') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label class="col-md-2 control-label">الصلاحيات</label>
                                <div class="col-md-3{{ $errors->has('type') ? ' has-error' : '' }}">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-legal"></i>
                                        </span>
                                        {!! FORM::select("type",usersType(), null ,['class'=>'form-control']) !!}
                                        {!! FORM::text("admin", 1 ,['class'=>'hidden']) !!}

                                    </div>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">الحالة</label>
                                <div class="col-md-8{{ $errors->has('active') ? ' has-error' : '' }}">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </span>
                                        {!! FORM::select("active",['1'=>'مفعل','0'=>'غير مفعل'], null ,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('active') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">البريد الاكترونى</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                        </span>
                                        {!! FORM::email("email",null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="form-group{{ $errors->has('imageCount') ? ' has-error' : '' }}">--}}
                                {{--<label class="col-md-3 control-label">تحميل الصوره</label>--}}
                                    {{--<a data-toggle="modal" @if(!isset($user)) class="hidden" @endif href="#large" class="btn btn-lg blue">صورة العضو</a>--}}
                                {{--<div class="{{!isset($user) ? 'col-md-8 col-sm-10 col-xs-8' : 'col-md-6 col-sm-8 col-xs-8'}}">--}}
                                   {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon">--}}
                                        {{--<i class="fa fa-image"></i>--}}
                                        {{--</span>--}}
                                        {{--{!! FORM::file('image',array('class'=>'form-control input-lg')) !!}--}}
                                    {{--</div>--}}
                                    {{--@if ($errors->has('imageCount'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('imageCount') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                    {{----}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="col-md-3 control-label">اضافه صورة</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                        </span>
                                        {!! FORM::file("image",['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label">كلمة المرور</label>
                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-3 control-label">إعادة كلمة المرور</label>

                                <div class="col-md-8">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-8">
                                        <button type="submit" class="btn green"> تنفيذ </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($user))
                        <div class="modal fade modal-scroll" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">صورة العضو</h4>
                                    </div>
                                    <div class="modal-body">
                                        @foreach(explode(',',$user->image) as $image)
                                            <img class="img-responsive img-block" src="{{image_check($image,'users')}}">
                                            <hr />
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        @endif
                        <!-- END SAMPLE FORM PORTLET-->
