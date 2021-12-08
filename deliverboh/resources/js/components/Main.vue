<template>
    <main class="main">
        
        <div class="main-top">
            <Checked @selCategories = "getCategories" />
            <Middle class="middle" @search= "getCategories" @menuFlag="myflag"  :categoriesArray="categories" />
        </div>
        
        <div class="main-bottom" v-if="this.menuFlag == null">
            <Slider />
        </div>
        
    </main>
</template>

<script>
import Middle from './partials/Middle';
import Checked from './partials/Checked.vue';
import Slider from "./partials/Slider.vue";

export default {
    name: "Main",
    components: {
        Middle,
        Checked,
        Slider
    },
    data() {
        return {
            categories: [],
            menuFlag: null
        } 
    },
    methods: {
        getCategories(selCategories) {
           this.categories = selCategories;
        },
        myflag(flag) {
            this.menuFlag = flag
            console.log('sono il flag')
            console.log(this.menuFlag)
        }
    },
};
</script>

<style lang="scss" scoped>
    .main{
        width: 100vw;
        height: calc(100vh - 58.95px);
    }

    .main-top {
        display: flex;
        width: 100vw;
        min-height: 80%;
    }

    .main-bottom {
        width: 100vw;
        height: 20%;
        background-color: #F4F0E2;
    }
</style>