@extends('user.main')
@section('content')
    <section class="container-fluid">

        <div class="row">
            <div class="col-xl-10 col-md-8 col-lg-9 ml-auto">
                <h1> گروه :  {{$group->name}}</h1>
                <div class="row">
                    <div class="col-sm-3">
                        <form action="{{route('group.update',$group)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <img width="150px" height="" class="img-profile rounded-circle " src="/uploads/avatars/{{$group->avatar}}">
                            </div>
                            <div class="form-group">
                                <input type="file" name="avatar">
                            </div>


                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" id="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{$group->name}}">
                                @error('name')
                                {{-- <div class="alert alert-danger">
                                     {{$message}}
                                 </div>--}}
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">بروزرسانی</button>

                        </form>
                    </div>
                    <div class="col-sm-9">
                        @if(\Illuminate\Support\Facades\Session::has('remover-user-from-group'))
                            <div class="ml-auto alert-success alert">{{\Illuminate\Support\Facades\Session::get('remover-user-from-group')}}</div>
                        @elseif(\Illuminate\Support\Facades\Session::has('add-user-to-group'))
                            <div class="ml-auto alert-success alert">{{\Illuminate\Support\Facades\Session::get('add-user-to-group')}}</div>
                        @endif
                        <table class="table bg-light text-center table-striped">
                            <thead>
                            <tr class="text-muted">
                                <th>#</th>
                                <th>نام</th>
                                <th>پروفایل</th>
                                <th> حذف از گروه</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($users as $user)
                                @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                    <tr>
                                        @php
                                            $i++;
                                        @endphp
                                        <th>{{$i}}</th>
                                        <td>{{$user->name}}</td>
                                        <td><img width="30px" src="/uploads/avatars/{{$user->avatar}}" class="rounded-circle img-thumbnail"></td>
                                        <td class="text-center">
                                            <form method="POST" action="{{route('group.removeuser',[$group->id,$user->id])}}">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" onmouseleave="this.style.color=''" onmouseover="this.style.color='red'" class="btn btn-block transparent "><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                            <nav>
                                <ul class="pagination justify-content-center">
                                    {{ $users->links() }}
                                </ul>
                            </nav>
                    </div>
                </div>
                <div class="row" style="margin-top: 8px">
                    <div class="col-sm-3">اضافه کردن عضو
                        <form method="POST" action="{{route('group.adduser',$group->id)}}">
                        <div id="custom-search-input">
                                @method('PUT')
                                @csrf
                            <div class="input-group ">
                                <input id="search" name="name" type="text" class="form-control" placeholder="نام کاربر" autocomplete="off"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success " style="margin-top: 8px">اضافه کردن</button>
                        </form>

                    </div>
                </div>

            </div>
    </section>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var route = "{{ url('autocomplete') }}";
        $('#search').typeahead({
            source:  function (term, process) {
                return $.get(route, { term: term }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection

