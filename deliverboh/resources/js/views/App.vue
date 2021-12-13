<template>
    <div>
        <Main />
     <!-- <Api /> -->
    </div>
</template>

<script>
// import Api from "../components/Api";
import Main from "../components/Main";


export default {
    name: "App",
    components: {
        // Api,
        Main,
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
