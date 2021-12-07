<template>
    <main class="wrapper">
        <div class="check-box d-flex flex-column">
            <Checked @selCategories = "getCategories" />
        </div>
            <Middle @search= "getCategories" class="middle" :categoriesArray="categories" />
        <div class="sliders-container">
            <!-- <div class="sliders"></div> -->
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
        },
    },
};
</script>

<style lang="scss" scoped>
.wrapper{
    // margin-top: 80px;
    width: 100%;
    height: calc(100vh - 80px);
    display: flex;
}
.check-box {
    width: calc(100%/6);
    min-width: 220px;
    height: 78%;
    padding-top: 50px;
    // background: blue;
    // z-index: 999;
}

.sliders-container {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 25%;
    display: flex;
    // flex-direction: column;
    flex-direction: row;
    justify-content: center;
    background: #f4f0e2;
}

// .sliders {
//     width: calc(100%/6);
//     min-width: 220px;
//     height: 100%;
// }
</style>