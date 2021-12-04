<template>
    <main class="wrapper">
        <div class="check-box d-flex flex-column">
            <Checked @selCategories = "getCategories" />
        </div>
            <Middle @search= "getCategories" class="middle" :categoriesArray="categories" />
            <!-- <Background class="background" /> -->
        <!-- <div class="pippo">
            <Slider />
        </div> -->
    
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
           console.log(this.categories)
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
    // background: brown;
    
}
.check-box {
    width: calc(100%/6);
    min-width: 220px;
    height: 100%;
    padding-top: 180px;

}

.pippo {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 20%;
    display: flex;
    align-items: center;
    background: #F4F0E2;
}
// .middle {
//     // width: calc((100%/6) * 3);
//     width: calc((100%/6) * 5);
//     background-image: url(/images/unarota.svg);
//     background-repeat: no-repeat;
//     background-position: right;
//     background: brown;

//     // height: 100%;
//     // background-color: chocolate;
// }
// .background {
//     width: calc((100%/6) * 2);
//     height: 100%;
//     background-color: chocolate;
// }
</style>