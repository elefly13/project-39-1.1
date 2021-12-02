<template>

    <section>
        <!-- <input type="checkbox" v-model="module.checked" :id="module.id" class="btn-check" autocomplete="off" value="ita">
        <label class="test" for="cusine">Italiano</label><br> -->
        <!-- <input type="checkbox" class="btn-check" id="cusine" autocomplete="off" value="esp">
        <label class="test" for="cusine">Spagnolo</label><br> -->

        <!-- <form @submit.prevent="riceviRisultato">
        <div class="" v-for="item in Items" v-bind:key="item.id">
            <input class="btn-check" type="checkbox"  v-model="user.cusineCollection" :id="item.name" :value="item.name">
            <label class="test" :for="item.id">{{item.name}}</label>
        </div>

        
        <div class="form-group">
                {{user.cusineCollection}}
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form> -->
    
       <div class="" v-for="item in Items" v-bind:key="item.id">
            <input class="btn-check" type="checkbox"  v-model="user.cusineCollection" :id="item.name" :value="item.name">
            <label class="test" :for="item.id">{{item.name}}</label>
        </div>

         <input type="checkbox" class="btn-check" id="cusine" autocomplete="off" value="ita">
        <label class="test" for="cusine">Italiano</label><br>

        <!-- anteprima risultato  -->
        <div class="form-group">
                {{user.cusineCollection}}
        </div>

     
    
    </section>
   
</template>

<script>

export default {
        data() {
        return {
            Items: [
                {
                    name: 'Italiano'
                }, 
                {
                    name: 'Spagnolo'
                }, 
                {
                    name: 'Francese'
                }, 
                {
                    name: 'Tedesco'
                }
            ],            
            user: {
                cusineCollection: []
            }
        };
    },
    methods: {
        riceviRisultato() {
            alert(JSON.stringify(this.user));
        }
    }    
};
</script>

<style scoped lang="scss">

[type=checkbox] { 
   position: absolute;
   
//    opacity: 0;
   width: 50px;
   height: 50px;
}

[type=checkbox]:checked + label {
background-color:#638F64;
color: white;
}


.test {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 40px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 5px;
    border: 1px solid #638F64;
}

</style>
