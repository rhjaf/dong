@extends('user.main')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row ">
                        <div class="col-12 mb-4 col-xl-12 mb-xl-0">
                            <h3 class="text-muted text-right mb-3">لیست گروه ها</h3>
                                @if(\Illuminate\Support\Facades\Session::has('group-update'))
                                        <div class="ml-auto alert-success alert">{{\Illuminate\Support\Facades\Session::get('group-update')}}</div>
                                @elseif(\Illuminate\Support\Facades\Session::has('group-create'))
                                    <div class="ml-auto alert-success alert">{{\Illuminate\Support\Facades\Session::get('group-create')}}</div>
                                @elseif(\Illuminate\Support\Facades\Session::has('group-delete'))
                                        <div class="ml-auto alert-success alert">{{\Illuminate\Support\Facades\Session::get('group-delete')}}</div>
                                @endif
                                @yield('content')
                            {{--<div class="row">
                                <div class="col-sm-3">
                                    <form action="{{route('roles.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                            <button class="btn btn-block btn-success mt-3" type="submit">Add Role</button>
                                        </div>
                                    </form>
                                </div>--}}

                            </div>
                        <div class="col-sm-3">
                            <form action="{{route('group.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="name">نام گروه</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="نام گروه">
                                </div>
                                <div class="form-group">
                                    <label for="avatar">تصویر گروه</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control-file">
                                </div>
                                <button type="submit" class="btn btn-block btn-success">ایجاد گروه</button>
                            </form>
                        </div>
                        <div class="col-sm-9">
                            <table class="table bg-light text-center table-striped">
                                <thead>
                                <tr class="text-muted">
                                    <th>#</th>
                                    <th>نام گروه</th>
                                    <th>لینک</th>
                                    <th>پروفایل</th>
                                    <th>ادمین</th>
                                    <th>حذف</th>
                                    <th>ویرایش</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($groups as $grp)
                                    <tr>
                                        @php
                                            $i++;
                                        @endphp
                                        <th>{{$i}}</th>
                                        <td>{{$grp->name}}</td>
                                        <td>{{$grp->link}}</td>
                                        <td><img width="30px" src="/uploads/avatars/{{$grp->avatar}}" class="rounded-circle img-thumbnail"></td>
                                        <td>{{\App\User::where('id',$grp->admin)->first()->name}}</td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->userIsAdmin($grp))
                                            <td class="text-center">
                                                <form method="POST" action="{{route('group.destroy',$grp->id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-block btn-light "><i class="text-danger fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{route('group.edit',$grp->id)}}"><i class="fas fa-edit text-primary"></i></a>
                                            </td>
                                        @else
                                            <td>{{'تنها مدیر گروه این کار را میتواند بکند'}}</td>
                                            <td>{{'تنها مدیر گروه این کار را میتواند بکند'}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- pagination -->

                            <nav>
                                <ul class="pagination justify-content-center">
                                    {{ $groups->links() }}
                                </ul>
                            </nav>
                        </div>

@endsection
