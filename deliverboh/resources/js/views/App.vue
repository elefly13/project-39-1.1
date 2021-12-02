<template>
<<<<<<< HEAD
    <!-- <div class="container-fluid"> -->
    <div>
        <!-- <Header /> -->
        <Main />
        
        <Footer />
=======
    <div>
        <Header />
        <!-- <Api /> -->
        <Cart :cartContent="cart"/>
        <Main />
        <Menu @cartContent="passCart" />
        <!-- <button @click="prova()">ciao</button> -->

        <!-- <Footer /> -->
>>>>>>> main
    </div>
</template>

<script>
<<<<<<< HEAD
// // import Header from "../components/Header";
import Main from "../components/Main";

=======
import Header from "../components/Header";
// import Api from "../components/Api";
import Main from "../components/Main";
import Menu from "../components/Menu";
>>>>>>> main
import Footer from "../components/Footer";
import Cart from '../components/Cart.vue';

export default {
    name: "App",
    components: {
<<<<<<< HEAD
        // Header,
=======
        Header,
        // Api,
        Cart,
>>>>>>> main
        Main,
        Menu,
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
    data() {
       
    },
};
</script>

<style lang="scss" scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

<<<<<<< HEAD
.container-fluid {
    background-color: burlywood;
}
=======
>>>>>>> main
</style>
