<template>
    <section class="box-slogan-search">
        <div>
            <h1>I piatti che ami, a domicilio</h1>
        </div>     
        <div class="search-box d-flex justify-content-center">
            <input class="search" v-model="searchrestaurant" type="text" placeholder="cerca un tipo di ristorante"/>
            <button class="search-button" @click.prevent="$emit('performSearch', searchrestaurant)">
                Cerca
            </button>
        </div>
    </section>
</template>

<script>

export default {
    name: "Search",
    data() {
        return {
           searchrestaurant: '',
        };
    },
};
</script>

<style scoped lang="scss">

.search-box{
    width: 30%;
    .search {
        height: 50px;
        width: 70%;
        color: grey;
        font-size: 1em;
        outline: none;
        border: 0px;
        border-radius: 10px;
        padding: 5px;
        margin-right: 30px;
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
    .box-slogan-search {
        padding-top: 180px;
    }
</style>
