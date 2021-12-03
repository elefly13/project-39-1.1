<template>
    <div>
        <Header />
        <Api />
        <Cart :cartContent="cart"/>
        <Main />
        <Menu @cartContent="test" />
        <ConfermaOrdine />
        <Footer />
    </div>
</template>

<script>
import Header from "../components/Header";
import Api from "../components/Api";
import Main from "../components/Main";
import Menu from "../components/Menu";
import ConfermaOrdine from "../components/ConfermaOrdine";
import Footer from "../components/Footer";
import Cart from '../components/Cart.vue';

export default {
    name: "App",
    components: {
        Header,
        Api,
        Cart,
        Main,
        Menu,
        ConfermaOrdine,
        Footer
        
    },
    data() {
        return {
            cart:[],
        }
    },
    methods: {
        passCart(cartContent) {
            this.cart = cartContent
            console.log(this.cart)

        },
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
