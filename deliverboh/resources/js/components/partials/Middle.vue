<template>
    <!-- <section class="middle d-flex flex-column align-items-center justify-content-center"> -->
    <section class="middle">
        <div :class="((!searchText == '') ? 'box-user' : '')">
            <Search @performSearch="searchRest"/>
        </div>

        <div :class="((!categoriesArray.length == 0) ? 'box-user' : '')">
            <div v-for="(user, index) in filterUsers" :key="index" class="container-card">
                <User :info="user" />
            </div>
        </div>

        <div id="sfondo" class="sfondo">
            <img src="/images/unarota.svg" alt="">
        </div>
       
    </section>
</template>

<script>
import User from "./User.vue"
import Search from "./Search.vue"
export default {
    name: "Middle",
    props: ['categoriesArray'],
    components: {
        User,
        Search,
    },
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            searchrestaurant: "",
            users: [], 
            searchText: '',
            categoryUsers: [],
            // pippo: {
            //     cusineCollection: []
            // }
        };
    },
    created() {
        this.getUsers();
        this.getCategoryUsers();
    },
    computed: {
        filterUsers() {
            if (this.searchText === "") {
                var usersArray = [];
                for (const i in this.categoriesArray) {
                    // console.log(this.categoriesArray);
                    for (const j in this.categoryUsers) {
                        if (this.categoryUsers[j].category_id == this.categoriesArray[i]){
                            if(!usersArray.includes(this.categoryUsers[j].user_id))
                                usersArray.push(this.categoryUsers[j].user_id)
                        }
                    }
                }
                var ristoranti = [] 
                for (const i in this.users) {
                    for (const k in usersArray) {
                        if (this.users[i].id == usersArray[k]) {
                            if(!ristoranti.includes(this.users[i]))
                                ristoranti.push(this.users[i])
                        }
                    }
                }
                return ristoranti;
        
            } else {
                let filteredList = this.users.filter( item => {
                    return item.name
                        .toLowerCase()
                        .includes(this.searchText.toLowerCase());
                })
                return filteredList;
            } 
        },
    },
    methods: {
        getUsers(){
            axios
                .get(this.url + 'users')
                .then((resp)=>{
                    this.users = resp.data.results
                })
                .catch();
        },
        searchRest(text) {
            this.searchText = text;
        },
         getCategoryUsers(){
            const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'categoryUsers', bodyParameters, config)
                .then((resp)=>{
                    this.categoryUsers = resp.data.results;
                })
                .catch();
        },
    },
};
</script>


<style lang="scss" scoped>
.middle {
    width: calc((100%/6) * 5);
    height:calc(100vh - 80px);
    position: relative;
}

.sfondo {
    width: 80%;
    height: 100%;
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
}

.sfondo > img {
    width: 100%;
    height: 85%;
    object-fit:contain;
    object-position: 120%;
}

.box-search {
    width: 100%;
    height: 20%;
    // display: block;
    background: red;
}

.box-user {
    width: 75%;
    height: 60%;
    overflow-y: scroll;
    display: flex;
    flex-wrap: wrap;
    background-color: rgba(252, 248, 240, 0.577);
    // background: orange;
    // display: none;
}

.container-card {
    padding: 20px;
}

</style>
