@extends('layouts.app')

@section('content')
<div class="container-fluid-special">
    <div class="row justify-content-center">
        <div class="big-box col-md-8 col-lg-12">
            <h1>Il tuo Ordine non è andato a buon fine</h1>
            <h3>Controlla che tutto sia corretto!</h3>
            <a href="/">Torna al pagamento</a> 
        </div>
        <div class="col-md-10">
            <div class="box-animazione">
                <img src="../images/paese.svg" alt="">
                <div class="bici">
                    <img class="fallito" src="../images/bike.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



