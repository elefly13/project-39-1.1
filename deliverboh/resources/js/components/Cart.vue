<template>
    <section class="cart"> 

        <div id="mySidepanel" class="sidepanel">
            <div class="sidepanel-left">
                <a @click="openNav()" class="openbtn"><img class="cart-logo" :src="'../images/icons/cart.svg'" alt=""></a>
                <img class="hastag" :src="'../images/icons/hastag.svg'" alt="">
                <a class="closebtn" @click="closeNav()">×</a>
            </div>
              
            <div class="sidepanel-right" > 
                
               
                    <ul v-for="(dish, index) in cartContent" :key="index">
                        <li>{{ dish.name }}</li>
                        <li>€ {{ dish.price }}</li>
                        <li>
                            {{ dish.quantity }}
                            <button @click="((dish.quantity > 1 ) ? dish.quantity-- : cartContent.splice(index ,1)), lessQuantity(dish.id)">-</button>
                        </li>
                    </ul>
               
                
                <div class="panel-footer">
                    <span>totale: € {{ price.toFixed(2) }}</span>
                    <form method="post" action="/checkout">
                        <input type="hidden" name="_token" v-bind:value="csrf">
                            <!-- <input type="hidden" name="prova" v-bind:value="this.prova[0]"> -->
                            
                            <div class="panel-body" v-for="(dish, index) in cartContent" :key="index">
                                <input  type="hidden" name="price[]" v-bind:value="dish.price">
                                <input  type="hidden" name="name[]" v-bind:value="dish.name">
                                <input  type="hidden" name="description[]" v-bind:value="dish.description">
                                <input  type="hidden" name="quantity[]" v-bind:value="dish.quantity">
                                <input  type="hidden" name="id[]" v-bind:value="dish.id">
                        </div>

                        <button class="cart-btn" v-if="price!=0"  >Procedi al pagamento</button>
                    </form>
                </div>
                
            </div>
        </div>
       
        
    </section>
</template>

<script>
export default {
    
    name: "Cart",
    props: ['cartContent','initialPrice' , 'flag'],
   
    data() {
        return {
            // prova:this.cartContent,
            finalPrice: 0,
            price: 0,
            test: 0,
            api_token:"bbzRf42NwlCuPIdwL7AiHgXskzLa69GB61Tn8QA7VZ1woSustPL1NfelqeHpfolpwhwX6lR1OolmJf3k",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

        };
    },

    watch: {
        flag: function() {
            document.getElementById("mySidepanel").style.width = "250px";
            document.getElementById("openbtn").style.width = "250px";
        },
        cartContent: function () {
            let somma = 0;

            for (const i in this.cartContent) {

                let totalPrice = this.cartContent[i].quantity * this.cartContent[i].price;
                somma += totalPrice;   
            }
            
            this.price = somma;
        },
    },

    methods: {
        lessQuantity(id) {
            for (const i in this.cartContent) {
                if (this.cartContent[i].id == id) {
                    this.price -= this.cartContent[i].price
                }
            }
        },
        
        openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
            document.getElementById("openbtn").style.width = "250px";
            console.log('ciao')
        },

        closeNav() {
            document.getElementById("mySidepanel").style.width = "60px";
            document.getElementById("openbtn").style.width = "60px";
            console.log('ciao')
        },
    }
};
</script>

<style lang="scss" scoped>
              
    .cart {
        position: relative;
        padding-top: 5vh;
    }

    .cart-logo {
        width: 30px;
    }
    .sidepanel  {
        display: flex;
        width: 60px;
        position: relative;
        z-index: 99;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        background-color: white;
        overflow: hidden;
        transition: 0.5s;
    }

    .sidepanel-left {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel-right {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel a {
        margin: 10px 0;
        text-decoration: none;
        display: block;
        transition: 0.3s;
    }

    .icon_social {
        height: 20px;
        width: 20px;
    }

    .hastag {
        width: 25px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: white;
        padding: 10px 15px;
        border: none;
        width: 60px;
    }

    .closebtn {
        font-size: 50px;
        cursor: pointer;
    }

    @media screen and (max-width: 575px) {
        .cart {
        position: relative;
        padding-top: 5vh;
        display: none;
    }

    .cart-logo {
        width: 30px;
    }
    .sidepanel  {
        display: flex;
        width: 30px;
        position: relative;
        z-index: 99;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        background-color: rgb(220, 26, 26);
        overflow: hidden;
        transition: 0.5s;
    }

    .sidepanel-left {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel-right {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel a {
        margin: 10px 0;
        text-decoration: none;
        display: block;
        transition: 0.3s;
    }

    .hastag {
        width: 25px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: white;
        padding: 10px 15px;
        border: none;
        width: 60px;
    }

    .closebtn {
        font-size: 50px;
        cursor: pointer;
    }

    }


@media screen and (min-width:320px) and (max-width:736px) and (orientation:landscape) {
    .cart {
        position: relative;
        padding-top: 5vh;
        // display: none;
    }
    .cart-logo {
        width: 20px;
        display: flex;
        justify-content: center;
        text-align: center;
    }
    .sidepanel  {
        display: flex;
        width: 40px;
        position: relative;
        z-index: 99;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        // background-color: rgb(220, 26, 26);
        overflow: hidden;
        transition: 0.5s;
        height: 280px;
    }

    .sidepanel-left {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel-right {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel a {
        margin: 10px 0;
        text-decoration: none;
        display: block;
        transition: 0.3s;
    }

    .hastag {
        width: 15px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        border: none;
        width: 50px;
    }

    .closebtn {
        font-size: 50px;
        cursor: pointer;
    }
}

@media screen and (min-width:320px) and (max-width:1280px) and (orientation:landscape) {
    .cart {
        position: relative;
        padding-top: 5vh;
        // display: none;
    }
    .cart-logo {
        width: 20px;
        display: flex;
        justify-content: center;
        text-align: center;
    }
    .sidepanel  {
        display: flex;
        width: 40px;
        position: relative;
        z-index: 99;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        // background-color: rgb(220, 26, 26);
        overflow: hidden;
        transition: 0.5s;
        height: 280px;
    }

    .sidepanel-left {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel-right {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel a {
        margin: 10px 0;
        text-decoration: none;
        display: block;
        transition: 0.3s;
    }

    .hastag {
        width: 15px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        border: none;
        width: 50px;
    }

    .closebtn {
        font-size: 50px;
        cursor: pointer;
    }
}

   
</style>