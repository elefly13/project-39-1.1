<template>
    <section>
        <div class="container-menu">
            <div class="top">
                <div>
                    <p class="saluto">Benvenuto nel nostro ristorante</p>
                    <h1>Nome ristorante selezionato</h1>
                    <h3>Il nostro menu</h3>
                </div>
                
                <div class="box-img">
                    <img :src="'../images/citta.png'" alt="">
                </div>
            </div>
            <Cart :cartContent="cart"/>
            <div class="box">
                <div class="big-box-img">
                    <div class="image" :key="dish['id']" v-for="dish in dishes">
                        <img :src="'./images/image-dish/' + dish.image" :alt="dish.name">
                        <h4>{{ dish.name }}</h4>
                        <p>{{ dish.description }}</p>
                        <h4>{{ dish.price }}€</h4>
                        <p>Ingredienti:</p>
                        <p>{{ dish.ingredients }}</p>
                        <p>Allergeni:</p>
                        <p :key="(allergenDish['id'])" v-for="allergenDish in allergenDishes">{{ allergenDish.allergen_id }}</p>
                        <button class="button" @click="sendCart(dish)">Aggiungi al carrello</button>               
                    </div> 
                </div>
            </div> 
        </div>
                
    </section>
</template>

<script>
import Cart from './Cart.vue';

export default {
    
    name: "Menu",
    components: {
        Cart,
    },
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            flag: false,
            dishes: [],
            allergens: [],
            allergenDishes: [],
            cart: [],
            price: 0,
            restaurant: 0,
            api_token:
                "bbzRf42NwlCuPIdwL7AiHgXskzLa69GB61Tn8QA7VZ1woSustPL1NfelqeHpfolpwhwX6lR1OolmJf3k",
   
        };
    },
    created() {
        this.getDishes();
        this.getAllergens();
        this.getAllergenDishes();
    },
    methods: {

        sendCart(dish) {
            if(this.restaurant == 0) {
                this.restaurant = dish.user_id
            }
            
            if(dish.user_id == this.restaurant) {
                this.cart.push(dish)
            } else {
                if(this.restaurant == 0) {
                    this.restaurant = dish.user_id
                }
                if(dish.user_id == this.restaurant) {
                    this.cart.push(dish)
                } else {
                    alert("Puoi ordinare da un solo ristorante alla volta")
                }
            }
        }, 
        getDishes(){
            const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'dishes' , bodyParameters, config)
                .then((resp)=>{
                    this.dishes = resp.data.results
                })
                .catch();
        },
         getAllergens(){
            const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'allergens', bodyParameters, config)
                .then((resp)=>{
                    this.allergens = resp.data.results
                })
                .catch();
        },
         getAllergenDishes(){
            const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'allergenDishes', bodyParameters, config)
                .then((resp)=>{
                    this.allergenDishes = resp.data.results
                })
                .catch();
        },
    },
};
</script>


<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Raleway', sans-serif;
}

.container-menu {
    width: 100%;
    background-color: white;

    .top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 0 60px;
        padding-top: 10px;
        background-color: #439373;
        .saluto {
            margin-left: 3px;
            color: #fff7df;
        }
        h1 {
            color:#f1c692;
            font-size: 34px;
        }
        h3 {
            color: #fff7df;
        }
        .box-img{
            width: 300px;
            img {
                width: 100%;
            }
        }
    }
    .box {
        display: flex;
        // background-image: linear-gradient(to bottom right, #b5d8ba 20%, #f1c692 80%);
       
        .big-box-img {
            width: 70%;
            // margin: 0 auto;
            padding: 40px;
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
        .image {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 250px;
            height: 400px;
            background-color:white ;
            border-radius: 5px;
            border-bottom-right-radius: 40px;
            transition: 0.5s;
            box-shadow: 5px 10px 18px #cfcece;
            
            padding: 10px;
            margin: 20px;
            img {
                width: 230px;
                height: 150px;
                object-fit: cover;
                border-radius: 5px;
                border-bottom-right-radius: 40px;
            }
            h4 {
               font-size: 18px; 
               color: #be541e; 
               padding: 8px 0;
               text-transform: capitalize;
            }
            p {
                font-size: 12px;
                padding: 3px 0;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2; /* number of lines to show */
                        line-clamp: 2; 
                -webkit-box-orient: vertical;                
                width: 200px; 
                 
            }
           
            button {
                position: absolute;
                left:-10%;
                bottom: 0;
                transform: translate(50%, 50%);
                box-shadow: 5px 10px 18px #a09f9f;
                margin: 10px;
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
                margin: 10px;
                padding: 10px;
                border: none;
                border-color: #f1c692;
                border-radius: 3px;
                border-bottom-right-radius: 10px;
                background-color:  #f1c692;
                color: #343434;
            }
        }
        .image:hover {
            transform: scale(1.05);
        }
        .image:active {
            transform: scale(1);
        }
    }
    .area-carrello {
        width: 30%;
        height: 100%;
        
    }
    }
}
</style>