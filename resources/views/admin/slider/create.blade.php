@extends('layouts.user_type.auth')

@section('content')

<div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                <form id="submitForm" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('admin.slider.create')}}">
                                @csrf
                                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Image Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                @if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
@endif
                
                <div class="col-md-12">
            
                    <label for="inputAddress5" class="form-label">Image Upload</label>
                  <input class="form-control" type="file" id="image" name="image">
    
        </div>
                    @if($errors->has('image'))
    <div class="error">{{ $errors->first('image') }}</div>
@endif
                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Short Describation</label>
                                    <input type="text" class="form-control" id="short_describation" name="short_describation" >
                                    </div>
                                    @if($errors->has('short_describation'))
                        <div class="error">{{ $errors->first('short_describation') }}</div>
                    @endif

                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Meta Describation</label>
                                    <input type="text" class="form-control" id="meta_describation" name="meta_describation">
                                    </div>
                                    @if($errors->has('meta_describation'))
                        <div class="error">{{ $errors->first('meta_describation') }}</div>
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
                                            >Save</button>
                                        </div>
                                    </div>
                                </div>
                                                            
                            </form>
            </div>
        </div>
    </div>
</div>
 
@endsection

