<template>
    <section class="search">
      
        <h1 class="slogan">I piatti che ami, a domicilio</h1>
            
        <div class="search-box">
            <input @keyup.enter="$emit('performSearch', searchrestaurant)" class="search-input" v-model="searchrestaurant" type="text" placeholder="cerca un tipo di ristorante"/>
            <button class="search-button" @click.prevent="$emit('performSearch', searchrestaurant)">Cerca</button>
        </div>
      

    </section>
</template>

<script>

export default {
    name: "Search",
    data() {
        return {
           searchrestaurant: '',
        };
    },
};
</script>

<style scoped lang="scss">
    
    // .search {
    //     background-color: crimson;
    //     min-width: 290px;
    //     width: 30%;
    //     padding-top: 3%;
    // }

    // .slogan {
    //     font-size: 2vw;
    // }



    .search {
        width: 100%;
        // padding: 10px 10px;
        // padding-top: 55px;
        display: flex;
        flex-direction: column;
        align-content: flex-start;
        flex-wrap: nowrap;
        // justify-content: center;
    }

    .search-input {
        height: 35px;
        width: 70%;
        min-width: 200px;
        max-width: 350px;
        color: grey;
        font-size: 1em;
        outline: none;
        border: 0px;
        border-radius: 7px;
        padding-left: 5px;
        margin-right: 10px;
        background: #F4F0E1;
    }

    .search-button {
        height: 35px;
        color: white;
        font-size: 1em;
        outline: none;
        border: none;
        border-radius: 7px;
        padding: 0 15px;
        background-color: #638f64;
    }

    .box-slogan-search {
        padding-top: 50px;
    }



//     @media screen and (max-width: 375px) and (min-width: 200px) {
    
// .search {
//         width: 100%;
//         // padding: 10px 10px;
//         // padding-top: 55px;
//         display: flex;
//         flex-direction: column;
//         align-content: flex-start;
//         flex-wrap: nowrap;
//         text-align: center;
//         // justify-content: center;
//         // background: red;
//     }

//     .slogan {
//         font-size: 25px;
//     }

//     .search-input {
//         height: 35px;
//         width: 70%;
//         min-width: 200px;
//         max-width: 350px;
//         color: grey;
//         font-size: 1em;
//         outline: none;
//         border: 0px;
//         border-radius: 7px;
//         padding-left: 5px;
//         margin-right: 10px;
//         background: #F4F0E1;
//     }

//     .search-button {
//         height: 35px;
//         color: white;
//         font-size: 1em;
//         outline: none;
//         border: none;
//         border-radius: 7px;
//         padding: 0 15px;
//         background-color: #638f64;
//         margin-top: 20px;
//     }

//     .box-slogan-search {
//         padding-top: 50px;
//     }


//     }
</style>
