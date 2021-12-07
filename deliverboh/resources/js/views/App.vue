<template>
    <div>
        <!-- <Header /> -->
        <Main />
        <Menu />
        <ConfermaOrdine />
        <OrdineApprovato />
        <!-- <Api /> -->
        <!-- <button @click="prova()">ciao</button> -->

        <!-- <Footer /> -->
    </div>
</template>

<script>
import Header from "../components/Header";
// import Api from "../components/Api";
import Main from "../components/Main";
import Menu from "../components/Menu";
import ConfermaOrdine from "../components/ConfermaOrdine";
import OrdineApprovato from "../components/OrdineApprovato";
import Footer from "../components/Footer";

export default {
    name: "App",
    components: {
        Header,
        // Api,
        Main,
        Menu,
        ConfermaOrdine,
        OrdineApprovato,
        Footer
    },
    data() {
        return {
    
        }
    },
    methods: {
    
    },
};
</script>

<style lang="scss" scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


</style>
