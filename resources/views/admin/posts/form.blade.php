<div class="form-body">
                            <div class="form-group{{ $errors->has('mainCat') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">أختر القسم الرئيسى</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="icon-pointer"></i>
                                        </span>
                                        <select name="mainCat" id="select11" class="form-control">
                                            <option disabled selected value="0">أختر القسم</option>
                                          @foreach($cats as $cat)
                                            @if($cat->parent_id == 0)
                                            <option {{isset($post) ? isset($cat->find($post->cat_id)->parent_id) == $cat->id ? "selected" : "" : "" }} value="{{$cat->id}}">{{$cat->name}}</option>
                                           @endif 
                                          @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('mainCat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mainCat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label class="col-md-2 control-label">أختر القسم الفرعى</label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="icon-pointer"></i>
                                        </span>
                                        <select name="cat_id" id="select12" class="form-control">
                                            <option disabled selected value="">أختر القسم</option>
                                          @foreach($cats as $cat)
                                              @if(!$cat->parent_id == 0)
                                                <option value1="{{$cat->parent_id}}" {{isset($post) ? $post->cat_id == $cat->id ? "selected" : "" : "" }} value="{{$cat->id}}">{{$cat->name}}</option>
                                              @endif 
                                          @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('cat_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cat_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                            
                          
                          
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">أختر الدولة</label>
                                <div class="col-md-3{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="icon-pointer"></i>
                                        </span>
                                        <select name="country" id="select21" class="form-control">
                                            <option disabled selected value="0">أختر الدولة</option>
                                          @foreach($areas as $area)
                                            @if($area->parent_id == 0)
                                            <option {{isset($post) ? isset($area->find($post->area_id)->parent_id) == $area->id ? "selected" : "" : "" }} value="{{$area->id}}">{{$area->name}}</option>
                                           @endif 
                                          @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label class="col-md-2 control-label">أختر المنطقه</label>
                                <div class="col-md-3{{ $errors->has('area_id') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="icon-pointer"></i>
                                        </span>
                                        <select name="area_id" id="select22" class="form-control">
                                            <option disabled selected value="">أختر المدينة</option>
                                          @foreach($areas as $area)
                                            @if($area->id != 0)
                                              @if(!$area->parent_id == 0)
                                                <option value1="{{$area->parent_id}}" {{isset($post) ? $post->area_id == $area->id ? "selected" : "" : "" }} value="{{$area->id}}">{{$area->name}}</option>
                                              @endif 
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('area_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('area_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                      
                      
                            <div class="form-group alert alert-info">
                                <label class="col-md-2 col-sm-2 col-xs-12 control-label">تمييز الإعلان</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-6 col-xs-12{{ $errors->has('top') ? ' has-error' : '' }}">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        {!! FORM::select("top",['0'=>'إفتراضى','1'=>'مميز'],null ,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('top'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('top') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                <label class="col-md-2 col-sm-2 col-xs-12 control-label">وسيلة الإتصال</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-6 col-xs-12 ">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </span>
                                        {!! FORM::text("contact", null ,['class'=>'form-control']) !!}
                                    </div>
                                    {!! FORM::text("admin", 0 ,['class'=>'hidden']) !!}                                            
                                    @if ($errors->has('contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-md-2 col-sm-2 col-xs-12 control-label">عنوان الإعلان</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-6 col-xs-12 ">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        {!! FORM::text("title", null ,['class'=>'form-control']) !!}
                                    </div>
                                    {!! FORM::text("admin", 0 ,['class'=>'hidden']) !!}                                            
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label class="col-md-2 col-sm-2 col-xs-12 control-label">نص الإعلان</label>
                                <!-- <div class="clearfix"></div> -->
                                <div class="col-md-8 col-sm-10 col-xs-12">
                                   <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                        </span>
                                        {!! FORM::textarea("body", null ,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('imageCount') ? ' has-error' : '' }}">
                                <label class="col-md-2 col-sm-2 col-xs-12 control-label">تحميل الصور</label>
                                <a data-toggle="modal" @if(!isset($post)) class="hidden" @endif href="#large" class="btn btn-lg blue">صور الإعلان</a>
                                <div class="{{!isset($post) ? 'col-md-8 col-sm-10 col-xs-8' : 'col-md-7 col-sm-8 col-xs-8'}}">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                <span class="fileinput-filename"> </span>
                                            </div>
                                            <span class="input-group-addon btn default btn-file">
                                                <span class="fileinput-new"> إختر الصور </span>
                                                <span class="fileinput-exists"> تغير الصور </span>
                                                {!! FORM::file('file_name[]',array('multiple'=>true)) !!}
                                             </span>
                                        </div>
                                        @if ($errors->has('imageCount'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('imageCount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <h3>من فضلك اختر طريقه العرض  </h3><br>
                                <strong>فيديو</strong><input type="radio" name="uplode" value="video"><br>
                                <strong>صورة</strong><input type="radio" name="uplode" value="image"><br>
                            </div> -->
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-8">
                                        <button type="submit" class="btn green"> تنفيذ </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($post))
                        <div class="modal fade modal-scroll" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">صور الإعلان</h4>
                                    </div>
                                    <div class="modal-body">
                                        @foreach(\App\UpImage::where('post_id',$post->id)->get() as $image)
                                        @if($image->type == 'posts')
                                        <div>
                                            <a class="delPostImg" data-token="{{ csrf_token() }}" href="{{url('admincp/images/'.$image->id)}}">×</a>
                                            <img class="img-responsive img-block" src="{{image_check($image->img_name,'posts')}}">
                                            <hr />
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.modal-content -->    
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        @endif
                        <!-- END SAMPLE FORM PORTLET-->
