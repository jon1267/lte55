@if (count($errors) > 0)
    <div class="row alert alert-danger " role="alert">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success tac" role="alert">
    <!--<div class="success tac"> раздражают цвета алертов- закомить стр выше,ниже оставит эту-->
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="row alert alert-danger " role="alert">
        {{ session('error') }}
    </div>
@endif