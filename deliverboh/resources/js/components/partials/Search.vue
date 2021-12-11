<template>
    <section class="search">
      
        <h1 class="slogan">I piatti che ami, a domicilio</h1>

        <div class="search-box">
            <input @keyup.enter="$emit('performSearch', searchrestaurant)" class="search-input" v-model="searchrestaurant" type="text" placeholder="cerca un tipo di ristorante"/>
            <button class="search-button" @click.prevent="$emit('performSearch', searchrestaurant)">Cerca</button>
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

    .search {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        flex-wrap: nowrap;
    }

    .slogan {
        white-space: nowrap;
    }

    .search-input {
        height: 35px;
        width: 70%;
        min-width: 200px;
        max-width: 350px;
        color: grey;
        font-size: 1em;
        outline: none;
        border: 0px;
        border-radius: 7px;
        padding-left: 5px;
        margin-right: 10px;
        background: #F4F0E1;
    }

    .search-button {
        height: 35px;
        color: white;
        font-size: 1em;
        outline: none;
        border: none;
        border-radius: 7px;
        padding: 0 15px;
        background-color: #638f64;
    }


@media screen and (max-width: 575px) {

    .search {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        flex-wrap: nowrap;
    }

    .slogan {
        white-space: normal;
        font-size: 22px;
    }

    .search-box {
        display: flex;
        align-items: center;
    }

    .search-input {
        height: 35px;
        width: 70%;
        min-width: 200px;
        max-width: 350px;
        color: grey;
        font-size: 1em;
        outline: none;
        border: 0px;
        border-radius: 7px;
        padding-left: 5px;
        margin-right: 10px;
        background: #F4F0E1;
    }

    .search-button {
        height: 35px;
        color: white;
        font-size: 1em;
        outline: none;
        border: none;
        border-radius: 7px;
        padding: 0 15px;
        background-color: #638f64;
    }
}


@media screen and (min-width:320px) and (max-width:736px) and (orientation:landscape) {

    .slogan {
        white-space: normal;
        font-size: 22px;
    }

    .search-input {
        height: 20px;
        width: 40%;
        min-width: 200px;
        max-width: 350px;
        color: grey;
        font-size: 1em;
        outline: none;
        border: 0px;
        border-radius: 7px;
        padding-left: 5px;
        margin-right: 10px;
        background: #F4F0E1;
    }
    .search-button {
        height: 20px;
        color: white;
        font-size: 1em;
        outline: none;
        border: none;
        border-radius: 7px;
        padding: 0 15px;
        background-color: #638f64;
    }
}

</style>
