<template>
    <section>
        <div class="card">
            <div class="box-img">
                <img src="/images/image-res/res-1.jpg" alt="">
            </div>
                <h4>
                    {{info['restaurant_name']}}
                </h4>
            <ul>
                <li class="list-box">
                    <ul>
                        <li>{{info['restaurant_name']}}</li>
                        <li>{{info['address']}}</li>
                    </ul>  
                </li>            
            </ul> 
        </div>
    </section>
</template>

<script>
export default {
    name: "User",
    props: ['info']
}
</script>

<style lang="scss" scoped>
    .middle {
        height: 100%;
        width: 100%;
    }
       li{
        list-style: none;
    }

    .lista-box {
        padding: 10px;
        color: #343434;
    }

    h4 {
        color: #628F64;
    }

    .card {
        width: 200px;
        height: 300px;
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
        height: 50%;
        margin-bottom:10px;
    }

    .box-img > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
