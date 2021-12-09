<template>
    <main class="main">
        
        <div class="main-top">
            <Checked @selCategories = "getCategories" :emptycheck="menuFlag" />
            <Middle class="middle" @search= "getCategories" @menuFlag="myflag"  :categoriesArray="categories" />
        </div>
        
        <div class="main-bottom" v-if="this.menuFlag == false">
            <!-- <Slider /> -->
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
            menuFlag: false
        } 
    },
    watch: {
        categories: function () {
            this.menuFlag = false
        }
    },
    methods: {
        getCategories(selCategories) {
           this.categories = selCategories;
        },
        myflag(flag) {
            this.menuFlag = flag
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
        height: 200px;
        background-color: #F4F0E2;
    }
</style>