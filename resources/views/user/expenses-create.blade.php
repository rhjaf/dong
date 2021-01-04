<form action="@if ($user->id==$group->admin) {{route('user.expenses.store',[$user,$group])}}
@else {{route('user.expenses.create',[$user,$group])}}
@endif" method="post" name="expense-form" id="expense-form" enctype="multipart/form-data">
    @csrf
    @method('POST')
    @if ($user->id!=$group->admin)
        <div class="alert-danger p-1">شما مدیر این گروه نیستید</div>
    @endif
    <fieldset >
        <div class="form-group">
            <label for="name">عنوان </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="cost">مبلغ </label>
            <input type="number" name="cost" id="cost" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="payer">
                <select name="payer">
                    @foreach($group->users()->get() as $usr)
                        <option value="{{$usr->id}}">{{$usr->name}}</option>
                    @endforeach
                </select>
                پرداخت کننده </label>
        </div>
        <div class="form-group">
            <label for="participants">تقسیم بین : </label><br>
            @foreach($group->users()->get() as $usr)
                <input type="checkbox" value="{{$usr->id}}" id="user-{{$usr->id}}" name="participants[]]><label for="user-{{$usr->id}}"><img class="img-thumbnail rounded " width="30" src="/uploads/avatars/{{$usr->avatar}}">
            {{$usr->name}}</label><br>
            @endforeach

        </div>
        <div class="form-group">
            <label for="created_at">تاریخ پرداخت </label>
            <input type="datetime-local" name="created_at" id="created_at">
        </div>
        <button type="submit" class="btn btn-block btn-success">ایجاد هزینه</button>
    </fieldset>
</form>
