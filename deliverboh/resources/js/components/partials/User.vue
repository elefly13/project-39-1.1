<template>
    <section>
        <div class="card">
            <div class="box-img">
                <img src="/images/image-res/res-1.jpg" alt="">
            </div>
                <h4>
                    {{info['restaurant_name']}}
                </h4>
            <ul>
                <li class="list-box">
                    <ul>
                        <li>{{info['restaurant_name']}}</li>
                        <li>{{info['address']}}</li>
                    </ul>  
                </li>            
            </ul> 
        </div>
    </section>
</template>

<script>
export default {
    name: "User",
    props: ['info','indexMenu'],
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            flag: false,
            dishes: [],
            allergens: [],
            allergenDishes: [],
            api_token:
                "bbzRf42NwlCuPIdwL7AiHgXskzLa69GB61Tn8QA7VZ1woSustPL1NfelqeHpfolpwhwX6lR1OolmJf3k",
        };
    },
    created() {
        this.getDishes();
        this.getAllergenDishes();
        this.getAllergens();
    },
    methods: {
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
                    console.log('sono allergeni')
                    console.log(this.allergens)
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
                    console.log('sono allergeni dishes')
                    console.log(this.allergensDishes)
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
                    console.log('sono dishes')
                    console.log(this.dishes)
                })
                .catch();
        },
    }
}
</script>

<style lang="scss" scoped>
    .middle {
        height: 100%;
        width: 100%;
    }
       li{
        list-style: none;
    }

    .lista-box {
        padding: 10px;
        color: #343434;
    }

    h4 {
        color: #628F64;
    }

    .card {
        width: 200px;
        height: 300px;
        display: flex;
        align-items: center;
        text-align: center;
        border: 0.3px solid rgb(228, 228, 228);
        border-top-left-radius: 30px;
        border-bottom-right-radius: 30px;
        background: rgb(255, 255, 255);
        overflow: auto;
    }

    .box-img {
        width: 100%;
        height: 50%;
        margin-bottom:10px;
    }

    .box-img > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
