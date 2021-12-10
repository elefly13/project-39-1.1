<template>
    <section class="middle">

        <div class="middle-top">
            <Search @performSearch="searchRest"/>

            <div class="user-info" v-if="this.switchMenu == true">
                <span class="saluto">Benvenuto nel nostro ristorante</span>
                <span class="user-name">{{ this.restaurantName }}</span>
                <span class="menu-text">Il nostro menu</span>
                <button class="button" @click="emptyCart()">svuota carrello</button>
            </div>
        </div>
        
        <div class="middle-bottom">
            <div  v-if="this.switchMenu == false"  :class="((!categoriesArray.length == 0 || searchText != '') ? 'backgrey box-user' : 'box-user')">
                <div v-for="(user, index) in this.ristoranti" :key="index" class="container-card">
                    <button class="user-btn" @click="menuShow(user), $emit('menuFlag', switchMenu)"><User :info="user"/></button>
                </div>
            </div>

            <div v-if="this.switchMenu == true" class="box-menu">
                <Cart :cartContent="cart" :initialPrice="price"/> 
                <div v-for="(dish, index) in this.filterDishes" :key="index">
                    <div v-if="dish.visibility == 1" class="image">
                        <img :src="'./storage/' + dish.image" :alt="dish.name">
                        <h4>{{ dish.name }}</h4>
                        <p>{{ dish.description }}</p>
                        <h4>€ {{ dish.price }}</h4>
                        <p>Ingredienti:</p>
                        <p>{{ dish.ingredients }}</p>
                        <!-- <p>Allergeni:</p>
                        <p :key="(allergenDish['id'])" v-for="allergenDish in allergenDishes">{{ allergenDish.allergen_id }}</p> -->
                        <button class="button" @click="sendCart(dish)">Aggiungi al carrello</button>               
                    </div>
                </div>
            </div>

        </div>
        
        <!-- <div class="test">
            <h3>#aCasaTuaConDeliverboh</h3>
        </div> -->
        <div id="sfondo" class="sfondo">
            <img src="/images/unarota.svg" alt="">
        </div>
    </section>
</template>

<script>
import User from "./User.vue"
import Search from "./Search.vue"
import Cart from '../Cart.vue';

export default {
    name: "Middle",
    props: ['categoriesArray'],
    components: {
        Cart,
        User,
        Search,
    },
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            searchrestaurant: "",
            users: [], 
            dishes: [],
            allergenDishes: [],
            restaurantName: "",
            cart: [],
            price: 0,
            restaurant: 0,
            filterDishes:[],
            searchText: '',
            categoryUsers: [],
            ristoranti: [],
            appoggioDue: [],
            switchMenu: false,
        };
    },
    created() {
        this.getDishes();
        this.getUsers();
        this.getCategoryUsers();
    },
    watch: {
        searchText: function () {
            this.switchMenu = false
            if (this.searchText != '') {
                let filteredList = this.ristoranti.filter( item => {
                    return item.name
                        .toLowerCase()
                        .includes(this.searchText.toLowerCase());
                })
                if(filteredList.length == 0) {
                    filteredList = this.users.filter( item => {
                        return item.name
                            .toLowerCase()
                            .includes(this.searchText.toLowerCase());
                    })  
                    this.ristoranti = filteredList;
                } else {
                    this.ristoranti = filteredList;
                }
            } else {
                this.ristoranti =  this.appoggioDue;
            }
        },
        categoriesArray: function filterUsers() {
            this.switchMenu = false
            var usersArray = [];
            for (const i in this.categoriesArray) {
                for (const j in this.categoryUsers) {
                    if (this.categoryUsers[j].category_id == this.categoriesArray[i]){
                        if(!usersArray.includes(this.categoryUsers[j].user_id))
                            usersArray.push(this.categoryUsers[j].user_id)
                    }
                }
            }
            var appoggio = [];
            for (const i in this.users) {
                for (const k in usersArray) {
                    if (this.users[i].id == usersArray[k]) {
                        if(!appoggio.includes(this.users[i]))
                            appoggio.push(this.users[i])
                    }
                }
            }
            this.appoggioDue =  appoggio;
            this.ristoranti =  appoggio;
            if (this.searchText != '') {
                let filteredList = this.ristoranti.filter( item => {
                    return item.name
                        .toLowerCase()
                        .includes(this.searchText.toLowerCase());
                })
                this.ristoranti = filteredList;
            }
        },
    },
    methods: {
        emptyCart(){
            this.cart = []
            this.restaurant = 0
            return
        },
        sendCart(dish) {
            
            if(this.restaurant == 0) {
                this.restaurant = dish.user_id
            }

            if(this.restaurant ==  dish.user_id){
            if(this.cart.length === 0){
                this.cart.push(dish)
            }else{
                    this.cart.push(dish)
                    for (let i = 0; i < this.cart.length - 1; i++){
                        if( (this.cart[i].id === dish.id) && (this.cart.length > 1)){
                        this.cart.pop();
                        this.cart[i].quantity++;
                        console.log('sono qui dentro')
                        return
                        }                             
                    }
            }
            } else {
                alert('devi svuotare il carrello prima di poter ordinare di nuovo da questo ristorante')
            }
        },
        menuShow(user) {
            this.switchMenu = true
            this.restaurantName = user.name
            let userdish = []
            for (const i in this.dishes) {
                if(this.dishes[i].user_id == user.id) {
                    userdish.push(this.dishes[i])
                }
            }
            this.filterDishes = userdish
        },
        getUsers(){
           const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'users', bodyParameters, config)
                .then((resp)=>{
                    this.users = resp.data.results
                })
                .catch();
        },
        searchRest(text) {
            this.searchText = text;
        },
        getCategoryUsers(){
            const bodyParameters = {
                key: "value",
            };
            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'categoryUsers', bodyParameters, config)
                .then((resp)=>{
                    this.categoryUsers = resp.data.results;
                })
                .catch();
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
    
   

    .middle {
        width: 82%;
        height: 100%;
    }

    .middle-top {
        height: 25%;
        display: flex;
        position: relative;
        justify-content: space-between;
    
        .user-info {
            text-align: end;
            display: flex;
            flex-direction: column;
            justify-content: end;
            padding-right: 20px;
            padding-top: 3%;

            .saluto {
                color: black;
            }
            .user-name {
                color:#648F64;
                font-size: 2vw;
            }
            .menu-text {
                color: black;
                font-size: 1.5vw;
            }
        }
        .user-btn {
            border: none;
        }
    }

    .middle-bottom {
        height: 75%;

        .box-user {
            width: 100%;
            height: 430px;
            overflow-y: scroll;
            display: flex;
            flex-wrap: wrap;
        }

        // .box-user {
        //     width: 93%;
        //     height: 60%;
        //     overflow-y: auto;
        //     display: flex;
        //     flex-wrap: wrap;
        // }
        .box-menu {
            width: 65%;
            height: 530px;
            overflow-y: scroll;
            display: flex;
            flex-wrap: wrap;
        }
    }

    

    .image {
        line-height: 1.2em;
        // position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 200px;
        height: 350px;
        background-color:white ;
        border-radius: 5px;
        border-bottom-right-radius: 40px;
        transition: 0.5s;
        box-shadow: 5px 10px 18px #cfcece;
        padding: 10px;
        margin: 20px;

        img {
            width: 98%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            border-bottom-right-radius: 40px;
        }
        h4 {
            font-size: 18px; 
            color: #be541e; 
            text-transform: capitalize;
        }
        p {
            font-size: 12px;
        }
        
        button {
            // position: absolute;
            // left: 20px;
            // bottom: -20px;
            // transform: translate(0, 80%);
            box-shadow: 5px 10px 18px #a09f9f;
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


    
    .test {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translate(-5%, -80%);
        color: #638F64;
    }

    .sfondo {
        width: 80%;
        height: 100%;
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: -1;
    }

    .sfondo > img {
        width: 100%;
        height: 85%;
        object-fit:contain;
        object-position: 120%;
    }

    .box-search {
        width: 100%;
        height: 20%;
        display: block;
    }
 
  
    

    .backgrey {
        background-color: rgba(252, 248, 240, 0.577);
    }

    .container-card {
        padding: 20px;
    }

</style>
