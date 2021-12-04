<template>
    <section>
        <div class="card">
            <div class="box-img">
                <img src="" alt="">
            </div>
            <h3>ciaoidoasjidjap</h3>
        </div>
    </section>
</template>

<script>
export default {
    name: "SliderCard",
}
</script>

<style lang="scss" scoped>


    .card {
        width: 170px;
        height: 200px;
        display: flex;
        align-items: center;
        text-align: center;
        border: 0.3px solid rgb(228, 228, 228);
        border-top-left-radius: 30px;
        border-bottom-right-radius: 30px;
        background: rgb(255, 255, 255);
        overflow: auto;
    }

      .box-img {
        width: 100%;
        height: 70%;
        background: cornflowerblue;
    }
       

</style>
