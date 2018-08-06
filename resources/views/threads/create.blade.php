    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new thread</div>

                <div class="card-body">
                    <form method ="POST" action="/threads">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title"> EL titel</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                         <div class="form-group">
                            <label for="body"> BodyLabel</label>
                            <textarea  class="form-control" id="body" name="body" rows="8"></textarea>
                        </div>
                        <button type="submit" class ="btn btn-primary"> publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
