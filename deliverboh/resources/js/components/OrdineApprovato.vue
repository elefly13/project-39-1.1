<template>
    <section>
        
        <div class="big-box">
            <h1>Il tuo Ordine è stato correttamente processato</h1>
            <h3>A breve riceverai una mail di riepilogo</h3>
            <h2 class="muovi">Grazie per averci scelto</h2>
            <a href="/">Torna alla Home</a> 
        </div>
        <div class="bici">
            <img class="prova" :src="'../images/bike.png'" alt="">
        </div>
    </section>
</template>

<script>
export default {
    
    name: "OrdineApprovato",
    data() {
       
    },
    created() {},
    methods: {},
};
</script>


<style lang="scss" scoped>
@import 'styles/_color';
@import 'styles/_general';
section{
    width: 100%;
    height: calc(100vh - 59px);
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: url('/images/paese.svg');
    background-repeat: no-repeat;
    // background: $verdechiaro;

    .big-box {
        width: 100%;
        margin: 0 auto;
        text-align: center;
        background: $bianco;
        padding: 30px;
        @include display-flex();
        img {
            width: 300px;
        }
        h1 {
            font-size: 40px;
            color: $grigioscuro;
        }
        h2 {
            color: $grigioscuro;
        }
        a {
            text-decoration: none;
            font-size: 20px;
            color: $arancione;
        }
    }
}

.bici {
    width: 100%;
    // height: 30%;
}

.prova {
    // width: 100px;
    // height: 100px;
    position: relative;
    animation: mytest 10s 10;
  } 

  @keyframes mytest {
    0%   {left: 0%;}
    25%  {left: 30%;}
    50%  {left: 30%;}
    75%  {left: 30%;}
    100% {left: 30%;}
  } 


</style>
