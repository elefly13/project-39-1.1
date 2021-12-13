<template>
    <section class="cart"> 
        <div id="mySidepanel" class="sidepanel" style="width: 50px">
            <div class="sidepanel-left">
                <a @click="openNav()" class="openbtn"><img class="cart-logo" :src="'../images/icons/cart.svg'" alt=""></a>
                <img class="hastag" :src="'../images/icons/hastag.svg'" alt="">
                <a class="closebtn" @click="closeNav()">×</a>
            </div>
            <div class="sidepanel-right" > 
                <div class="scontrino">
                    <ul v-for="(dish, index) in cartContent" :key="index">
                        <li>{{ dish.name }}</li>
                        <li class="contenitore-qnt"> 
                            <div>€ {{ dish.price }}</div>
                            <div>
                                {{ dish.quantity }}
                                <button class="elimina" @click="((dish.quantity > 1 ) ? dish.quantity-- : cartContent.splice(index ,1)), lessQuantity(dish.id)">x</button>
                            </div>
                        </li>
                    </ul>
                </div>
            <div class="panel-footer">
                <span>totale: € {{ price.toFixed(2) }}</span>
                <form method="post" action="/checkout">
                    <input type="hidden" name="_token" v-bind:value="csrf">
                        <div class="panel-body" v-for="(dish, index) in cartContent" :key="index">
                            <input  type="hidden" name="price[]" v-bind:value="dish.price">
                            <input  type="hidden" name="name[]" v-bind:value="dish.name">
                            <input  type="hidden" name="description[]" v-bind:value="dish.description">
                            <input  type="hidden" name="quantity[]" v-bind:value="dish.quantity">
                            <input  type="hidden" name="id[]" v-bind:value="dish.id">
                        </div>
                    <button class="cart-btn" v-if="price!=0" >Procedi al pagamento</button>
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
            finalPrice: 0,
            price: 0,
            test: 0,
            api_token:"bbzRf42NwlCuPIdwL7AiHgXskzLa69GB61Tn8QA7VZ1woSustPL1NfelqeHpfolpwhwX6lR1OolmJf3k",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    watch: {
        flag: function() {
            let x = window.matchMedia("(min-width: 575px)");
            if (x.matches) {
                    document.getElementById("mySidepanel").style.width = "250px";
                    document.getElementById("openbtn").style.width = "250px";
            }
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

    .contenitore-qnt {
        list-style-type: none;
        border-bottom: 0.5px solid grey;
        padding-bottom: 5px;
        display: flex;
        justify-content: space-between;
    }

    .scontrino {
        width: 100%;
        height: calc(100% - 50px);
        height: 380px;
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        overflow-y: auto;
    }

    .scontrino > ul {
        list-style-type: none;
    }

    .panel-footer {
        position: absolute;
        bottom: 12px;
        right: 0;
        width: calc(100% );
        height: 50px;
        text-align: center;
        background: white;
    }
                
    .cart {
        position: relative;
        padding-top: 5vh;
    }

    .cart-logo {
        width: 30px;
    }

    .sidepanel {
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
        width: 50px;
    }

    .sidepanel-right {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-left: 10px;
        width: calc(100% - 50px);
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

    .cart-btn {
        box-shadow: 5px 10px 18px #a09f9f;
        padding: 5px;
        border: none;
        border-color: #439373;
        border-radius: 3px;
        border-bottom-right-radius: 10px;
        background-color:  #439373;
        background-color:  #E69E42;
        background-color:  #EBBB57;
        color: #f4f0e2;
        transition: 0.6s;
        font-size: 12px;
    }

    .elimina {
        box-shadow: 5px 10px 18px #dadada;
        padding: 5px;
        margin-right: 10px;
        border: none;
        border-color: #439373;
        border-radius: 3px;
        border-bottom-right-radius: 10px;
        background-color:  #EBBB57;
        color: #f4f0e2;
        font-size: 12px;
    }

@media screen and (max-width: 575px) {

        .scontrino {
            width: 100%;
            height: calc(100% - 50px);
            height: 380px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            overflow-y: auto;
        }

        .cart {
            position: relative;
            padding-top: 0vh;
            height: 445px;
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