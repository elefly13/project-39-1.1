<template>
    <div class="container">
        <Header />
        <Api />
        <Main />
        <Footer />
    </div>
</template>

<script>
import Header from "../components/Header";
import Api from "../components/Api";
import Main from "../components/Main";
import Footer from "../components/Footer";

export default {
    name: "App",
    components: {
        Header,
        Api,
        Main,
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
