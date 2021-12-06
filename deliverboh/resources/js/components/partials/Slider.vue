<template>
    <section class="box-slider">
        <div class="titolo">
            <h1>I più popolari</h1>
        </div>
        <div class="container-slider">
            <SliderCard />
        </div>
    </section>
</template>

<script>
import SliderCard from "./SliderCard.vue"

export default {
    name: "Slider",
    components: {
        SliderCard,
    }
}
</script>

<style lang="scss" scoped>

.box-slider {
    width: 100% - 17%;
    height: 100%;
    display: flex;
}

.titolo {
    // width: calc(100%/6);
    width: 20%;
    height: 100%;
}

.container-slider {
    width: 80%;
    height: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
}

       

</style>

