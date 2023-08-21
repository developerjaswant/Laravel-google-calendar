@extends('layouts.user_type.auth')

@section('content')

<div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif  
                <form id="submitForm" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('admin.event.store')}}">
                                @csrf
                              
                         
                                <div class="col-md-12">
                  <label for="inputName5" class="form-label"> Name</label>
                  <input type="text" class="form-control" id="name" name="name">
              
  
                     <div>
            
            <label for="start">Date</label>
            <input type="date" name="date" placeholder="Select Start Date" class="form-control"  required>
        </div>
         <div>
            
            <label for="Time">Start /Time</label>
            <input type="time" name="startDateTime" placeholder="Select End Date" class="form-control"  required>
        </div>

        <div>
            
            <label for="Time">End /Time</label>
            <input type="time" name="endDateTime" placeholder="Select End Date" class="form-control"required>
        </div>

                    <div class="col-md-12">
                                    <label for="inputName5" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
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

