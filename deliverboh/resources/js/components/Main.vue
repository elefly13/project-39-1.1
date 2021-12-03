<template>
    <main class="wrapper">
            <div class="check-box d-flex flex-column justify-content-around">
                <p v-for="category in categories" :key="category['id']">
                    {{category['cuisine']}}
                </p>
            </div>
            <Middle class="middle" />
            <Background class="background" />
    </main>
</template>

<script>
import Background from './partials/Background';
import Middle from './partials/Middle';

export default {
    name: "Main",
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            categories: [],
        };
    },
    components: {
        Middle,
        Background
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

<style lang="scss" scoped>
.wrapper{
    margin-top: 80px;
    width: 100%;
    height: calc(100vh - 80px);
    display: flex;
}
.check-box {
    width: calc(100%/6);
    height: 100%;
    background-color: chocolate;
}
.middle {
    width: calc((100%/6) * 3);
    // height: 100%;
    // background-color: chocolate;
}
.background {
    width: calc((100%/6) * 2);
    // height: 100%;
    // background-color: chocolate;
}
</style>