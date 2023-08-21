

@extends('layouts.user_type.auth')

@section('content')

<div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                <form id="submitForm" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ $newdata['url'] }}">
                                @csrf
                                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Category Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" value="{{isset($post->name)?$post->name:''}}">
                </div>
                @if($errors->has('category_name'))
    <div class="error">{{ $errors->first('category_name') }}</div>
@endif
                
                <div class="col-md-12">
            
                    <label for="inputAddress5" class="form-label">Image Upload</label>
                  <input class="form-control" type="file" id="image" name="image" value="{{isset($post->name)?$post->name:''}}">
        <span>@if(isset($post->image)){{asset('public'.$post->image)}} @endif</span>
           
                    @if($errors->has('image'))
    <div class="error">{{ $errors->first('image') }}</div>
@endif
                  
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Description</label>
                  <textarea class="form-control" placeholder="Category Description" id="description" name="description" style="height: 100px;">@if(isset($post->description)){{$post->description}} @endif</textarea>
                  </div>
                  @if($errors->has('description'))
    <div class="error">{{ $errors->first('description') }}</div>
@endif
                  <div class="col-md-6">
                   <div class="form-check form-switch">
                   <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" onchange="statusadd()" @if(isset($post->status)) @if($post->status == 'Active') checked @endif @else checked @endif>
                            <label class="form-check-label" for="flexSwitchCheckChecked" id="statuslabel">@if(isset($post->status)) @if($post->status == 'Active')Active @endif @else Active @endif</label>
                          </div>
                </div>
                                
                                
                                <div class="form-group">
                                    <div class="row row-sm">
                                        <div class="col-md-9">
                                        <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                            data-rest-text="{{ $newdata['btn'] }}">{{ $newdata['btn'] }}</button>
                                        </div>
                                    </div>
                                </div>
                                                            
                            </form>
            </div>
        </div>
    </div>
</div>
 
@endsection

