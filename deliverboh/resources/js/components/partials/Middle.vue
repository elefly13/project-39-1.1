<template>
    <section class="middle d-flex flex-column align-items-center justify-content-center">
                <div>
                    <h1>I piatti che ami, a domicilio</h1>
                </div>     
                <div class="search-box d-flex justify-content-center">
                    <button class="search-button">
                    Cerca
                </button>
                <input class="search" v-model="searchrestaurant" type="text" placeholder="cerca un tipo di ristorante"/>
                </div>
                <div>
                    <ul class="d-flex flex-wrap px-5">
                        <li class="list-box" v-for="user in users" :key="user['id']">
                            <h3>
                                {{user['restaurant_name']}}
                            </h3>
                            <ul>
                                <li>{{user['email']}}</li>
                                <li>{{user['restaurant_name']}}</li>
                                <li>{{user['address']}}</li>
                            </ul>  
                        </li>
                    </ul>
                </div>
    </section>
</template>

<script>
export default {
    name: "Middle",
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            searchrestaurant: "",
            users: [], 
        };
    },
    created() {
        this.getUsers();
    },
    methods: {
        getUsers(){
            // const bodyParameters = {
            //     key: "value",
            // };

            // const config = {
            //     headers: { Authorization: `Bearer ${this.api_token}` },
            // };
            axios
                .get(this.url + 'users')
                .then((resp)=>{
                    this.users = resp.data.results
                })
                .catch();
        },
    },
    
};
</script>


<style lang="scss" scoped>
.middle {
    height: 100%;
    width: 100%;
}

li{
    list-style: none;
}
.list-box{
    width: 50%;
    height: 10rem;
}

.search-box{
width: 50%;
padding-bottom: 150px;
.search {
    height: 50px;
    width: 70%;
    color: grey;
    font-size: 1em;
    outline: none;
    border: 0px;
    border-radius: 10px;
    padding: 5px;
}
.search-button {
    margin-right: 10px;
    width: 30%;
    height: 50px;
    color: white;
    font-size: 1em;
    outline: none;
    border: 0px;
    border-radius: 10px;
    padding: 5px;
    background-color: #638f64;
}
}

</style>
