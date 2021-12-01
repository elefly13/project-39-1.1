<template>

    <main>
       
        <div class="wrapper">
            <div class="check-box">
                    <form action="">
                        <div class="bottone">
                            <input type="checkbox" id="cusine" name="cusine" value="Italiano">
                            <label for="cusine"> Italiano</label><br>
                        </div>
                    </form>
            </div>

           
            <div class="slogan">
                <Search @search= "searchProva"/>
            </div>

            <div class="sfondo">
                <img src="/images/unarota.svg" />
            </div>

            <div class="sponsor">
                <div class="box-80">
                    <h3>I più popolari</h3>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import Search from './Search.vue';

export default {
    name: "Main",
    components: {
        Search
  
    },
    data() {
        return {

        };
    },
    created() {},
    methods: {
        searchProva(text) {
            console.log(text);
        }
    },
};
</script>

<style scoped lang="scss">


.wrapper {
    width: 100%;
    height: calc(100vh - 80px);
    position: relative;
    display: flex;
}

.check-box {
    z-index: 5;
    width: 10%;
    height: calc(100% - 30%);
    background-color: chocolate;
}

// .box-search {
//     width: 1280px;
//     height: 80px;
//     margin: 0 auto;
//     z-index: 5;
//     padding: 0 15px;
// }

// .ricerca {
//     width: 25%;
//     height: 50px;
//     color: grey;
//     font-size: 1em;
//     outline: none;
//     border: 0px;
//     border-radius: 10px;
//     padding: 5px;
// }

// .cerca {
//     margin-left: 10px;
//     width: 10%;
//     height: 50px;
//     color: white;
//     font-size: 1em;
//     outline: none;
//     border: 0px;
//     border-radius: 10px;
//     padding: 5px;
//     background-color: #638f64;
// }

// width: 300px;
// input:focus,
// select:focus,
// textarea:focus,
// button:focus {
//     outline: none;
// }

.slogan {
    padding: 0 15px;
    position: absolute;
    width: 100%;
    height: 30%;
    padding-top: 50px;
    display: flex;
    flex-direction: column;
    z-index: 10;
    // background-color: #f4f0e1;
}

.sfondo {
    position: absolute;
    right: 0;
    width: 90%;
    height: 100%;
    text-align: right;
    // background-color: cornflowerblue;
}

.sfondo > img {
    height: 75%;
    object-fit: contain;
}

.sponsor {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 30%;
    background-color: #f4f0e1;
}
</style>
