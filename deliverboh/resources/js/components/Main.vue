<template>
    <main class="wrapper">
        <div class="check-box d-flex flex-column">
            <Checked @selCategories = "getCategories" />
        </div>
            <Middle @search= "getCategories" class="middle" :categoriesArray="categories" />
            <!-- <Background class="background" /> -->
        <div class="container-sliders">
            <div class="sliders"></div>
            <Slider />
        </div>
    
    </main>
</template>

<script>
import Background from './partials/Background';
import Middle from './partials/Middle';
import Checked from './partials/Checked.vue';
import Slider from "./partials/Slider.vue";

export default {
    name: "Main",
    components: {
        Middle,
        Background,
        Checked,
        Slider
    },
    data() {
        return {
            categories: [],
        } 
    },
    methods: {
        getCategories(selCategories) {
           this.categories = selCategories;
        //    console.log('prova' + this.categories)
        },
    },
};
</script>

<style lang="scss" scoped>
.wrapper{
    margin-top: 80px;
    width: 100%;
    height: calc(100vh - 80px);
    display: flex;
}
.check-box {
    width: calc(100%/6);
    min-width: 220px;
    height: 100%;
    padding-top: 100px;
}

.container-sliders {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 20%;
    display: flex;
    flex-direction: column;
    flex-direction: row;
    // flex-wrap: wrap;
    background: #F4F0E2;
    background: #628F64;
    background: #DBE7D6;
    background: #f4f0e2;
}

.sliders {
    width: calc(100%/6);
    min-width: 220px;
    height: 100%;
}
</style>