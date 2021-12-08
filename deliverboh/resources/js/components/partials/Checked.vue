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
        align-items: flex-start;
        padding-top: 3%;
        width: 18%;
        height: 100%;

        .check-list {
            width: 100%;
            height: 6.5%;
            margin: 5px 0;
        }
    }

    .btn-check { 
        opacity: 0;
        width: 12.6%;
        height: 5%;
    }

    [type=checkbox]:checked + label {
        background-color:#638F64;
        color: white;
    }

    .check-button {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 120px;
        width: 70%;
        height: 100%;
        border-top-right-radius: 7px;
        border-bottom-right-radius: 7px;
        border-top: 1px solid #638F64;
        border-bottom: 1px solid #638F64;
        border-right: 1px solid #638F64;
    }

</style>
