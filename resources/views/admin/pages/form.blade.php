<div class="form-body">
    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        <label class="col-md-3 col-sm-12 control-label">مكان الصفحة</label>
        <!-- <div class="clearfix"></div> -->
        <div class="col-md-8 col-sm-8 col-xs-8 ">
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-file"></i>
                </span>
                {!! FORM::select("type",parentPages(),null,['class'=>'form-control']) !!}
            </div>
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="asd">
        <div class="form-group{{ $errors->has('pName') ? ' has-error' : '' }}">
            <label class="col-md-3 col-sm-12 control-label">إسم الصفحة</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-8 col-sm-8 col-xs-8 ">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    {!! FORM::text("pName", null ,['class'=>'form-control']) !!}
                </div>
                @if ($errors->has('pName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pName') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-12 control-label">اسم رابط الصفحه</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-3 col-sm-8 col-xs-8{{ $errors->has('pLink') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    {!! FORM::text("pLink", null ,['class'=>'form-control']) !!}
                </div>
                @if ($errors->has('pLink'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pLink') }}</strong>
                    </span>
                @endif
            </div>
            <label class="col-md-2 col-sm-12 control-label">حالة الصفحة</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-3 col-sm-8 col-xs-8{{ $errors->has('active') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    {!! FORM::select("active", ['1'=>'مفعله','0'=>'غير مفعله'] ,null ,['class'=>'form-control']) !!}
                </div>
                @if ($errors->has('active'))
                    <span class="help-block">
                        <strong>{{ $errors->first('active') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label class="col-md-3 col-sm-12 control-label">المحتوى</label>
        <!-- <div class="clearfix"></div> -->
        <div class="col-md-8 col-sm-8 col-xs-8 ">
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-user"></i>
                </span>
                {!! FORM::textarea("content", null ,['class'=>'form-control']) !!}
            </div>
            <script>
                CKEDITOR.replace( 'content', {
                    language: 'ar'
                } );
            </script>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-8">
                <button type="submit" class="btn green"> تنفيذ</button>
            </div>
        </div>
    </div>
</div>
