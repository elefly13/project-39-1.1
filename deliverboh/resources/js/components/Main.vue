<template>
    <main class="main">
        
        <div class="box-main">
            <div class="sidbar ">
                <Checked @selCategories = "getCategories" :emptycheck="menuFlag" />
            </div>
            <div class="main-right ">
                <Middle @search= "getCategories" @menuFlag="myflag"  :categoriesArray="categories" />
            </div>
        </div>
        <div class="main-bottom" v-if="this.menuFlag == false">
            <div class="vuoto"></div>
            <h1>I più popolari</h1>
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
    }

    .box-main {
        display: flex;
        width: 100vw;
        height: calc(100% - 150px);
    }

    .sidbar {
        width: 15%;
        margin-right: 30px;
        padding: 0px;
        overflow: auto;
        // background: chocolate;
    }

    .main-right {
        width: 100%;
        background-image: url('/images/unarota.svg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: 100% 0%; 
    }
       .main-bottom {
        width: 100vw;
        height: 150px;
        display: flex;
        align-items: center;
        position: relative;
        background-color: #F4F0E2;
    }

    .vuoto {
        width: 15%;
        height: 100%;
        bottom: 0;
        left: 0;
    }

    h1 {
        display: flex;
        position: absolute;
        left: 15%;
        top: 0;
        width: 300px;
    }


    @media screen and (max-width: 930px){
        .main-right {
            background: none;
        }
    }
   
    @media screen and (max-width: 575px) { // cambiato
       
        .box-main {
            display: flex;
            flex-direction: column;
            flex-direction: row;
        }

        .sidbar {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 30%;
            margin-right: 0px;
            // background: #638F64;
        }
        .main-right {
            width: 70%;
            // background: red;
        }

         .main-bottom {
        width: 100vw;
        height: 150px;
        display: flex;
        align-items: center;
        position: relative;
        background-color: #F4F0E2;
        flex-direction: column;
    justify-content: flex-end;
    }

    .vuoto {
        display: none
    }

    h1 {
        display: flex;
        position: absolute;
        left: 0%;
        top: 0;
        justify-content: center;
        width: 100%;
        font-size: 22px;
    }
    }


    @media screen and (min-width:320px) and (max-width:736px) and (orientation:landscape) {
    .main{
        width: 100vw;
        height: calc(100vh - 58.95px);
    }

    .box-main {
        display: flex;
        width: 100vw;
        height: calc(100% - 80px);
    }

    .sidbar {
        width: 15%;
        margin-right: 30px;
        padding: 0px;
        overflow: auto;
    }

    .main-right {
        width: 100%;
        background-image: url('/images/unarota.svg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: 100% 0%; 
    }
       .main-bottom {
        width: 100vw;
        height: 80px;
        display: flex;
        align-items: center;
        position: relative;
        background-color: #F4F0E2;
    }

    .vuoto {
        width: 15%;
        height: 100%;
        bottom: 0;
        left: 0;
    }

    h1 {
        display: flex;
        position: absolute;
        left: 15%;
        top: 0;
        width: 300px;
        font-size: 18px;
    }

}

</style>