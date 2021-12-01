<template>
    <div class="container">
        <Header />
        <Api />
        <Main />
        <Menu />

        <Footer />
    </div>
</template>

<script>
import Header from "../components/Header";
import Api from "../components/Api";
import Main from "../components/Main";
import Menu from "../components/Menu";
import Footer from "../components/Footer";

export default {
    name: "App",
    components: {
        Header,
        Api,
        Main,
        Menu,
        Footer,
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
