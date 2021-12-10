<template>
    <div>
        <!-- <Header /> -->
        <Main />
        <!-- <Menu /> -->
        <!-- <ConfermaOrdine /> -->
        <!-- <OrdineApprovato /> -->
        <!-- <Api /> -->
        <!-- <button @click="prova()">ciao</button> -->

        <!-- <Footer /> -->
    </div>
</template>

<script>
// import Api from "../components/Api";
import Main from "../components/Main";
import Menu from "../components/Menu";
import ConfermaOrdine from "../components/ConfermaOrdine";
import OrdineApprovato from "../components/OrdineApprovato";


export default {
    name: "App",
    components: {
        // Api,
        Main,
        Menu,
        ConfermaOrdine,
        OrdineApprovato,
    },
};
</script>

<style lang="scss" scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    // line-height: 1em;
    overflow: hidden;
}


</style>
