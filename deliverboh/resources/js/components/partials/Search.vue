<template>
    <section class="box-slogan-search">
        <div>
            <h1>I piatti che ami, a domicilio</h1>
        </div>     
        <!-- <div class="search-box d-flex justify-content-center"> -->
        <div class="search-box d-flex">
            <input @keyup.enter="$emit('performSearch', searchrestaurant)" class="search" v-model="searchrestaurant" type="text" placeholder="cerca un tipo di ristorante"/>
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
    width: 700px;
    .search {
        height: 50px;
        width: 300px;
        color: grey;
        font-size: 1em;
        outline: none;
        border: 0px;
        border-radius: 10px;
        padding: 5px;
        margin-right: 30px;
        background: #f8fafc;
    }
    .search-button {
        margin-right: 10px;
        width: 120px;
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
        padding-top: 100px;
    }
</style>
