<template>
    <section class="middle">

        <div class="middle-top">
            <Search @performSearch="searchRest"/>

            
            <div class="user-info" v-if="this.switchMenu == true">
                <h1 class="user-name">{{ this.restaurantName }}</h1>
                <h4 class="menu-text">Il nostro menu</h4>
            </div>
        </div>

         <div class="user-info-nascosto" v-if="this.switchMenu == true">
                <h1 class="user-name">{{ this.restaurantName }}</h1>
                <h4 class="menu-text">Il nostro menu</h4>
            </div>
        
        <div class="middle-bottom">
            <div  v-if="this.switchMenu == false" class="box-user">
                <div v-for="(user, index) in this.ristoranti" :key="index" class="container-card">
                    <button class="user-btn" @click="menuShow(user), $emit('menuFlag', switchMenu)"><User :info="user"/></button>
                </div>
            </div>

            <div v-if="this.switchMenu == true" class="box-menu">
                <div class="image" v-for="(dish, index) in this.filterDishes" :key="index">
                    <div class="card-piatti">
                        <div class="box-img-piatti">
                            <img :src="'./storage/' + dish.image" :alt="dish.name">
                        </div>
                        <div class="nome-piatto">
                            <h4>{{ dish.name }}</h4>
                            <p>{{ dish.description }}</p>
                            <h4>{{ dish.price }} €</h4>
                            <p>Ingredienti:</p>
                            <p>{{ dish.ingredients }}</p>
                        </div>
                    <button class="button" @click="sendCart(dish), openCart()">Aggiungi al carrello</button>              
                    </div>
                </div>                        
            </div>
            <div class="cart-container">
                <Cart :cartContent="cart" :initialPrice="price" :flag="cartFlag" />
            </div>
        </div>
    </section>
</template>

<script>
import User from "./User.vue"
import Search from "./Search.vue"
import Cart from '../Cart.vue';

export default {
    name: "Middle",
    props: ['categoriesArray','popUser'],
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
            cartFlag: false,
        };
    },
    created() {
        this.getDishes();
        this.getUsers();
        this.getCategoryUsers();
    },
    watch: {
        popUser: function () {
            var popDishes = [];
            for (const i in this.dishes) {
                if (this.dishes[i].user_id == this.popUser) {
                    popDishes.push(this.dishes[i])
                }
            }
            this.filterDishes = popDishes
            this.switchMenu = true
            console.log(popDishes)
            console.log(this.filterDishes)
            
        },
        searchText: function () {
            this.switchMenu = false
            if (this.searchText != '') {
                let filteredList = this.ristoranti.filter( item => {
                    return item.restaurant_name
                        .toLowerCase()
                        .includes(this.searchText.toLowerCase());
                })
                if(filteredList.length == 0) {
                    filteredList = this.users.filter( item => {
                            return item.restaurant_name

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
                    return item.restaurant_name
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
        openCart() {
            this.cartFlag = true;
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

.card-piatti {
        width: 200px;
        height: 300px;
        display: flex;
        align-items: center;
        text-align: center;
        flex-direction: column;
        border: 0.3px solid rgb(228, 228, 228);
        border-bottom-right-radius: 30px;
        background: rgb(255, 255, 255);
        transition: 0.5s;
        box-shadow: 5px 10px 18px #e3e3e3;
        position: relative;
}

    .box-img-piatti {
        width: 100%;
        height: 50%;
    }

    .box-img-piatti > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .nome-piatto {
        width: 100%;
        height: 100px;
        position: absolute;
        top: 45%;
        overflow-y: scroll;
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 10px;
        margin-top: 15px;
    }

   .user-btn {
       border: 0px;
       background: transparent;
   }

    .middle {
        height: 100%;
    }

    .middle-top {
        height: 25%;
        display: flex;
        position: relative;
        justify-content: space-between;
        padding: 4vh 0vh;
    }

    .user-info {
        margin-right: 17%;
        white-space: nowrap;
        text-align: right;
        display: none;
    } 
  
    .user-info-nascosto {
        margin-right: 17%;
        white-space: nowrap;
        text-align: right;
        display: none;
    } 

    .user-info-nascosto {
        display: block;
        position: absolute;
        bottom: 0;
        margin-right: none;
        text-align: left;
        text-align: center;
        width: 70%;
        z-index: 10;
        background: white;
        box-shadow: 5px 10px 18px #e3e3e3;

        }
    
    .user-name {
        margin: 0;
        padding: 0;
        color:#648F64;
        color:#E69E42;
    }
    
    .menu-text {
        color: black;
    }
        
    @media screen and (max-width: 930px){
        .middle-top {
            flex-direction: column;
        }

        .user-info {
            margin-right: none;
            text-align: left;
            text-align: center;
        }
    }

    .middle-bottom {
        height: 75%;
    }
    
    .box-user {
        width: calc(100% - 250px);
        height: 100%;
        overflow-y: auto;
        display: flex;
        flex-wrap: wrap;
    }

    .box-menu {
        width: calc(100% - 250px);
        height: 100%;
        overflow-y: auto;
        display: flex;
        flex-wrap: wrap;
    }

    @media screen and (max-width: 575px) {

    .box-user {
        width: 100%;
        height: calc(100vh - 300px);
        overflow-y: scroll;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .box-menu {
        width: 100%;
        height: 72vh;
        height: 75vh;
        overflow-y: scroll;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
    }

    .middle-top {
        height: 15%;
        display: flex;
        position: relative;
        justify-content: space-between;
        padding: 0px;
        box-shadow: 5px 10px 18px #e3e3e3;
        }

      .user-info {
          display: none;
        }
     
      .user-info-nascosto {
        display: block;
        position: absolute;
        bottom: 0;
        margin-right: none;
        text-align: left;
        text-align: center;
        width: 70%;
        z-index: 10;
        background: white;
        box-shadow: 5px 10px 18px #e3e3e3;

        }

        .user-name {
            font-size: 20px;
        }

        .menu-text {
            font-size: 14px;
        }
    }
    

    .image {
        padding: 20px 20px 20px 0px;
        height: 350px;
        }

        h4 {
            font-size: 18px; 
            color: #be541e; 
            text-transform: capitalize;
        }

        p {
            font-size: 12px;
            text-align: center;
        }
        
        .button {
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
            position: absolute;
            bottom: 0;
        }

        .button:hover {            
            margin: 10px;
            padding: 10px;
            border: none;
            border-color: #f1c692;
            border-radius: 3px;
            border-bottom-right-radius: 10px;
            background-color:  #f1c692;
            color: #343434;
        }
    

    .card-piatti:hover {
        transform: scale(1.05);
    }
   

    .container-card {
        padding: 20px 20px 20px 0px;
        height: 350px;
    }

    .cart-container {
        width: 250px;
        display: flex;
        justify-content: flex-end;
        position: fixed;
        right: 0;
        top: 4vh;
        z-index: 99;
    }

@media screen and (max-width: 575px) {
    .container-card {
        padding: 20px;
        height: 350px;
    }

    .cart-container {
        width: 250px;
        display: flex;
        justify-content: flex-end;
        position: fixed;
        right: 0;
        top: 4vh;
        z-index: 99;
    }
}

@media screen and (min-width:320px) and (max-width:736px) and (orientation:landscape) {

    .middle {
        height: 100%;
    }

    .middle-top {
        display: flex;
        position: relative;
        justify-content: space-between;
        padding: 1vh 0vh;
    }

    .user-info {
        margin-right: 17%;
        white-space: nowrap;
        text-align: right;
        display: none;
    } 

    .user-info-nascosto {
        display: block;
        position: absolute;
        bottom: 0;
        margin-right: none;
        text-align: left;
        text-align: center;
        width: 70%;
        z-index: 10;
        background: white;
        box-shadow: 5px 10px 18px #e3e3e3;

        }

        .user-name {
            font-size: 20px;
        }

        .menu-text {
            font-size: 14px;
        }
  
    .user-name {
        margin: 0;
        padding: 0;
        color:#648F64;
        color:#E69E42;
    }
    .menu-text {
        color: black;
    }

    .middle-bottom {
        height: 75%;
    }
    .box-user {
        width: calc(100% - 250px);
        height: 100%;
        overflow-y: scroll;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }
    .container-card {
        display: flex;
        padding: 8px 8px 0px 0px;
        justify-content: center;
        align-items: flex-start;
        height: 350px;
    }
    .user-btn {
       border: 0px;
       background: transparent;
    }
    .box-menu {
        width: calc(100% - 250px);
        height: 100%;
        height: 115%;
        overflow-y: scroll;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }
    .image {
        display: flex;
        padding: 8px 8px 0px 0px;
        justify-content: center;
        height: 350px;
    }
    .card-piatti {
        width: 150px;
        height: 250px;
        display: flex;
        align-items: center;
        text-align: center;
        border: 0.3px solid #e4e4e4;
        border-bottom-right-radius: 30px;
        background: white;
        transition: 0.5s;
        box-shadow: 5px 10px 18px #e3e3e3;
    }
    .card-piatti:hover {
        transform: scale(1.05);
    }
    .box-img-piatti {
        width: 100%;
        height: 50%;
    }
    .box-img-piatti > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .nome-piatto {
        width: 100%;
        height: 100px;
        position: absolute;
        top: 45%;
        overflow: scroll;
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 10px;
        margin-top: 15px;
    }
    .nome-piatto > h4 {
        font-size: 15px;
    }
    .nome-piatto > p {
        font-size: 12px;
    }

    .button {
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
        position: absolute;
        bottom: 0;
        font-size: 12px;
    }
    .button:hover {            
        margin: 10px;
        padding: 10px;
        border: none;
        border-color: #f1c692;
        border-radius: 3px;
        border-bottom-right-radius: 10px;
        background-color:  #f1c692;
        color: #343434;
    }
    .cart-container {
        width: 250px;
        display: flex;
        justify-content: flex-end;
        position: fixed;
        right: 0;
        top: 4vh;
        z-index: 99;
    }
}




    

</style>
