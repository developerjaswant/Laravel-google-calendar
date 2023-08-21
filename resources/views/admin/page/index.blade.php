@extends('layouts.user_type.auth')

@section('content')

<div>
    
    <div class="row">
        <div class="col-12">
        @if( Session::has("success") )
  <div class="alert alert-success alert-block" role="alert">
  {{ Session::get("success") }}
 </div>
 @endif
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Page</h5>
                        </div>
                        <a href="{{route('admin.page.create')}}" class="btn bg-gradient-primary btn-sm mb-0"> Add Page</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Number
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image
                                    </th>
                                    
                                    
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($data as $key=>$page)
                               
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$page->id}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$page->number}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$page->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                        @if($page->image)
                                        <img src="{{url('public'.$page->image)}}" class="img-thumbnail" alt="" style="width: 75px;
                                            height: 40px;" download>
                                             @else
                                            <img src="{{ asset('public/assets/img/no-image-icon-4.png') }}" class="img-thumbnail" alt="" style="width: 75px; height: 40px;" download>
                                            @endif
                                        </p>
                                    </td>
                                    
                                    
                                   
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$page->status}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.page.edit',$page->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="{{route('admin.page.destroy',$page->id)}}" class="delete-link" data-message="Are you sure you want to delete this page?">
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection