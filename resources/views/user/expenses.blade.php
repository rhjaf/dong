@extends('user.main')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center">

                    </div>
                    <div class="row ">
                        <div class="col-12 mb-4 col-xl-12 mb-xl-0">
                            <h3 class="text-muted text-right mb-3">هزینه ها</h3>
                            @if(\Illuminate\Support\Facades\Session::has('-update'))
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
                            <label for="group">گروه</label>
                                <select name="select-group" id="select-group">
                                    <option value="0" disabled="disabled" selected="selected">گروه مورد نظر را انتخاب کنید</option>
                                    @foreach($user->groups()->get() as $grp)
                                        <option value="{{$grp->id}}">{{$grp->name}}</option>
                                    @endforeach
                                </select>
{{--                            {{route('expense.store')}}--}}
                            <span id="expense-form"></span>
                        </div>
                        <div class="col-sm-9 ">
                            <table class="table bg-light text-center table-striped">
                                <thead>
                                <tr class="text-muted">
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>گروه</th>
                                    <th>مبلغ</th>
                                    <th>پرداخت كننده</th>
                                    <th>مشاركت كنندگان</th>
                                    <th>تاريخ پرداخت</th>
                                    <th>تاييد</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach(\Illuminate\Support\Facades\Auth::user()->groups()->get() as $grp)
                                    @foreach( \Illuminate\Support\Facades\DB::table('expenses')->where('accepted','=',0)->get() as $row)
                                        @if($row->group_id==$grp->id)
                                            <tr>
                                                @php
                                                    $i++;
                                                @endphp
                                                <th>{{$i}}</th>

                                                <td>{{$row->name}}</td>
                                                <td>{{\App\Group::where('id',$row->group_id)->first()->name}}</td>
                                                <td>{{number_format($row->cost,'2','.',',') }}  </td>
                                                <td>{{\App\User::where('id',$row->payer)->first()->name}}</td>
                                                <td>
                                                    @php
                                                        $participants = explode('!',$row->participants);
                                                        $res = '';
                                                    foreach ($participants as $p){
                                                        $participant = \App\User::where('id',$p)->first()->name;
                                                        $res .= $participant.' - ';
                                                    }
                                                    $res = substr($res,0,-2);
                                                    echo $res;
                                                    @endphp
                                                </td>
                                                <td>{{$row->created_at}}</td>
                                                <td class="text-center">
                                                    <form method="POST" action="{{route('user.expenses.accept',[$row->id])}}">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-block btn-primary">
                                                            تاييد
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            <!-- pagination -->

                            {{--<nav>
                                <ul class="pagination justify-content-center">
                                    {{ $groups->links() }}
                                </ul>
                            </nav>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
@section('script')
    <script>
        $('#select-group').on('change',function (event){
            // event.preventDefault();
            // $('#expense-form fieldset').removeAttr('disabled');
            let group_id = event.target.value
            let url = "{{ route('user.expenses.make',[\Illuminate\Support\Facades\Auth::user()->id,':id'])}}";
            url = url.replace(':id',group_id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data){
                    console.log('yess')
                    $data = $(data); // the HTML content that controller has produced
                    $('#expense-form').hide().html($data).fadeIn();
                },
                error:function (err) {
                    console.log(err)
                }
            });
            console.log(url)
        })
    </script>
@endsection
