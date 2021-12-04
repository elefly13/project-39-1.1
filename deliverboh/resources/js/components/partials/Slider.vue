<template>
    <section>
        <div class="box-slider">
            <div class="wrapper-uno">
                <SliderCard />
            </div>
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
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
}
       

</style>

