<div class="form-body">
    <div class="asd">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="col-md-3 col-sm-12 control-label">إسم بند الإتفاقية</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-8 col-sm-8 col-xs-8 ">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-file"></i>
                    </span>
                    {!! FORM::text("title", null ,['class'=>'form-control']) !!}
                </div>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-12 control-label">حالة البند</label>
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-8 col-sm-8 col-xs-8{{ $errors->has('active') ? ' has-error' : '' }}">
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
        <label class="col-md-3 col-sm-12 control-label">وصف كامل عن البند</label>
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
