@extends('layouts.app')

@section('content')
    <div class="container">
        <h1><strong> Clozette's Users </strong></h1>

          <!-- <form action="/users/search" method="GET" role="search">
        			<div class="input-group">
        				<input type="text" class="form-control" name="search"
        					placeholder="Search users"> <span class="input-group-btn">
        					<button type="submit" class="btn btn-default">
        						<span class="glyphicon glyphicon-search"></span>
        					</button>
        				</span>
        			</div>
  	       </form> -->

           <br/>

           <div class="col-sm-12">
             @foreach ($users as $user)
              <div class="col-sm-4 text-center" style="padding: 10px;">
                  <div style="box-shadow: 0 0 10px 1px grey; padding: 20px;">
                    <img src="/uploads/avatars/{{$user->avatar}}" alt="Avatar"
                    style="width:55px; height:55px; float:left; border-radius:50%;">
                      <strong>{{ $user->username }}</strong><br />
                      <a href="{{ route('user.show', $user->id) }}">View User</a>
                  </div>
              </div>
              @endforeach
               <div class="col-sm-12">
                   {{ $users->links() }}
               </div>
           </div>

    </div>
@endsection
