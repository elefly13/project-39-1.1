<template>
    <section class="cart"> 

        <div id="mySidepanel" class="sidepanel">
            <div class="sidepanel-left">
                <a @click="openNav()" class="openbtn"><img class="cart-logo" :src="'../images/icons/cart.svg'" alt=""></a>
                <a href=""><img class="hastag" :src="'../images/icons/hastag.svg'" alt=""></a>
                <a class="closebtn" @click="closeNav()">×</a>
            </div>
            <div class="sidepanel-right">
                <h3>Carrello</h3>
            </div>
        </div>
       
        
    </section>
</template>

<script>
export default {
    
    name: "Cart",
    props: ['cartContent','initialPrice'],
   

    methods: {
        
        openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
            document.getElementById("openbtn").style.width = "250px";
            console.log('ciao')
        },

        closeNav() {
            document.getElementById("mySidepanel").style.width = "60px";
            document.getElementById("openbtn").style.width = "60px";
            console.log('ciao')
        },
    }
};
</script>

<style lang="scss" scoped>
           
           
    .cart {
        position: relative;
    }

    .cart-logo {
        width: 30px;
    }
    .sidepanel  {
        display: flex;
        width: 60px;
        position: relative;
        z-index: 99;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        background-color: white;
        overflow: hidden;
        transition: 0.5s;
    }

    .sidepanel-left {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel-right {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidepanel a {
        margin: 10px 0;
        text-decoration: none;
        display: block;
        transition: 0.3s;
    }

    .icon_social {
        height: 20px;
        width: 20px;
    }

    .hastag {
        width: 25px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: white;
        padding: 10px 15px;
        border: none;
        width: 60px;
    }

   
</style>