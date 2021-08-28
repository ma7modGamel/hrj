{{ csrf_field() }}
<div class="form-body">
    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="col-md-2 control-label">اسم القسم</label>
        <div class="col-md-9">
           <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
                </span>
                @if(isset($id))
                    {!! FORM::text("parent_id", $id ,['class'=>'hidden']) !!}
                @elseif(isset($cats->parent_id))
                    {!! FORM::text("parent_id", $cats->parent_id ,['class'=>'hidden']) !!}
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

       
            
            
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-md-2 control-label">اختر القسم الرئيسي</label>
                        <div class="col-md-9">
                           <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                                </span>
                <select name="parent_id" class="form-control">  
                

@php
$mainCats = \App\Cat::where('parent_id',null)->pluck('id');
$subOfSubCat = \App\Cat::whereNotIn('parent_id',$mainCats)->pluck('id');
@endphp

               <option value="">الأقسام الرئيسية</option>

 @foreach(\App\Cat::orderBy('parent_id','asc')->whereNotIn('id',$subOfSubCat)->get() as $category)
        
        
@if(count((array)$cats) == 1)

                     @if ($category->parent_id == $category->id )
<option selected value="{{$category->id}}">{{$category->name}}</option>
@else 
<option  value="{{$category->id}}">{{$category->name}}</option>

@endif
                     
            
@else
<option value="{{$category->id}}"> {{ $category->name}} </option>
@endif

        @endforeach
             </select>
            </div>
            @if ($errors->has('parent_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('parent_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
  
    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="col-md-2 control-label">لوجو القسم</label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-envelope-o"></i>
                </span>
                <input type="file" name="image" id="image" class="form-control">
            </div>
    
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
