<template>
    <div class="container">
        <Header />
        <Main />
        <Menu />

        <Footer />
    </div>
</template>

<script>
import Header from "../components/Header";
import Main from "../components/Main";
import Menu from "../components/Menu";
import Footer from "../components/Footer";

export default {
    name: "App",
    components: {
        Header,
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
