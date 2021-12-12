<template>
    <section class="check-container">
       <div v-for="(category, index) in categories" :key="index" class="check-list">
            <input class="btn-check" type="checkbox" v-model="selectedCategories" v-on:change="$emit('selCategories', selectedCategories)" :value="category.id">
            <label class="check-button">{{category.cuisine}}</label>
        </div>    
    </section>
</template>

<script>

export default {
    name: "Checked",
    props: ['emptycheck'],
    data() {
    return {
        url: "http://127.0.0.1:8000/api/",
        categories: [],
        selectedCategories: [],
        flag: false,
        api_token:
            "bbzRf42NwlCuPIdwL7AiHgXskzLa69GB61Tn8QA7VZ1woSustPL1NfelqeHpfolpwhwX6lR1OolmJf3k",
    };
    },
    created() {
        this.getCategories()
    },
    watch: {
        emptycheck: function () {
            if(this.emptycheck == true) {
                this.selectedCategories = []
            }
        }
    },
    methods: {
        getCategories(){
            const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'categories', bodyParameters, config)
                .then((resp)=>{
                    this.categories = resp.data.results
                })
                .catch();
        },       
    },  
};

</script>

<style scoped lang="scss">
    
    .check-container {
        display: flex;
        flex-direction: column;
        padding-top: 4vh;
        height: calc(100vh - 150px);
        overflow: auto;
    }

    .check-list {
        width: 100%;
        height: 6.5%;
        margin: 5px 0;
    }

    .btn-check { 
        opacity: 0;
        width: 250px;
        // min-height: 40px;
        height: 40px;
    }

    [type=checkbox]:checked + label {
        background-color:#638F64;
        color: white;
    }

    .check-button {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 250px;
        height: 40px;
        max-width: 250px;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
        border-top: 1px solid #638F64;
        border-bottom: 1px solid #638F64;
        border-right: 1px solid #638F64;
    }

@media screen and (max-width: 575px) {
            
    .check-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 0vh;
        height: 100%;
        overflow: none;
        width: 100%;
    }

    .check-list {
        width: 100%;
        width: 80%;
        height: 6.5%;
        margin: 0px;
        font-size: 10px;
    }

    .btn-check { 
        opacity: 0;
        width: 23%;
        height: 25px;
    }

    .check-button {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 250px;
        width: 100%;
        height: 25px;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
    }
}

@media screen and (min-width:320px) and (max-width:736px) and (orientation:landscape) {

    .check-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 0vh;
        height: 100%;
        overflow: none;
        width: 100%;
    }

    .check-list {
        width: 100%;
        width: 80%;
        height: 8%;
        margin: 0px;
        font-size: 9px;
    }

    .btn-check { 
        opacity: 0;
        width: 10%;
        height: 18px;
    }

    .check-button {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 250px;
        width: 100%;
        height: 18px;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
    }

}

@media screen and (min-width:320px) and (max-width:1280px) and (orientation:landscape) {
 

    .check-list {
        width: 90%;
        width: 80%;
        height: 8%;
        margin: 0px;
        font-size: 9px;
    }

   
}

</style>
