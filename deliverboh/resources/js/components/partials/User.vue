<template>
    <section>
        <div class="card ">
            <div class="box-img">
                <img src="/images/image-res/res-1.jpg" alt="">
            </div>
            <ul>
                <h4>
                    {{info['restaurant_name']}}
                </h4>
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

    li{
        list-style: none;
    }

    .lista-box {
        padding: 10px;
        color: #343434;
        overflow: auto;
    }

    h4 {
        color: #628F64;
    }
    
    ul {
        width: 100%;
        height: 50%;
        overflow: scroll;
    }
    .card {
        width: 200px;
        height: 300px;
        display: flex;
        align-items: center;
        text-align: center;
        border: 0.3px solid rgb(228, 228, 228);
        border-bottom-right-radius: 30px;
        background: rgb(255, 255, 255);
        transition: 0.5s;
        box-shadow: 5px 10px 18px #e3e3e3;
        position: relative;
    }

    .card:hover {
        transform: scale(1.05);
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


    @media screen and (max-width: 575px) {

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
        border-bottom-right-radius: 30px;
        background: rgb(255, 255, 255);
        transition: 0.5s;
        box-shadow: 5px 10px 18px #e3e3e3;
    }
    .card:hover {
        transform: scale(1.05);
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
}

@media screen and (min-width:320px) and (max-width:736px) and (orientation:landscape){
    li{
        list-style: none;
    }
    .lista-box {
        padding: 10px;
        color: #343434;
    }
    ul {
        font-size: 10px;
    }
    h4 {
        color: #628F64;
        font-size: 14px;
    }
    .card {
        width: 150px;
        height: 250px;
        display: flex;
        align-items: center;
        text-align: center;
        border: 0.3px solid rgb(228, 228, 228);
        border-bottom-right-radius: 30px;
        background: rgb(255, 255, 255);
        transition: 0.5s;
        box-shadow: 5px 10px 18px #e3e3e3;
    }
    .card:hover {
        transform: scale(1.05);
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
}
</style>
