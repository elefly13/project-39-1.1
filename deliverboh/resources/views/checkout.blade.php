@extends('layouts.app')

@section('content')

{{-- prima sezione codice Fede --}}
@if (session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- Fine prima sezione codice Fede --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-8 big-box">

                    <!-- scontrino di riepilogo dell'ordine  -->
                <div class="box-riepilogo col-sm-12 col-md-3">
                    <h4 class="titolo-check">Riepilogo</h4>
                    <div class="sezione-piatto">
                        @for ($i=0; $i< count( $cart['name'] ); $i++ )
                        <div class="piatti">
                            <h6 class="text-h6-check">{{$cart['name'][$i]}}</h6>
                            <p class="text-p-chek">{{$cart['quantity'][$i]}} x € {{$cart['price'][$i]}} </p>
                        </div>
                        @endfor
                    </div>
                    <div class="sezione-totale">
                        <h4 class="titolo-check">Totale</h4>
                        <div class="totale">
                            <h5 class="text-h5-check">€ {{$cart['sum']}}</h5>
                        </div>
                    </div>
                    {{-- <div class="note-cliente">
                        <h6>NOTE:</h6>
                        <p>Una Pizza Margherita senza Mozzarella.
                            Grazie
                        </p>
                    </div> --}}
                    {{-- <div class="col-12 btn">
                        <button type="submit" class="button button-check">Modifica il tuo ordine</button>
                    </div> --}}
                </div>
                <!-- Fine scontrino di riepilogo dell'ordine  -->

                <!-- Sezione pagamento con carta  -->
                <div class="box-pago col-sm-12 col-md-6">
                    <h4 class="titolo-check">Inserisci i tuoi dati per la consegna</h4>
                    <form class="row coll-12" method="post" id="payment-form" action="{{ url('/conferma') }}">
                        @csrf
                        @method('POST')
                            @for ($i=0; $i< count( $cart['name'] ); $i++ )
                                <input  type="hidden" name="quantity[]" value="{{$cart['quantity'][$i]}}">
                            @endfor
                        @foreach ($cart['dish_id'] as $pip)
                        <input  type="hidden" name="id[]" value="{{$pip}}">
                        @endforeach
                        <div class="col-12 input">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control input-check " id="name" name="name" placeholder="Inserisci il tuo nome">
                        </div>
                        <div class="col-12 input">
                            <label for="lastname" class="form-label">Cognome</label>
                            <input type="text" class="form-control input-check" id="lastname" name="lastname" placeholder="Inserisci il tuo cognome">
                        </div>
                        <div class="col-12 input">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control input-check" id="email" name="email" placeholder="name@example.com">
                        </div>
                        <div class="col-12 input">
                            <label for="address" class="form-label">Indirizzo</label>
                            <input type="text" class="form-control input-check" id="address" name="address" placeholder="Via/Corso, numero città CAP ">
                        </div>
                        <div class="col-12 input">
                            <label  class="form-label">Note di consegna</label>
                            <textarea class="form-control text-area" aria-label="With textarea"></textarea>
                        </div>
                        <div class="col-12 input">
                            <label for="amount" class="col- 12 box-totale-check">
                                <span class="input-label text-totale-check">Totale</span>
                                <span class="input-wrapper amount-wrapper">
                                    <div class="num-tot-check">€ {{$cart['sum']}}</div>
                                    <input class=" my-total " id="amount" name="amount" type="hidden" min="1" placeholder="Amount" value="{{$cart['sum']}}" readonly>
                                </span>
                            </label>
                        </div>
                        <div class="col-12 input">
        
                            <div class="bt-drop-in-wrapper">
                                <div id="bt-dropin"></div>
                            </div>
                        </div>
                        <div class="col-12 input btn">
                            <input class="form-control input-check" id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="button button-check" type="submit"><span>Procedi al pagamento</span></button>
                        </div>

                    </form>
                </div>
                <!-- Fine sezione pagamento con carta  -->
        </div>
    </div>
</div>

<script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{$token}}";

    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      }
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();

        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }

          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
</script>

@endsection
  
 {{-- codice di Federico  --}}
{{-- @for ($i=0; $i< count( $cart['name'] ); $i++ )
<div> {{$cart['name'][$i]}}  quantità:{{$cart['quantity'][$i]}} {{$cart['price'][$i]}}€</div>
<div>{{$cart['description'][$i]}} </div>
@endfor
 
  
<form method="post" id="payment-form" action="{{ url('/conferma') }}">
  @csrf
    @foreach ($cart['dish_id'] as $pip)
    <input  type="hidden" name="id[]" value="{{$pip}}">
    @endforeach
    @for ($i=0; $i< count( $cart['name'] ); $i++ )
  <input  type="hidden" name="quantity[]" value="{{$cart['quantity'][$i]}}">
    @endfor

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="note">note</label>
                                 <textarea  type="text" class="form-control" id="note" name="note"></textarea>
                            </div>
                        </div>
                <section>
                    <label for="amount">
                        <span class="input-label">Amount</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$cart['sum']}}" readonly>
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit"><span>Test Transaction</span></button>
            </form>
            <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{$token}}";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script> --}}
