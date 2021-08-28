    {{ csrf_field() }}
    <div class="form-body">
        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
            @if(isset($id))
            <label class="col-md-3 control-label">اسم المنطقه</label>
            @else
            <label class="col-md-3 control-label">اسم الدولة</label>
            @endif
            <div class="col-md-8">
               <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                    </span>
                    @if(isset($id))
                        {!! FORM::text("parent_id", $id ,['class'=>'hidden']) !!}
                    @elseif(isset($areas->parent_id))
                        {!! FORM::text("parent_id", $areas->parent_id ,['class'=>'hidden']) !!}
                    @else
                        {!! FORM::text("parent_id", 0 ,['class'=>'hidden']) !!}
                    @endif
                    {!! FORM::text("name", null ,['class'=>'form-control']) !!}
                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
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
