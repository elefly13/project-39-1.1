<template>
    <section>
        <div class="card">
            <div class="box-img">
                <img src="/images/img-restaurant/res-1.jpg" alt="">
            </div>
            <ul>
                <h3>
                    {{info['restaurant_name']}}
                </h3>
                <li class="list-box">
                    <ul>
                        <li>{{info['email']}}</li>
                        <li>{{info['restaurant_name']}}</li>
                        <li>{{info['address']}}</li>
                    </ul>  
                </li>            
            </ul> 
        </div>
        <!-- <div class="io">
            <ul class="d-flex flex-wrap px-5">
                    <h3>
                        {{info['restaurant_name']}}
                    </h3>
                <li class="list-box">
                    <ul>
                        <li>{{info['email']}}</li>
                        <li>{{info['restaurant_name']}}</li>
                        <li>{{info['address']}}</li>
                    </ul>  
                </li>            
            </ul> 
        </div> -->
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
    // .list-box{
    //     width: 50%;
    //     height: 10rem;
    //     background: chocolate;
    // }

    .lista-box {
        padding: 10px;
    }

    .card {
        width: 300px;
        height: 350px;
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
        background: cornflowerblue;
    }

    .box-img > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
