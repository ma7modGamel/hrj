    {{ csrf_field() }}
    <div class="form-body">
        <div class="form-group{{ $errors->has('ask') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">السؤال</label>
            <div class="col-md-9">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-question-circle"></i>
                    </span>
                    {!! FORM::text("ask", null ,['class'=>'form-control']) !!}
                </div>
                @if ($errors->has('ask'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ask') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">الإجابة</label>
            <div class="col-md-9">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-question-circle"></i>
                    </span>
                    {!! FORM::textarea("answer", null ,['class'=>'form-control']) !!}
                </div>
                @if ($errors->has('answer'))
                    <span class="help-block">
                        <strong>{{ $errors->first('answer') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green"> تنفيذ </button>
                </div>
            </div>
        </div>
    </div>
