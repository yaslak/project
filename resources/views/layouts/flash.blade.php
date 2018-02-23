@if(Session()->has('success'))
    <div class="container-fluid m-0 fixed-bottom alert alert-dark">
        <a href="#" class="align-middle">
            {{ Session::get('success','session flash ici') }}
        </a>
    </div>
@endif
@if(Session()->has('permission_cookies'))
    <div class="container-fluid m-0 fixed-bottom alert alert-dark">
    <span class="align-middle">
        {{ Session()->get('permission_cookies','session flash ici') }}
    </span>
        <form action="/permissions" method="POST" class="form-inline float-right">
            {{ csrf_field() }}
            <input type="submit" value="Ok" class="btn btn-outline-warning">
        </form>
    </div>
@endif