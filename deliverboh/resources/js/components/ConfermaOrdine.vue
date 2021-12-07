<template>
    <section>
        <h1>Sono la pagina Conferma Ordine</h1>
        <div class="container-conf-ordine">
            <div class="big-box">
                <!-- scontrino di riepilogo dell'ordine  -->
                <div class="box-riepilogo">
                    <h2>Riepilogo</h2>
                    <div class="sezione-piatto">
                        <div class="piatti">
                            <h3>Pizza ai funghi</h3>
                            <p>3 x € 8,00 = € 24,00</p>
                        </div>
                    </div>
            <!-- //cancellare da qui in giù -->
                    <div class="sezione-piatto">
                        <div class="piatti">
                            <h3>Margherita</h3>
                            <p>2 x € 5,00 = € 10,00</p>
                        </div>
                    </div>
            <!-- cancellare fino qui -->
                    <div class="sezione-totale">
                        <h2>Totale</h2>
                        <div class="totale">
                            <h4>€ 34,00</h4>
                        </div>
                    </div>
                    <div class="note-cliente">
                        <h5>NOTE:</h5>
                        <p>Una Pizza Margherita senza Mozzarella.
                            Grazie
                        </p>
                    </div>
                    <div class="btn">
                        <button  type="submit" class="button">Modifica il tuo ordine</button>
                    </div>
                    
                </div>
                <!-- Fine scontrino di riepilogo dell'ordine  -->
                <!-- Sezione pagamento con carta  -->
                <div class="box-pago">
                    <h2>Inserisci i tuoi dati per la consegna</h2>
                    <form class="row coll-12">
                        <div class="col-6 input">
                            <label for="inputName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Inserisci il tuo nome">
                        </div>
                        <div class="col-6 input">
                            <label for="inputLastname" class="form-label">Cognome</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="Inserisci il tuo cognome">
                        </div>
                        <div class="col-12 input">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="col-12 input">
                            <label for="inputAddress" class="form-label">Indirizzo</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Via/Corso, numero città CAP ">
                        </div>
                        <div class="col-12 input">
                            <span class="">Note di consegna</span>
                            <textarea class="form-control text-area" aria-label="With textarea"></textarea>
                        </div>
                        <h2>Inserisci i dati della carta</h2>
                        <div class="col-12 input">
                            <label for="inputCardNumber" class="form-label">Numero carta</label>
                            <input type="text" class="form-control" id="inputCard" placeholder="Inserisci il numero della carta">
                        </div>
                         <div class="col-6 input">
                            <label for="inputDate" class="form-label">Data scadenza</label>
                            <input type="text" class="form-control" id="inputName" placeholder="MM/YY">
                        </div>
                        <div class="col-6 input">
                            <label for="inputCVV" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="xxx">
                        </div>
                        <div class="box-tot">
                            <h3 class="totale">Totale € 34,00</h3>
                            <button  type="submit" class="button">Procedi al pagamento</button>
                        </div>
                    </form>
                </div>
                <!-- Fine sezione pagamento con carta  -->
            </div> 
        </div>     
    </section>
</template>

<script>
export default {
    
    name: "ConfermaOrdine",
    data() {
       
    },
    created() {},
    methods: {},
};
</script>


<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap');
// FontAwesome
//@import "node_modules/font-awesome/scss/font-awesome.scss";
// @import "../partial/color.scss";

.container-conf-ordine {
    width: 100%;
    height: 100%;
    background-image: linear-gradient(to bottom right, #b5d8ba 20%, #f1c692 80%);
    display: flex;
    justify-content: center;
    align-items: center;
    .big-box {
        width: 60%;
        display: flex;
        .box-riepilogo {
            display: column;
            width: 40%;
            min-width: 300px;
            margin: 20px;
            padding: 20px;
            border-radius: 5px;
            border-bottom-right-radius: 40px;
            box-shadow: 5px 10px 18px #a09f9f;
            background-color: white;
            h2 {
                border-bottom: 1px solid #439373;
                color: #be541e;
                padding: 10px;
            }
            .sezione-piatto {
                margin-bottom: 20px;
                h3 {
                    margin-bottom: 10px;
                }
                p {
                    text-align: right;
                }
            }
            .sezione-totale {

                h4 {
                font-size: 30px;
                color: #be541e;
                text-align: right;
                }
            }
            .note-cliente {
                height: 100px;
                margin-top: 40px;
                border: 1px solid #be541e;
                padding: 8px;
                border-radius: 5px;
            } 
            .btn {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 200px;
                
                button {
                    padding: 10px;
                    border: none;
                    border-color: #439373;
                    border-radius: 3px;
                    border-bottom-right-radius: 10px;
                    background-color:  #439373;
                    color: #f4f0e2;
                    transition: 0.6s;
                }
                button:hover {
                    border-color: #f1c692;
                    border-radius: 3px;
                    border: none;
                    border-bottom-right-radius: 10px;
                    background-color:  #f1c692;
                    color: #343434;
                }  
            }
        }
        .box-pago {
            width:60%;
            min-width: 300px;
            position: relative;
            margin: 20px;
            padding: 20px;
            border-radius: 5px;
            border-bottom-right-radius: 40px;
            box-shadow: 5px 10px 18px #a09f9f;
            background-color: white;
            h2 {
                margin-bottom: 15px;
                border-bottom: 1px solid #439373;
                color: #be541e;
                padding: 10px;
            }
            form {
                margin-top: 30px;
                .input {
                    margin-top: 30px;
                }
                input {
                    width: 100%;
                    height: 30px;
                    margin-top: 10px;
                    padding: 10px;
                }
                .text-area {
                    width: 100%;
                    height: 60px;
                    margin: 10px 0;
                    padding: 10px;
                }
                .box-tot {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    width: 100%;
                    height: 200px;                    
                    button {
                        
                        padding: 10px;
                        border: none;
                        border-color: #be541e;
                        border-radius: 3px;
                        border-bottom-right-radius: 10px;
                        background-color: #be541e;
                        color: #f4f0e2;
                        transition: 0.6s;
                    }
                    button:hover {
                        border-color: #f1c692;
                        border-radius: 3px;
                        border: none;
                        border-bottom-right-radius: 10px;
                        background-color: #f1c692;
                        color: #343434;
                    } 
                }  
            }
        }   
    }
}


</style>