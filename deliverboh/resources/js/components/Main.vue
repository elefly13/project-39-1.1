<template>
    <main class="main">
        
        <div class="box-main">
            <div class="sidbar col-lg-2 col-sm-2">
                <Checked @selCategories = "getCategories" :emptycheck="menuFlag" />
            </div>
            <div class="main-right col-lg-10 col-sm-10">
                <Middle @search= "getCategories" @menuFlag="myflag"  :categoriesArray="categories" />
            </div>
        </div>
        <div class="main-bottom" v-if="this.menuFlag == false">
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
        // background: violet;
    }


    .box-main {
        display: flex;
        width: 100vw;
        min-height: calc(100% - 250px);
        // background: yellow;
    }

    .sidbar {
        // min-width: 300px;
        // width: 15%;
        padding: 20px 0px;
        // background: red;
    }

    .main-right {
        width: 100%;
        background-image: url('/images/unarota.svg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        // background-position: bottom right;
       background-position: 100% 0%; 
    }

    .main-bottom {
        width: 100vw;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #F4F0E2;
    }
</style>