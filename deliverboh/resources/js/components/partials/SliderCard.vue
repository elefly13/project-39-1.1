<template>
    <section class="tipo">
        <div class="card">
            <div class="box-img">
                <img src="images/image-res/res-2.jpg" alt="">
            </div>
            <h5>ciaoidoasjidjap</h5>
        </div>
        <div class="card">
            <div class="box-img">
                <img src="images/image-res/res-3.jpg" alt="">
            </div>
            <h5>ciaoidoasjidjap</h5>
        </div>
        <div class="card">
            <div class="box-img">
                <img src="images/image-res/res-4.jpg" alt="">
            </div>
            <h5>ciaoidoasjidjap</h5>
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
        float: left;
        margin-left: 20px;
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
    }

    .box-img > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tipo {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
    }
</style>
