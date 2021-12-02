<template>
    <main>
        <div class="wrapper">
            <div class="box-center">
                <div class="chekbox">
                    <Checked />
                   <!-- <input type="checkbox" class="btn-check" id="cusine" autocomplete="off" value="ita">
                   <label class="test" for="cusine">Italiano</label><br>
                   <input type="checkbox" class="btn-check" id="cusine" autocomplete="off" value="esp">
                   <label class="test" for="cusine">Spagnolo</label><br> -->
                  

                </div>
                <div class="cerca">
                    <Search @search= "effettuaRicerca"/>
                    <p class="box-80">{{risultato}}</p>
                    <div class="jumbo">
                        <img src="/images/unarota.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="popolari">
                <h3 class="box-80">I più popolari</h3>
            </div>

        </div>
    <main class="wrapper">
            <div class="check-box d-flex flex-column justify-content-around">
                <p v-for="category in categories" :key="category['id']">
                    {{category['cuisine']}}
                </p>
            </div>
            <Middle class="middle" />
            <Background class="background" />
    </main>
</template>

<script>
import Search from './Search.vue';
import Checked from './Checked.vue';

import Background from './partials/Background';
import Middle from './partials/Middle'
export default {
    name: "Main",
    data() {
        return {
             url: "http://127.0.0.1:8000/api/",
            categories: [],
        }
    },
    components: {
        Background,
        Search,
        Checked
    },
    created() {
        this.getCategories()
    },
    methods: {
        getCategories(){
            const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'categories', bodyParameters, config)
                .then((resp)=>{
                    this.categories = resp.data.results
                })
                .catch();
        },
         effettuaRicerca(text) {
            this.risultato = text;
        }
    },
};
</script>

<style scoped lang="scss">


[type=checkbox] { 
   position: absolute;
   opacity: 0;
   width: 0;
   height: 0;
}

[type=checkbox]:checked + label {
background-color:#638F64;
color: white;
}

.test {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 40px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 5px;
    border: 1px solid #638F64;
}


.wrapper {
    width: 100vw;
    height: calc(100vh - 80px);
}

.box-center {
    width: 100%;
    height: 70%;
    display: flex;
}

.chekbox {
    width: 15%;
    height: 100%;
    padding-top: 20px;
    // background-color: crimson;
}

.cerca {
    width: 85%;
    height: 100%;
    position: relative;
    // background-color: yellow;
}

.jumbo {
    position:absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    text-align: right;
}

.jumbo > img {
    object-fit: cover;
    height: 100%;
}

.popolari {
    width: 100%;
    height: 30%;
    background-color:#F4F0E1;
}





.wrapper{
    margin-top: 80px;
    width: 100%;
    height: calc(100vh - 80px);
    display: flex;
}
.check-box {
    width: calc(100%/6);
    height: 100%;
    background-color: chocolate;
}
.middle {
    width: calc((100%/6) * 3);
    // height: 100%;
    // background-color: chocolate;
}
.background {
    width: calc((100%/6) * 2);
    // height: 100%;
    // background-color: chocolate;
}
</style>
