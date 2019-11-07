@extends('template')

@section('content')

<!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Post Edit Form</h1>

            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                      @endforeach
                </ul>
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">

          @csrf
          @method('PUT')
          
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title"  class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
              <label>Content</label>
             <textarea class="form-control" name="content">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
              <label>Photo</label>
              <span class="text-danger">[supported file types:jpeg,png]</span>
              <input type="file" class="form-control-file" name="photo">
              <img src="{{asset($post->image)}}" class="img-fluid">
              <input type="hidden" name="oldphoto" value="{{$post->image}}">
            </div>
            <div class="form-group">
              <label>Categories</label>
              <select name="category" class="form-control">
                <option value="">Choose Category</option>

                {-- accept data and loop --}

                @foreach($categories as $row)
                <option value="{{$row->id}}"
                  @if($row->id==$post->category_id){{'selected'}}  
                @endif>
                  {{$row->name}}
                
                </option>
                @endforeach
              </select>
            </div>
             <div class="form-group">
              <input type="submit" class="btn btn-primary" name="btnsubmit" value="Update" >
            </div>
        </form>
        
      </div>
    </div>
  </div>

  @endsection
