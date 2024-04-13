<div>
    <h1>hello {{ Auth::guard('admin')->user()->name }}</h1>
</div>
<form action="{{route('admin-log-out')}}" method="POST">
    @csrf
    <input type="submit" value="logout">
</form>

