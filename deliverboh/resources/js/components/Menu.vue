<template>
    <section>
        <h1>Sono la pagina menu del ristorante</h1>
        <div class="container-menu">
            <div class="top">
                <p class="saluto">Benvenuto nell nostro ristorante</p>
                <h1>Nome ristorante selezionato</h1>
                <h3>Il nostro menu</h3>
            </div>
            <div class="box">
                <div class="big-box-img">
                    <div class="image" :key="dish['id']" v-for="dish in dishes">
                        <!-- <img src="https://cdn.pixabay.com/photo/2017/12/10/14/47/pizza-3010062_1280.jpg" alt=""> -->
                        <h4>{{ dish.name }}</h4>
                        <p>{{ dish.description }}</p>
                        <h4>{{ dish.price }}</h4>
                        <p>{{ dish.ingredients }}</p>
                        <p>Allergeni:</p>  
                         <button class="button" @click.prevent="sendCart(dish), $emit('cartContent', cart)">Aggiungi al carrello</button>               
                    </div> 
                </div>

            </div> 
        </div>
                
    </section>
</template>

<script>
export default {
    
    name: "Menu",
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            flag: false,
            dishes: [],
            cart: [],
            restaurant: 0,
            api_token:
                "bbzRf42NwlCuPIdwL7AiHgXskzLa69GB61Tn8QA7VZ1woSustPL1NfelqeHpfolpwhwX6lR1OolmJf3k",
        };
    },
    created() {
        this.getDishes();
    },
    methods: {
        sendCart(dish) {
            if(this.restaurant == 0) {
                this.restaurant = dish.user_id
            }
            
            if(dish.user_id == this.restaurant) {
                this.cart.push(dish)
            } else {
                alert("Puoi ordinare da un solo ristorante alla volta")
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
    background-image: linear-gradient(to bottom right, #b5d8ba 20%, #f1c692 80%);
    //background-color:#fff7df ;
    .top {
        width: 100%;
        margin: 0 auto;
        padding: 40px 60px;
        background-color: #439373;
        border-bottom-right-radius: 50px;
        .saluto {
            color: #fff7df;
        }
        h1 {
            color:#f1c692;
            font-size: 34px;
            
        }
        h3 {
            color: #fff7df;
        }


    }
    .box {
        display: flex;
        .big-box-img {
        width: 75%;
        margin: 0 auto;
        padding: 40px;
       
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        
        .image {
            display: column;
            text-align: center;
            width: 220px;
            height: 350px;
            background-color:white ;
            border-radius: 5px;
            border-bottom-right-radius: 40px;
            transition: 0.5s;
            box-shadow: 5px 10px 18px #a09f9f;
            cursor: pointer;
            padding: 10px;
            margin: 20px;
            img {
                width: 200px;
                border-radius: 5px;
                border-bottom-right-radius: 40px;
            }
            h4 {
               color: #be541e; 
               padding: 8px 0;
            }
            p {
                font-size: 12px;
                padding: 3px 0;
            }
            button {
                margin: 10px;
                padding: 5px;
                border-color: #439373;
                border-radius: 3px;
                border-bottom-right-radius: 10px;
                background-color:  #439373;
                color: #f4f0e2;
                transition: 0.6s;
            }
            button:hover {
                margin: 10px;
                padding: 5px;
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
        width: 35%;
        height: 100%;
        
    }

    }
    
    
           
}
</style>