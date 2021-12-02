<template>
    <section>
        <div class="area-carrello">
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
                                <li>{{ dish[index].name }}</li>
                                <li>{{ dish[index].description}}</li>
                                <li>{{ dish[index].ingredients }}</li>
                                <li>{{ dish[index].price }}</li>
                                <li>
                                    <button @click="dish[index].quantity++">+</button>
                                    {{ dish[index].quantity }}
                                    <button @click="((dish[index].quantity > 1 ) ? dish[index].quantity-- : null)">-</button>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <span>totale: {{ price }} €</span>
                            <button class="cart-btn" @click="getTotalPrice()">calcola prezzo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
</template>

<script>
export default {
    
    name: "Cart",
    props: ['cartContent'],
    data() {
        return {
            price: 0,
        };
    },
    methods: {
        getTotalPrice() {
            console.log(this.cartContent)
            let somma = 0;
            for(let i = 0; i < this.cartContent.length; i++) {
               
                let tmp = this.cartContent[i];
        
                let totalPrice = tmp[i].quantity * tmp[i].price;
                somma += totalPrice;
                console.log(tmp[i].price)
                
            }
            return this.price = somma;
        }
    },       
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
            background-color: white;
            width: 230px;
            border-radius: 20px;
            // .cart-title {
                
            // }
            .cart-btn {
                font-size: 15px;
                margin: 10px;
                padding: 5px;
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
                border-color: #f1c692;
                border-radius: 3px;
                border-bottom-right-radius: 10px;
                background-color:  #f1c692;
                color: #343434;
            }
        }
    }
</style>