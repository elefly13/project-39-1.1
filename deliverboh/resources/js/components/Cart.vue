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
                                <li>{{ dish.name }}</li>
                                <li>{{ dish.description}}</li>
                                <li>{{ dish.ingredients }}</li>
                                <li>{{ dish.price }}</li>
                                <li>
                                    <button @click="dish.quantity++, moreQuantity(dish.id)">+</button>
                                    {{ dish.quantity }}
                                    <button @click="((dish.quantity > 1 ) ? dish.quantity-- : cartContent.splice(index ,1)), lessQuantity(dish.id)">x</button>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <span>totale: {{ price }} €</span>
                            <button class="cart-btn">Procedi al pagamento</button>
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
            test: 0,
        };
    },
    watch: {
        cartContent: function() {

            let somma = 0;
            
            for (const i in this.cartContent) {
                let totalPrice = this.cartContent[i].quantity * this.cartContent[i].price;
                somma += totalPrice;   
            }
            this.price = somma;
        }
    },
    methods: {
        moreQuantity(id) {
            for (const i in this.cartContent) {
                if (this.cartContent[i].id == id) {
                    this.price += this.cartContent[i].price
                }
            }
        },
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
            background-color: white;
            width: 230px;
            border-bottom-left-radius: 20px;
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