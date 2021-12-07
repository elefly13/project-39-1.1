<template>
    <section>
        <h1>Sono la pagina OrdineApprovato</h1>
        <div class="big-box">

            <img :src="'../images/bike.png'" alt="">
            <h1>Il tuo Ordine è stato correttamente processato</h1>
            <h3>A breve riceverai una mail di riepilogo</h3>
            <h2>Grazie per averci scelto</h2>
            <a href="#">Torna alla Home</a>
            
            
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
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap');

section{
    width: 100%;
    height: 1000px;
    background-color:#f4f0e2 ;
    .big-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        margin: 0 auto;
        text-align: center;
        img {
            width: 300px;
        }
        h1 {
            font-size: 40px;
        }
        h2 {
            color: #be541e;
        }
        a {
            text-decoration: none;
            font-size: 20px;
            color: #439373;
        }

    }
}

</style>