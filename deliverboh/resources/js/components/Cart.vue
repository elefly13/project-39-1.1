<template>
    <section class="cart"> 
        <button class="openbtn" @click="openNav()"><img class="cart-logo" :src="'../images/icons/carrello.svg'" alt=""></button>

        <div id="mySidepanel" class="sidepanel">
            <a class="closebtn" @click="closeNav()">×</a>
            <a >About</a>
            <a >Services</a>
            <a >Clients</a>
            <a >Contact</a>
        </div>

       
        <!-- <div class="area-carrello">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="cart-title">
                            <a data-toggle="collapse" href="#collapse1">Carrello</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body" v-for="(dish, index) in cartContent" :key="index">
                            <ul>
                                <li>{{ dish.name }}</li>
                                <li>{{ dish.description}}</li>
                                <li>{{ dish.ingredients }}</li>
                                <li>{{ dish.price }}</li>
                                <li>
                                    <!-- <button @click="dish.quantity++, moreQuantity(dish.id)">+</button> -->
                                    <!-- {{ dish.quantity }} -->
                                    <!-- <button @click="((dish.quantity > 1 ) ? dish.quantity-- : cartContent.splice(index ,1)), lessQuantity(dish.id)">x</button> -->
                                <!-- </li> -->
                            <!-- </ul> -->
                        <!-- </div> -->
                        <!-- <div class="panel-footer">
                            <span>totale: {{ price + this.finalPrice}} €</span>
                            <form method="post" action="/checkout">
                               <input type="hidden" name="_token" v-bind:value="csrf">
                                 <!-- <input type="hidden" name="prova" v-bind:value="this.prova[0]"> -->
                                  
                                 <!-- <div class="panel-body" v-for="dish in cartContent" :key="dish.id"> -->
                                     <!-- <input  type="hidden" name="price[]" v-bind:value="dish.price"> -->
                                     <!-- <input  type="hidden" name="name[]" v-bind:value="dish.name"> -->
                                     <!-- <input  type="hidden" name="description[]" v-bind:value="dish.description"> -->
                                     <!-- <input  type="hidden" name="quantity[]" v-bind:value="dish.quantity"> -->
                                     <!-- <input  type="hidden" name="id[]" v-bind:value="dish.id"> -->
                                <!-- </div> -->

                                <!-- <button class="cart-btn" v-if="price!=0"  >Procedi al pagamento</button> -->
                            <!-- </form> -->
                            
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div>   -->
    </section>
</template>

<script>
export default {
    
    name: "Cart",
    props: ['cartContent','initialPrice'],
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
        initialPrice: function () {
            this.finalPrice = this.initialPrice
        },
        cartContent: function () {
            let somma = 0;
            
            for (const i in this.cartContent) {
                let totalPrice = this.cartContent[i].quantity * this.cartContent[i].price;
                somma += totalPrice;   
            }
            
            this.price = somma;

            
            if(this.cartContent == 0) {
                this.finalPrice = 0
            }
        },
    },
    methods: {
        
        openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
            console.log('ciao')
        },

        closeNav() {
            document.getElementById("mySidepanel").style.width = "60px";
            console.log('ciao')
        },

        console(array){
            console.log(array);
        },
        // moreQuantity(id) {
        //     for (const i in this.cartContent) {
        //         if (this.cartContent[i].id == id) {
        //             this.price += this.cartContent[i].price
        //         }
        //     }
        //     console.log(this.cartContent)
        // },
        lessQuantity(id) {
            for (const i in this.cartContent) {
                if (this.cartContent[i].id == id) {
                    this.price -= this.cartContent[i].price
                }
            }
        }
    }
};
</script>

<style lang="scss" scoped>
    ul {
        list-style: none;
    }
    .area-carrello {
        position: absolute;
        z-index: 99;
        right: 0;
        .panel-group {
            padding: 20px;
            background-color: fdf6e0;
            width: 400px;
            border-bottom-left-radius: 20px;
            box-shadow: 5px 10px 18px #cfcece;
            .cart-title {
                text-align: center;
                a {
                    color: #439373;
                }
            }
            .cart-btn {
                font-size: 15px;
                margin: 10px;
                padding: 5px;
                border: none;
                border-color: #439373;
                border-radius: 3px;
                border-bottom-right-radius: 10px;
                background-color:  #439373;
                color: #f4f0e2;
                transition: 0.6s;
            }
            .cart-btn:hover {
                margin: 10px;
                padding: 5px;
                border: none;
                border-color: #f1c692;
                border-radius: 3px;
                border-bottom-right-radius: 10px;
                background-color:  #f1c692;
                color: #343434;
            }
        }
    }
    .cart {
        position: relative;
    }

    .cart-logo {
        width: 30px;
    }
    .sidepanel  {
        display: flex;
        flex-direction: column;
        align-self: flex-end;
        width: 0;
        position: relative;
        z-index: 99;
        // height: 250px;
        background-color: white;
        overflow: hidden;
        transition: 0.5s;
        
        // padding-top: 60px;
    }

    .sidepanel a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        // color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidepanel a:hover {
        color: #f1f1f1;
    }

    .sidepanel .closebtn {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 36px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: white;
        // color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        // background-color:#444;
    }
</style>