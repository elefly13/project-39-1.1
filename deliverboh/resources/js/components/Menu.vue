<template>
    <section>
        <h1>Sono la pagina menu del ristorante</h1>
        <div class="container-menu">
            <div class="top">
                <p class="saluto">Benvenuto nell nostro ristorante</p>
                <h1>Nome ristorante selezionato</h1>
                <h3>Il nostro menu</h3>
            </div>
            <div class="box">
                <div class="big-box-img">
                    <div class="image">
                        <img src="https://cdn.pixabay.com/photo/2017/12/10/14/47/pizza-3010062_1280.jpg" alt="">
                        <h4>Titolo piatto</h4>
                        <p>Descrizione</p>
                        <h4>€ 8,50</h4>
                        <p>Ingredienti:</p>
                        <p>Allergeni:</p>  
                         <button class="button">Aggiungi al carrello</button>               
                    </div>
                    <div class="image">
                    
                   
                    </div>
                    <div class="image">
                    
                   
                    </div>
                    <div class="image">
                    
                   
                    </div>
                    <div class="image">
                    
                   
                    </div>
                    <div class="image">
                    
                   
                    </div>
                    <div class="image">
                    
                   
                    </div>
                    <div class="image">
                    
                   
                    </div>
                    <div class="image">
                    
                   
                    </div>
                </div> 
                <div class="area-carrello">
                </div>

            </div> 
        </div>
                
    </section>
</template>

<script>
export default {
    
    name: "Menu",
    data() {
        // return {
        //     ricercaPiatto: "",
        // };
    },
    created() {},
    methods: {},
};
</script>


<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Raleway', sans-serif;
}

.container-menu {
    width: 100%;
    background-image: linear-gradient(to bottom right, #b5d8ba 20%, #f1c692 80%);
    //background-color:#fff7df ;
    .top {
        width: 100%;
        margin: 0 auto;
        padding: 40px 60px;
        background-color: #439373;
        border-bottom-right-radius: 50px;
        .saluto {
            color: #fff7df;
        }
        h1 {
            color:#f1c692;
            font-size: 34px;
            
        }
        h3 {
            color: #fff7df;
        }


    }
    .box {
        display: flex;
        .big-box-img {
        width: 75%;
        margin: 0 auto;
        padding: 40px;
       
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        
        .image {
            display: column;
            text-align: center;
            width: 220px;
            height: 350px;
            background-color:white ;
            border-radius: 5px;
            border-bottom-right-radius: 40px;
            transition: 0.5s;
            box-shadow: 5px 10px 18px #a09f9f;
            cursor: pointer;
            padding: 10px;
            margin: 20px;
            img {
                width: 200px;
                border-radius: 5px;
                border-bottom-right-radius: 40px;
            }
            h4 {
               color: #be541e; 
               padding: 8px 0;
            }
            p {
                font-size: 12px;
                padding: 3px 0;
            }
            button {
                margin: 10px;
                padding: 5px;
                border-color: #439373;
                border-radius: 3px;
                border-bottom-right-radius: 10px;
                background-color:  #439373;
                color: #f4f0e2;
                transition: 0.6s;
            }
            button:hover {
                margin: 10px;
                padding: 5px;
                border-color: #f1c692;
                border-radius: 3px;
                border-bottom-right-radius: 10px;
                background-color:  #f1c692;
                color: #343434;
            }
           
        }
        .image:hover {
        transform: scale(1.05);
        }
        .image:active {
        transform: scale(1);
        }
    }
    .area-carrello {
        width: 35%;
        height: 100%;
        
    }

    }
    
    
           
}
</style>