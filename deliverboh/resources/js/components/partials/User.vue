<template>
    <section>
        <div class="card ">
            <div class="box-img">
                <img :src="'./images/image-res/' + info['restaurant_image']" alt="">
            </div>
            <ul>
                <h4>
                    {{info['restaurant_name']}}
                </h4>
                <li class="list-box">
                    <!-- <span>{{info['restaurant_name']}}</span> -->
                    <span>{{info['address']}}</span> 
                </li>            
            </ul> 
        </div>
    </section>
</template>

<script>
export default {
    name: "User",
    props: ['info'],
    data () {
      return {
        users: [
           {
            user_id: 2,
            user_img: 'images/image-res/res-1.jpg',
            user_name: 'Trattoria Conconi'
           },
           {
            user_id: 2,
            user_img: 'images/image-res/res-2.jpg',
            user_name: 'La Coppa d\'oro'
           },
           {
            user_id: 2,
            user_img: 'images/image-res/res-3.jpg',
            user_name: 'Strippoli Osteria Pugliese',
           },
           {
            user_id: 2,
            user_img: 'images/image-res/res-2.jpg',
            user_name: 'Trattoria Conconi',
           }
        ],
        pop: null
      }
    },
}
</script>

<style lang="scss" scoped>

    li{
        list-style: none;
        padding: 5px;
    }

    .lista-box {
        padding: 10px;
        color: #343434;
    }

    h4 {
        color: #E69E42; 
    }

    ul {
        width: 100%;
        height: 50%;
        overflow-y: auto;
    }
    .card {
        width: 200px;
        height: 300px;
        display: flex;
        align-items: center;
        text-align: center;
        border-radius: 5px;
        border-bottom-right-radius: 30px;
        background: rgb(255, 255, 255);
        transition: 0.5s;
        box-shadow: 5px 10px 18px #747373;
        position: relative;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .box-img {
        width: 100%;
        height: 50%;
        margin-bottom:10px;
        padding: 3%;
    }

    .box-img > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
        border-bottom-right-radius: 30px;
    }


@media screen and (max-width: 575px) {
    
    ul {
        overflow-y: scroll;
    }

    li{
        list-style: none;
        padding: 5px;
    }

    .lista-box {
        padding: 10px;
        color: #343434;
    }

    h4 {
        color: #E69E42; 
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
        overflow-y: scroll;
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
