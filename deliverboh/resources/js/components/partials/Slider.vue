<template>
    <section class="box-slider">
        <div class="titolo">
            <h1>I più popolari</h1>
        </div>
        <div class="container-slider">
            <div @click="scroll_left" class="left">L</div>
            <SliderCard />
            <div @click="scroll_right" class="rigth">R</div>
        </div>
    </section>
</template>

<script>
import SliderCard from "./SliderCard.vue"

export default {
    name: "Slider",
    components: {
        SliderCard,
    },
    methods:{
    scroll_left() {
      let content = document.querySelector(".container-slider");
      content.scrollLeft -= content.scrollWidth * 4 / 6;
    },
    scroll_right() {
      let content = document.querySelector(".container-slider");
      content.scrollLeft += content.scrollWidth * 4 / 6;
    },
    } 
}
</script>

<style lang="scss" scoped>

.box-slider {
    width: 100% - 17%;
    height: 100%;
    display: flex;
    position: relative;
    justify-content: center;
}

.titolo {
    width: 20%;
    height: 100%;
    position: absolute;
    left: 10%;
    // left: 261px;
}

.container-slider {
    width: 75%;
    height: 100%;
    display: flex;
    // justify-content: space-around;
    // justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
    // overflow: auto;
    // position: relative;
    scroll-behavior: smooth;
    // background: chartreuse;
}

.left {
    z-index: 10;
    transform: translate(50%, -50%);
    position: absolute;
    left: 0%;
    top: 50%;
    font-size: 30px;
    color: black;
}

.rigth {
    z-index: 10;
    position: absolute;
    transform: translate(-50%, -50%);
    right: 0;
    top: 50%;
    font-size: 30px;
    color: black;
}

       

</style>

