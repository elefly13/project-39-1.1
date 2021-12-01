<template>
    <div class="container">
        <Header />
        <!-- <Api /> -->
        <Cart :cartContent="cart"/>
        <Main />
        <Menu @cartContent="test" />

        <Footer />
    </div>
</template>

<script>
import Header from "../components/Header";
// import Api from "../components/Api";
import Main from "../components/Main";
import Menu from "../components/Menu";
import Footer from "../components/Footer";
import Cart from '../components/Cart.vue';

export default {
    name: "App",
    components: {
        Header,
        // Api,
        Cart,
        Main,
        Menu,
        Footer
        
    },
    data() {
        return {
            cart: [],
        }
    },
    methods: {
        test(cartContent) {
            this.cart.push(cartContent)
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
