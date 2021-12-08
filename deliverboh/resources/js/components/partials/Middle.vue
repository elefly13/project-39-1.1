<template>
    <section class="middle">
        <div>
            <Search @performSearch="searchRest"/>
        </div>
        <div :class="((!categoriesArray.length == 0 || searchText != '') ? 'backgrey box-user' : 'box-user')">
            <div v-for="(user, index) in this.ristoranti" :key="index" class="container-card">
                <User :info="user" />
            </div>
        </div>
        <div class="test">
            <h3>#aCasaTuaConDeliverboh</h3>
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
            ristoranti: [],
            appoggioDue: [],
        };
    },
    created() {
        this.getUsers();
        this.getCategoryUsers();
    },
    watch: {
        searchText: function () {
            if (this.searchText != '') {
                let filteredList = this.ristoranti.filter( item => {
                    return item.name
                        .toLowerCase()
                        .includes(this.searchText.toLowerCase());
                })
                if(filteredList.length == 0) {
                    filteredList = this.users.filter( item => {
                        return item.name
                            .toLowerCase()
                            .includes(this.searchText.toLowerCase());
                    })  
                    this.ristoranti = filteredList;
                } else {
                    this.ristoranti = filteredList;
                }
            } else {
                this.ristoranti =  this.appoggioDue;
            }
        },
        categoriesArray: function filterUsers() {
            var usersArray = [];
            for (const i in this.categoriesArray) {
                for (const j in this.categoryUsers) {
                    if (this.categoryUsers[j].category_id == this.categoriesArray[i]){
                        if(!usersArray.includes(this.categoryUsers[j].user_id))
                            usersArray.push(this.categoryUsers[j].user_id)
                    }
                }
            }
            var appoggio = [];
            for (const i in this.users) {
                for (const k in usersArray) {
                    if (this.users[i].id == usersArray[k]) {
                        if(!appoggio.includes(this.users[i]))
                            appoggio.push(this.users[i])
                    }
                }
            }
            this.appoggioDue =  appoggio;
            this.ristoranti =  appoggio;
            if (this.searchText != '') {
                let filteredList = this.ristoranti.filter( item => {
                    return item.name
                        .toLowerCase()
                        .includes(this.searchText.toLowerCase());
                })
                this.ristoranti = filteredList;
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

.test {
    writing-mode: vertical-rl;
    text-orientation: mixed;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translate(-5%, -80%);
    color: #638F64;
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
    display: block;
}

.box-user {
    width: 93%;
    height: 60%;
    overflow-y: auto;
    display: flex;
    flex-wrap: wrap;
}

.backgrey {
    background-color: rgba(252, 248, 240, 0.577);
}

.container-card {
    padding: 20px;
}

</style>
