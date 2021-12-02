<template>

    <section>
        <div class="box-80">
            <h1>I piatti che ami, a domicilio</h1>
        </div>
        <form class="box-search">
            <input
                class="ricerca"
                v-model="ricercaRistorante"
                type="text" placeholder="Inserisci il tuo piatto preferito"
                />
            <button class="cerca" @click.prevent="$emit('search', ricercaRistorante)">
                Cerca
            </button>
        </form>           
    </section>
   
</template>

<script>

export default {
    name: "Search",
    components: {

    },
    data() {
        return {
           ricercaRistorante: '',
        };
    },
    created() {},
    methods: {},
};
</script>

<style scoped lang="scss">


.box-search {
    width: 1280px;
    height: 80px;
    margin: 0 auto;
    padding: 0 15px;
    
}

.ricerca {
    width: 25%;
    height: 50px;
    color: grey;
    font-size: 1em;
    outline: none;
    border: 0px;
    border-radius: 10px;
    padding: 5px;
}

.cerca {
    margin-left: 10px;
    width: 10%;
    height: 50px;
    color: white;
    font-size: 1em;
    outline: none;
    border: 0px;
    border-radius: 10px;
    padding: 5px;
    background-color: #638f64;
}






</style>
