{{ csrf_field() }}
<div class="form-body">
 
 
                     <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-md-2 control-label">إسم القسم الرئيسى  </label>
                        <div class="col-md-9">
                           <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                                </span>
                <select required name="category_id" class="form-control">  
                

@php
$maincommissions = \App\Cat::where('parent_id',null)->get();

@endphp



 @foreach($maincommissions as $category)
        
        


<option value="{{$category->id}}"> {{ $category->name}} </option>


        @endforeach
             </select>
            </div>
            @if ($errors->has('parent_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    


 
 
   <div class="form-group">
        <label class="col-md-2 control-label"> العمولة</label>
        <div class="col-md-9">
           <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
                </span>

                                <textarea required class="form-control" name="commission" rows="4" cols="50"></textarea>
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
