<template>
    <section>
       <div class="" v-for="(category, index) in categories" :key="index">
            <input class="btn-check" type="checkbox" v-model="selectedCategories" v-on:change="$emit('selCategories', selectedCategories)" :value="category.id">
            <label class="check-buttom">{{category.cuisine}}</label>
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
        addCategory() {

        },
    },  
};

</script>

<style scoped lang="scss">

[type=checkbox] { 
   position: absolute;
   opacity: 0;
   width: 200px;
   height: 50px;
}

[type=checkbox]:checked + label {
background-color:#638F64;
color: white;
}

.check-buttom {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 40px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 5px;
    border-top: 1px solid #638F64;
    border-bottom: 1px solid #638F64;
    border-right: 1px solid #638F64;
}

</style>
