@extends('layouts.user_type.auth')

@section('content')

<div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                <form id="submitForm" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('admin.page.update',['id' => $data->id])}}">
                                @csrf
                                @if(isset($data))
        <input type="hidden" name="id" value="{{ $data->id }}">
    @endif
    
    <div class="col-md-12">
                  <label for="inputName5" class="form-label">Page Number</label>
                  <input type="number" class="form-control" id="number" name="number" value='{{$data->number}}'>
                </div>
                @if($errors->has('number'))
    <div class="error">{{ $errors->first('number') }}</div>
@endif
                             
                                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Page Name</label>
                  <input type="text" class="form-control" id="name" name="name" value='{{$data->name}}'>
                </div>
                @if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
@endif
                
                <div class="col-md-12">
            
                    <label for="inputAddress5" class="form-label">Image Upload</label>
                  <input class="form-control" type="file" id="image" name="image">
                  @if($data->image)
                  <img src="{{asset('public'.$data->image)}}" style="width: 100px; height:100px;">
                  @else
                                            <img src="{{ asset('public/assets/img/no-image-icon-4.png') }}" class="img-thumbnail" alt="" style="width: 75px; height: 40px;" download>
                                            @endif
        </div>
                    @if($errors->has('image'))
    <div class="error">{{ $errors->first('image') }}</div>
@endif
<div class="col-md-12">
                                    <label for="inputName5" class="form-label">title 1</label>
                                    <input type="text" class="form-control" id="title1" name="title1" value='{{$data->title1}}'>
                                    </div>
                                    @if($errors->has('title1'))
                        <div class="error">{{ $errors->first('title') }}</div>
                    @endif

                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">title 2</label>
                                    <input type="text" class="form-control" id="title2" name="title2" value='{{$data->title2}}'>
                                    </div>
                                    @if($errors->has('title2'))
                        <div class="error">{{ $errors->first('title2') }}</div>
                    @endif
                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">title 3</label>
                                    <input type="text" class="form-control" id="title3" name="title3" value='{{$data->title3}}'>
                                    </div>
                                    @if($errors->has('title3'))
                        <div class="error">{{ $errors->first('title3') }}</div>
                    @endif
                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">title 4</label>
                                    <input type="text" class="form-control" id="title4" name="title4" value='{{$data->title4}}'>
                                    </div>
                                    @if($errors->has('title4'))
                        <div class="error">{{ $errors->first('title4') }}</div>
                    @endif

                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Short Describation</label>
                                    <input type="text" class="form-control" id="short_describation" name="short_describation" value='{{$data->short_describation}}'>
                                    </div>
                                    @if($errors->has('short_describation'))
                        <div class="error">{{ $errors->first('short_describation') }}</div>
                    @endif

                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Meta Describation</label>
                                    <input type="text" class="form-control" id="meta_describation" name="meta_describation" value='{{$data->meta_describation}}'>
                                    </div>
                                    @if($errors->has('meta_describation'))
                        <div class="error">{{ $errors->first('meta_describation') }}</div>
                    @endif
               
               
                  <div class="col-md-6">
                   <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" onchange="statusadd()" @if(isset($data->status)) @if($data->status == 'Active') checked @endif @else checked @endif>
                            <label class="form-check-label" for="flexSwitchCheckChecked" id="statuslabel">@if(isset($data->status)) @if($data->status == 'Active')Active @endif @else Active @endif</label>
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

