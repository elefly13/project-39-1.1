<template>
    <!-- <div class="container-fluid"> -->
    <div>
        <!-- <Header /> -->
        <Main />
        
        <Footer />
    </div>
</template>

<script>
// // import Header from "../components/Header";
import Main from "../components/Main";

import Footer from "../components/Footer";

export default {
    name: "App",
    components: {
        // Header,
        Main,
        Footer,
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

.container-fluid {
    background-color: burlywood;
}
</style>
